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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'm1_m19_atelier');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '5:a#+>@a)8G7!g# lYqS~ht?*%R0w+0Y?0Rn*a&~#ptN>)qP@]?vMdXYGnBm7U=|');
define('SECURE_AUTH_KEY',  '7f1xqeS/KI %3?m74xFU/)-TVWY_$IW`a+{&y54bO4l`e{n}Fd`7&Iu!ElSBbDf<');
define('LOGGED_IN_KEY',    '14CVmbP-BI E8CQ{%3riUDBYt8)HukJd+#0(qd^IuV]^b@jmCYJR^fk g[%6nOa/');
define('NONCE_KEY',        '}{?@7W$ft9xXwAXaAOQHBJDI4s$jP.:n^.EOz.=B@l,KPf&LoexxIb0L&_(?VyPu');
define('AUTH_SALT',        ' 9*G&nM|KWq%hZ4$ y9^*RIlOl:p1;ELA ZKI}wAl(W/7dybi:`oL^;&SAU-BM`f');
define('SECURE_AUTH_SALT', '^C=kV McIq#rmVc15&}ybOgl*?PjOOIW<U@Qs*v:S0a<hsQFh<`.z`DrlzY>q=/c');
define('LOGGED_IN_SALT',   '%B7a&uz&i4Z(j_Zcw%_iOXQ0Ps2$b?>9yE:dG.K?_{AMZ$ uBgA-I5w?^i0H#h_y');
define('NONCE_SALT',       '!|TJlez6z%ge}r|,:|bs]B`=co9obnS }c-Y-[OA<n5tQoxcf9~-P9k4$Lr]59tV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
