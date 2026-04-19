<?php
/**
 * Unified Logging Utility for MBN Theme
 * Provides centralized logging with consistent formatting across the theme
 *
 * @package MBNTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * MBN Theme Logger Class
 *
 * Usage:
 *   MBN_Logger::info( 'Block registered successfully', [ 'block_name' => 'hero-section' ] );
 *   MBN_Logger::error( 'Failed to load block', [ 'error' => $error_message ] );
 *   MBN_Logger::debug( 'Variable value', [ 'var' => $value ] );
 */
class MBN_Logger {

	/**
	 * Log levels
	 */
	const LEVEL_DEBUG   = 'DEBUG';
	const LEVEL_INFO    = 'INFO';
	const LEVEL_WARNING = 'WARNING';
	const LEVEL_ERROR   = 'ERROR';

	/**
	 * Theme prefix for all log messages
	 */
	const LOG_PREFIX = '[MBN-THEME]';

	/**
	 * Check if logging is enabled
	 *
	 * @return bool True if WP_DEBUG is enabled
	 */
  private static function is_logging_enabled() {
      return defined( 'WP_DEBUG' ) && WP_DEBUG;
  }

	/**
	 * Check if debug logging is enabled
	 *
	 * @return bool True if WP_DEBUG_LOG is enabled
	 */
  private static function is_debug_log_enabled() {
      return defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG;
  }

	/**
	 * Format log message with timestamp and context
	 *
	 * @param string $level    Log level.
	 * @param string $message  Log message.
	 * @param array  $context  Additional context data.
	 * @return string Formatted log message.
	 */
  private static function format_message( $level, $message, $context = array() ) {
      $timestamp = current_time( 'Y-m-d H:i:s' );
      $formatted = sprintf(
        '%s [%s] %s: %s',
        self::LOG_PREFIX,
        $timestamp,
        $level,
        $message
      );

      // Add context if provided
    if ( ! empty( $context ) ) {
        $formatted .= ' | Context: ' . wp_json_encode( $context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    }

      return $formatted;
  }

	/**
	 * Write log message to WordPress debug.log
	 *
	 * @param string $level    Log level.
	 * @param string $message  Log message.
	 * @param array  $context  Additional context data.
	 */
  private static function write_log( $level, $message, $context = array() ) {
    if ( ! self::is_logging_enabled() ) {
        return;
    }

      $formatted_message = self::format_message( $level, $message, $context );

      // Use error_log for WordPress debug.log
    if ( self::is_debug_log_enabled() ) {
        error_log( $formatted_message );
    }

      // Also output to console if WP_DEBUG_DISPLAY is enabled
    if ( defined( 'WP_DEBUG_DISPLAY' ) && WP_DEBUG_DISPLAY ) {
        // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
        trigger_error( $formatted_message, E_USER_NOTICE );
    }
  }

	/**
	 * Log debug message
	 *
	 * @param string $message  Log message.
	 * @param array  $context  Additional context data.
	 */
  public static function debug( $message, $context = array() ) {
      self::write_log( self::LEVEL_DEBUG, $message, $context );
  }

	/**
	 * Log info message
	 *
	 * @param string $message  Log message.
	 * @param array  $context  Additional context data.
	 */
  public static function info( $message, $context = array() ) {
      self::write_log( self::LEVEL_INFO, $message, $context );
  }

	/**
	 * Log warning message
	 *
	 * @param string $message  Log message.
	 * @param array  $context  Additional context data.
	 */
  public static function warning( $message, $context = array() ) {
      self::write_log( self::LEVEL_WARNING, $message, $context );
  }

	/**
	 * Log error message
	 *
	 * @param string $message  Log message.
	 * @param array  $context  Additional context data.
	 */
  public static function error( $message, $context = array() ) {
      self::write_log( self::LEVEL_ERROR, $message, $context );
  }

	/**
	 * Log block-related message
	 *
	 * @param string $message    Log message.
	 * @param string $block_name Block name.
	 * @param array  $context    Additional context data.
	 */
  public static function block( $message, $block_name, $context = array() ) {
      $context['block'] = $block_name;
      self::info( $message, $context );
  }

	/**
	 * Log database query
	 *
	 * @param string $query   SQL query.
	 * @param array  $context Additional context data.
	 */
  public static function query( $query, $context = array() ) {
    if ( ! self::is_logging_enabled() ) {
        return;
    }

      $context['query'] = $query;
      self::debug( 'Database Query', $context );
  }

	/**
	 * Log HTTP request
	 *
	 * @param string $url     Request URL.
	 * @param array  $args    Request arguments.
	 * @param array  $context Additional context data.
	 */
  public static function http_request( $url, $args = array(), $context = array() ) {
    if ( ! self::is_logging_enabled() ) {
        return;
    }

      $context['url']    = $url;
      $context['method'] = isset( $args['method'] ) ? $args['method'] : 'GET';

      self::debug( 'HTTP Request', $context );
  }

	/**
	 * Log exception or WP_Error
	 *
	 * @param mixed $error   Exception or WP_Error object.
	 * @param array $context Additional context data.
	 */
  public static function exception( $error, $context = array() ) {
    if ( is_wp_error( $error ) ) {
        $message               = $error->get_error_message();
        $context['error_code'] = $error->get_error_code();
        $context['error_data'] = $error->get_error_data();
    } elseif ( $error instanceof Exception ) {
        $message          = $error->getMessage();
        $context['file']  = $error->getFile();
        $context['line']  = $error->getLine();
        $context['trace'] = $error->getTraceAsString();
    } else {
        $message          = 'Unknown error type';
        $context['error'] = print_r( $error, true );
    }

      self::error( $message, $context );
  }

	/**
	 * Get log file path (for custom log file)
	 *
	 * @return string Path to custom log file.
	 */
  public static function get_log_file_path() {
      $upload_dir = wp_upload_dir();
      $log_dir    = trailingslashit( $upload_dir['basedir'] ) . 'mbn-theme-logs';

      // Create directory if it doesn't exist
    if ( ! file_exists( $log_dir ) ) {
        wp_mkdir_p( $log_dir );

        // Add .htaccess to protect log directory
        $htaccess_file = trailingslashit( $log_dir ) . '.htaccess';
      if ( ! file_exists( $htaccess_file ) ) {
        file_put_contents( $htaccess_file, 'deny from all' );
      }
    }

      return trailingslashit( $log_dir ) . 'mbn-theme-' . gmdate( 'Y-m-d' ) . '.log';
  }

	/**
	 * Write to custom log file (in addition to WordPress debug.log)
	 *
	 * @param string $level    Log level.
	 * @param string $message  Log message.
	 * @param array  $context  Additional context data.
	 */
  public static function write_custom_log( $level, $message, $context = array() ) {
    if ( ! self::is_logging_enabled() ) {
        return;
    }

      $log_file          = self::get_log_file_path();
      $formatted_message = self::format_message( $level, $message, $context ) . PHP_EOL;

      // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents
      file_put_contents( $log_file, $formatted_message, FILE_APPEND );
  }

	/**
	 * Clear old log files (older than specified days)
	 *
	 * @param int $days Number of days to keep logs. Default 7.
	 */
  public static function clear_old_logs( $days = 7 ) {
      $upload_dir = wp_upload_dir();
      $log_dir    = trailingslashit( $upload_dir['basedir'] ) . 'mbn-theme-logs';

    if ( ! file_exists( $log_dir ) ) {
        return;
    }

      $files  = glob( trailingslashit( $log_dir ) . 'mbn-theme-*.log' );
      $cutoff = time() - ( $days * DAY_IN_SECONDS );

    foreach ( $files as $file ) {
      if ( filemtime( $file ) < $cutoff ) {
          wp_delete_file( $file );
      }
    }
  }
}

/**
 * Helper function for quick logging
 *
 * @param string $message  Log message.
 * @param string $level    Log level (debug, info, warning, error).
 * @param array  $context  Additional context data.
 */
function mbn_log( $message, $level = 'info', $context = array() ) {
	$method = strtolower( $level );

  if ( method_exists( 'MBN_Logger', $method ) ) {
      call_user_func( array( 'MBN_Logger', $method ), $message, $context );
  } else {
      MBN_Logger::info( $message, $context );
  }
}

/**
 * Schedule log cleanup
 */
function mbn_schedule_log_cleanup() {
  if ( ! wp_next_scheduled( 'mbn_theme_clear_old_logs' ) ) {
      wp_schedule_event( time(), 'daily', 'mbn_theme_clear_old_logs' );
  }
}
add_action( 'init', 'mbn_schedule_log_cleanup' );

/**
 * Clear old logs daily
 */
function mbn_clear_old_logs() {
	MBN_Logger::clear_old_logs( 7 ); // Keep logs for 7 days
}
add_action( 'mbn_theme_clear_old_logs', 'mbn_clear_old_logs' );
