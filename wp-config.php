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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_tt_bieb' );

/** MySQL database username */
define( 'DB_USER', 'user_tt_bieb' );

/** MySQL database password */
define( 'DB_PASSWORD', '0000bieb!@' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/H1PL.,,[Zi,JSaB{u:SBVMjs^Kr3iJRcLX_wsEwa7}0/;ry0]E;#LrUQl^[?])S' );
define( 'SECURE_AUTH_KEY',  '2s?viP0I4f]r`xDRYwt$17xS?w<V(*H1iUocD_,b_@AC|p%PkM]Rc&w)>0+)?T*,' );
define( 'LOGGED_IN_KEY',    '!:tG>=o%Wb3m+Tv@>.P,:AhDC|g[hI>O&L=Ks4>>k nw-61|`{S0wSq^hGS@f{PP' );
define( 'NONCE_KEY',        'OKcer.QM^A27QMgnw_NaKrV^l}3SX9QN6M ~Ht@_C,8VfTl&oGkW)wEv*7o~RAve' );
define( 'AUTH_SALT',        'Zso5SaE8`o{^1#bCi/&h4qMVIe9&wIo_j[[aA_pHQntr>wV|Uw<++g{5XyA.:YK(' );
define( 'SECURE_AUTH_SALT', 'etp)y E]7B9rO?kDBDBl^v$3.{qq}?z/c2B_@dhyv|QCK6@8U(T*$Ggvgv^QTdpU' );
define( 'LOGGED_IN_SALT',   'n2i<nKTD dabZ~lXp&,fw~_^)3^fetB?:H/DOwP_1Ks@P~8t:4TN;%5`i89AAQdP' );
define( 'NONCE_SALT',       'O~bGRc&ig_OCOu(Q4M$?1ME`S|+CI,._FEfPSSG)LXEM;_< &I~))Fvs+LB,o/uP' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
