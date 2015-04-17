<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'bigband_dev_01');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'L+/DpXs/$*}{z8b OZ}ZMkY!a/N[uVv;mS{>I%&{<VF[p`R?dU#5WGT(9|2U>v]Z');
define('SECURE_AUTH_KEY',  '5UJ7M{Vp@7D%B:Q&v=a1an({<EbeMk.;@/~b`-u_|]cZGKB0<&Bts23-$7e/F<Sp');
define('LOGGED_IN_KEY',    'C~,iwEFMmM*y=gd0ozkUs|Os]T[9;~)U H|qaE;|~tjkbC!=9eJWSbM70%dwWj c');
define('NONCE_KEY',        'vDp5;*3XG{UEx|kJaSf+Qp1I~z|y{IAT9:Yow^TY)VJ-w_mkn->:rUt| j]CM9k]');
define('AUTH_SALT',        'np*Uii_cr;Y;cdj$nd/}CvC1W,QC@7:j.;9f|TOuf]!I<;7Xc@} |Q`Qc@E+CMXG');
define('SECURE_AUTH_SALT', 'tzJsYnftSgH>?-M#?P<.tcH8iD9?7Va.{x+=osn|PF].1:;!?k)bXQZZW#.s*~p&');
define('LOGGED_IN_SALT',   '7PmJ_0mD0Ce9[3;Glq2B+d!&r5I4ng]2v))#tLWU]D7zE@;L1^=rrt!Thse-Cc]V');
define('NONCE_SALT',       'CABF@#= .jixSa#p1DJj9!KOKq;-aWa]yDZ0OJ!|S].@@eWa;AQH>J3dzfT8N/l1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
