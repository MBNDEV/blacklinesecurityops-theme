# Blackline Security Operations Theme

Custom WordPress theme for My Biz Niche.

## Theme Details

- Theme Name: `Blackline Security Operations Theme`
- Description: `Custom Theme for MBN`
- Version: `1.0.0`
- Author: `My Biz Niche`
- Theme URI: [https://github.com/MBNDEV/blacklinesecurityops-theme](https://github.com/MBNDEV/blacklinesecurityops-theme)
- Author URI: [https://www.mybizniche.com/](https://www.mybizniche.com/)
- License: `GPL2`
- License URI: [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html)
- Text Domain: `blacklinesecurityops-theme`

## Requirements

- WordPress (current supported version)
- PHP compatible with WordPress requirements
- Composer (for development tooling)

## Installation

1. Copy or clone this theme into `wp-content/themes/blacklinesecurityops-theme`.
2. Install dependencies:
   - `composer install`
3. In WordPress Admin, go to **Appearance > Themes** and activate **Blackline Security Operations Theme**.

## Development

This theme uses Composer autoloading for vendor packages.

- Primary package in use:
  - `yahnis-elsts/plugin-update-checker`
- Autoload is conditionally loaded in `functions.php` to avoid duplicate class loading.

## Update Checker

The theme includes GitHub-based update checks through Plugin Update Checker.

- Repository configured in code:
  - [https://github.com/MBNDEV/blacklinesecurityops-theme](https://github.com/MBNDEV/blacklinesecurityops-theme)
- Slug configured in code:
  - `blacklinesecurityops-theme`

## Linting

Run WordPress coding standards checks before committing:

- `composer run lint`
- `composer run lint:fix`
- `composer run lint:security`
- `composer run lint:run`

## Security

Please review `SECURITY.md` for:

- supported versions
- vulnerability reporting process
- enforced secure coding standards
