# AZC

Stack technologique:

- Wordpress
- Mysql

## Hébergement

alwaysdata
ssh : `ssh-zundelcristea.alwaysdata.net`

## Installation

Pass WordPress in multisite-mode

### Multisite

```php
# In wp-config.php
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'azc.archi');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
```
### Security

#### AutoUpdate and disable edit

```php
# Enable auto-update of wordpress
define( 'WP_AUTO_UPDATE_CORE', true );

# Disable editor in wordpress
define('DISALLOW_FILE_EDIT',true);
```

#### File rights

```
 wp-config.php
    Desired: 400
    Fallback: 440, 600, 640

uploads folder
    Desired: 755
    Fallback: 766, 777 (not recommended)

.htaccess files
    Desired: 400
    Fallback: 440, 444, 600, 640
```

#### .htacess

```
# Deny some files.
<FilesMatch "^.*(error_log|wp-config\.php|php.ini|\.[hH][tT][aApP].*)$">
Order deny,allow
Deny from all
</FilesMatch>

# Disable file indexing indexing.
Options All -Indexes

Options +FollowSymLinks
RewriteEngine On
RewriteCond %{QUERY_STRING} (<|%3C).*script.*(>|%3E) [NC,OR]
RewriteCond %{QUERY_STRING} GLOBALS(=|[|%[0-9A-Z]{0,2}) [OR]
RewriteCond %{QUERY_STRING} _REQUEST(=|[|%[0-9A-Z]{0,2})
RewriteRule ^(.*)$ index.php [F,L]

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^wp-admin/includes/ - [F,L]
RewriteRule !^wp-includes/ - [S=3]
RewriteRule ^wp-includes/[^/]+\.php$ - [F,L]
RewriteRule ^wp-includes/js/tinymce/langs/.+\.php - [F,L]
RewriteRule ^wp-includes/theme-compat/ - [F,L]

RewriteCond %{REQUEST_URI} !^/wp-content/plugins/file/to/exclude\.php
RewriteCond %{REQUEST_URI} !^/wp-content/plugins/directory/to/exclude/
RewriteRule wp-content/plugins/(.*\.php)$ - [R=404,L]
RewriteCond %{REQUEST_URI} !^/wp-content/themes/file/to/exclude\.php
RewriteCond %{REQUEST_URI} !^/wp-content/themes/directory/to/exclude/
RewriteRule wp-content/themes/(.*\.php)$ - [R=404,L]
</IfModule>

# WPhtC: Protect .htaccess file
<files ~ "^.*\.([Hh][Tt][Aa])">
order allow,deny
deny from all
</files>

# WPhtC: Setting mod_gzip
<ifModule mod_gzip.c>
mod_gzip_on Yes
mod_gzip_dechunk Yes
mod_gzip_item_include file \.(html?|txt|css|js|php|pl)$
mod_gzip_item_include handler ^cgi-script$
mod_gzip_item_include mime ^text/.*
mod_gzip_item_include mime ^application/x-javascript.*
mod_gzip_item_exclude mime ^image/.*
mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
</ifModule>

\# WPhtC: Setting mod_deflate
<IfModule mod_deflate.c>
AddOutputFilterByType DEFLATE text/html text/plain text/xml application/xml application/xhtml+xml text/javascript text/css application/x-javascript
BrowserMatch ^Mozilla/4 gzip-only-text/html
BrowserMatch ^Mozilla/4.0[678] no-gzip
BrowserMatch bMSIE !no-gzip !gzip-only-text/html
Header append Vary User-Agent env=!dont-vary
</IfModule>

# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]

# add a trailing slash to /wp-admin
RewriteRule ^([_0-9a-zA-Z-]+/)?wp-admin$ $1wp-admin/ [R=301,L]

RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^ - [L]
RewriteRule ^([_0-9a-zA-Z-]+/)?(wp-(content|admin|includes).*) $2 [L]
RewriteRule ^([_0-9a-zA-Z-]+/)?(.*\.php)$ $2 [L]
RewriteRule . index.php [L]
</IfModule>

# END WordPress
<IfModule mod_php5.c>
php_value memory_limit 33768M
php_value upload_max_filesize 33768M
php_value post_max_size 33768M
php_value max_execution_time 300000
php_value max_input_time 100000
</IfModule>
\# BEGIN ShortPixelWebp

\# END ShortPixelWebp
```

## Deployment

- development (`dev` branch)  
  [http://preprod.azc.archi](http://preprod.azc.archi)
- production (`master` branch)  
  [http://azc.archi](http://azc.archi)

**deploy only the `src` folder on the server**

## Misc

- Domain is handled by OVH account
- Hosting is handled by Always Data

## Team

- Frontend: Marjolaine
- President: Lory
- Backend: Nadir
- UX / Design: Sophie
- Fireman: Jonathan
- Senior backup Axel.V

