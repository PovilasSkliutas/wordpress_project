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
define('DB_NAME', 'WPprojectNo1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'dE_1rWo/9X*tv8Vmu`d0^e_*1+`JEC:.0bx_dzoFVnsy1rAK?ru(Fz0E{`IEXJ>?');
define('SECURE_AUTH_KEY',  '60uAJ@Ef@iX%hc1$e^gx5{Ljz*<TEs]aure|i5yG{Gx(xuMjS&@wp`iX_1dpu7x(');
define('LOGGED_IN_KEY',    '2eiRf~KX~8SI2y{:Qv_-TcGvc.+1{S|zd:i+v-p0:@7n.{ovzgIb<fQ}(;[Ic=PV');
define('NONCE_KEY',        'bM%Ap4!.^{%IQ^>/g~n~6|bsbQVB#6c#:f(-H+Trd*r{0=3{Bp8;7p-M:l1h,USf');
define('AUTH_SALT',        'SK<CHwI$m)F7jo?xGfk*KB^78l]-pM84{;p.9aP&JS*//Gxv.V0Qn,(,ih[M#EgU');
define('SECURE_AUTH_SALT', '[<ED3~YFA#:?p(C8h/=.=5-8SVT{w1`W#~:ho=1E9jxvrfuD)!fRS+kUnrkJ#@5/');
define('LOGGED_IN_SALT',   'S,A1UchMu<&]wTi7g/p+n/I T]J d=y 2)^$W^mQNh~SBS}OPs?@%V=fdsP3#}y>');
define('NONCE_SALT',       'HlQN:)23xs350@SY[92H[ib8T~m?TC<2zgs)PQmCF{jc#GF%X,DatR**uQ6H|yI`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ps_';

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
