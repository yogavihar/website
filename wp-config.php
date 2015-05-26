<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/mnt/webl/e2/69/51782469/htdocs/WordPress_02/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'DB2121622');

/** MySQL database username */
define('DB_USER', 'U2121622');

/** MySQL database password */
define('DB_PASSWORD', 'N6OXdwf7l6GeB89yA');

/** MySQL hostname */
define('DB_HOST', 'rdbms.strato.de:');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '^MhOO!TA@5cn71IHq2b#)6NDx8AoUORQg*sM*wK7@i@Pz#FHfzTMeCoKbbb3)j@9');
define('SECURE_AUTH_KEY',  'rfThnc3*X7Zrcd)yHD@kzS3e0XgTWJPCCe0*UHNbJrbjxU7A)YX*UG!S7RR&ber6');
define('LOGGED_IN_KEY',    'F7iU^0ZivjZH)zKnGwaOdXnru8&ALkMRj1moo%We&Rrytd6JmVVS4CUiRCjgn&1)');
define('NONCE_KEY',        'nD%wlG4VeF2O4iLEuICtRirwpxMlVdoCi&QXk%aDZ%XC*%(NXfAb9nJWFE^kmWdU');
define('AUTH_SALT',        'uJJvHdSkWjK&n4v@*T@M2d2s)OYpDGmgE!bC8C2#0JDVhV!gYSg64M#lIy5*74AM');
define('SECURE_AUTH_SALT', 'U!pTJNuljEz#u6XiiVi9ruZSNVXxbkUH@iOjE&l2R&xk4HXx8ueMLil0a0uB7!)G');
define('LOGGED_IN_SALT',   'JTbEpxx7^JJ7dLYDBG2DsPzrE9AAI3&)V@i7FqirIzp9)eD@V!1nV&#B6mtRadLh');
define('NONCE_SALT',       'YwmeQYSgstQm8hrqlzv^tTxHZUPA%CDvHOXagUDRZhJV(EHfqP4acs6NEd5bWZNx');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'yv_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'de_DE');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );
?>
