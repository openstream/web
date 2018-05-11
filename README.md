# Overview

WordPress and WooCommmerce with [MultilingualPress](https://github.com/inpsyde/MultilingualPress) and other useful plugins pre-configured as WordPress multisite installation with English and German for Swiss merchants.

## Installation
Clone this repository on your webserver or download as ZIP archive and upload via sFTP to your webserver. Create wp-config.php either with the web-based WordPress installer or with WP-CLI. Add these rewrite rules and conditions to your `.htaccess` file for proper URL rewriting of the English site (https://hostpoint.openstream.ch/web/en in our demo):

    RewriteEngine On
    RewriteBase /web/
    RewriteRule ^index\.php$ - [L]
    
    # add a trailing slash to /wp-admin
    RewriteRule ^([_0-9a-zA-Z-]+/)?wp-admin$ $1wp-admin/ [R=301,L]
    
    RewriteCond %{REQUEST_FILENAME} -f [OR]
    RewriteCond %{REQUEST_FILENAME} -d
    RewriteRule ^ - [L]
    RewriteRule ^([_0-9a-zA-Z-]+/)?(wp-(content|admin|includes).*) $2 [L]
    RewriteRule ^([_0-9a-zA-Z-]+/)?(.*\.php)$ $2 [L]
    RewriteRule . index.php [L]

Add the following constants to your `wp-config.php`:

    define('WP_ALLOW_MULTISITE', true);
    define('MULTISITE', true);
    define('SUBDOMAIN_INSTALL', false);
    define('DOMAIN_CURRENT_SITE', 'hostpoint.openstream.ch');
    define('PATH_CURRENT_SITE', '/web/');
    define('SITE_ID_CURRENT_SITE', 1);
    define('BLOG_ID_CURRENT_SITE', 1);

Replace hostpoint.openstream.ch with your domain. If you're using a sub-domain for additional languages, e.g. en.hostpoint.openstream.ch, you need to use a different setup which is not part of this README yet!

Import the database in `.db/dump.sql` if you want everything pre-configured for Switzerland. If you want to configure everything yourself, use you have to enable multisite yourself as described in [multilingualpress.org/docs/](https://multilingualpress.org/docs/).

## Support
If you need support, please create a Github issue or [contact Openstream](https://www.openstream.ch/) directly.
