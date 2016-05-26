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
define('DB_NAME', 'land');

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
define('AUTH_KEY',         'M@o-B8`mMJzd>.5g]n~E`rWll+~f-5Wu:[7hcqTIT)P`9Mv1gC~.u$j2%>`~!(xF');
define('SECURE_AUTH_KEY',  'lE28=l]3K{hNw4!oM+mnZtEWUC]oy!8mu9;Jg?5>M,23GIi,h#~uMi0R.(-k&}W_');
define('LOGGED_IN_KEY',    '|*Q0xGL)-AHSfKuYDvdN$~)[MW8j_]]eeb+qVw-x=,lmQ1Ky%/GSfiuF*Bc6(_pq');
define('NONCE_KEY',        'hYBg,Ef_>pDWr|(6t@OC{+m[*;UY$;(btm48;/>~_y]`3g}s#A%&]zs~*GvRU;TG');
define('AUTH_SALT',        'Wa0!&|Q/Ne*nhwT^WtacGipXQ9sqZ^k|g%?u@~slD/B}($>C7LAt@@NK3Zr=9N:g');
define('SECURE_AUTH_SALT', '}Y6F:5TFn(T`AVKoqREE{~<cc08]n7IRdVL7bdvK^MH2Gsm{FM3|1Wiz)E_B+mi~');
define('LOGGED_IN_SALT',   '+VMPyNG.61zic(&Yp[#4GhXJ>$))r$ZvwEgb6M8#)S[:N{xB{I]VMA$L-|?5ROMp');
define('NONCE_SALT',       'zf@S)HX_EorI5` nGuVW~Y$|5#4dmN_d.WMSsGC=,V2lfgdH*Z.zRZv$V]2{FyJ4');

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
