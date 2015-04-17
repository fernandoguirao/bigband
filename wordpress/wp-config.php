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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'MC3nw}Z~W-y3!b%@Ylt-v;NFv~2O7wi`49HSSH!LO`|B`^5u[o?(J3?:~N88o)$(');
define('SECURE_AUTH_KEY',  ']w!-Ki;3N-xNx@-@zTy+o36s7x8N!0}K&vo=c@1?YK@X82b<nX++;]Y3sqsL?8Mk');
define('LOGGED_IN_KEY',    '/7s;kJ_icCIP`-MexdRJbbu I1U?k&[NmRIDyq`icW$mh#Avd5HU3:|1oNJ4g0BD');
define('NONCE_KEY',        '|=T]R6,6nh%LE@P]lyx^!b`{$tBX4EC5be&m-9+eeU)wrUa)SD%entPKB[Y-A[d:');
define('AUTH_SALT',        'I?nmpd0i<|+Nxz^.GKQh*Zi|6IIo@420l*~|<(_L%Y14,(F~_a3-^c=?jm6F`|[p');
define('SECURE_AUTH_SALT', '22b @E-$(y0is8Y:K,MR|-tGax4W[=vR][]G@/Wy)mUX;.#qYlhITS6z/a;21eHu');
define('LOGGED_IN_SALT',   'Q(`$dmTIac+SYc4T8:yFk&2fHG/EJF|oKf7!mzB=4CBeo+*c@+TkZzdd2 2h606[');
define('NONCE_SALT',       'uZSu~,=Z_3I&Ev.[gZpE+F:uW+L#Ry,o}Dj}**t[+oVSH-K3TO+)B`+vT9xLbGOt');

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
