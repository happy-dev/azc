<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

define('WP_HOME', 'http://azc.test');
define('WP_SITEURL', 'http://azc.test');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'azc');

/** MySQL database username */
define('DB_USER', 'azc');

/** MySQL database password */
define('DB_PASSWORD', 'azc');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'A0en,Iactkr;@:OWKcbdYtx|n5H80iv,yutv8Kx/,rmQ(.h9LNKA#Mv#(Vgr~_-W');
define('SECURE_AUTH_KEY', 'Nimd+ehTfX5;+-AKXi|SU#=1`d}SU=hb^%V/XXj+Sy;!sX_QbG8?aOly*a+?eA5|');
define('LOGGED_IN_KEY', '`}KO*!5>Q!]~0=BW^Aye=}.HS7fa%cS79aXK~7ZEktknT@ehF2k]^!fDr%%GWanN');
define('NONCE_KEY', '?in)eodR1Rviv,[vSVV?~veU%6[shb&;U KoKX?I]~jQ%4I.)R6X59eN/bIsrH-j');
define('AUTH_SALT', '(cN}rk$#smBlDI^X7NJ?Eyl;O]3$$CMInaAtk]!Ld8V-x.M,G}hr|7d$p&[Iv=7F');
define('SECURE_AUTH_SALT', '(/V|4,-~K{$lo6jYH^9nZHI+ApB~2 TRkho9}5}}Ds*)1{[n(1TmtO#6wy@xlC,Y');
define('LOGGED_IN_SALT', '1e%+^o.r]R 3r88k[y,79vEx8aVue]DG<Zkv:I_$2/^rjlUU.I}Q/$JV/j6a(oef');
define('NONCE_SALT', '#Dotr@/-1Cdg+:W!+dDU,1@5G8?1rg4P: UXw_#9b_%XJSc|& yZ~Sc/~W^n_L!O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
