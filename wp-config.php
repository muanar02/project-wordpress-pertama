<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'belajar' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_&8D-g]pD0Z.j^2~dPEy .S);}*nM>AVG+-,2ice(LX>GKtULe:K{M;C+ui7sxD0' );
define( 'SECURE_AUTH_KEY',  'x5-*b1|3yltZ{xxQ~[29_GR4hX{XwPt-IU]M8lW@vqIaF[1QNPv :c$K.QsN.>(+' );
define( 'LOGGED_IN_KEY',    'f|B4<tbuHJM?s@LE7j?0/w+Bg(7I_TTkU@*jyF]p<V2%Qhvx+fE~x6V_|&qiMlLP' );
define( 'NONCE_KEY',        '~F6n;v`U5(ASUM6w&Bo|47^x2mb1tIR4;g!sG)Z|I[CH#`$t7Mg>oC%W[)n5rrm3' );
define( 'AUTH_SALT',        'EBk-!C&L1i lEtu_qjr|c9+$$`drT,(oo?WX[_?mb $y,|@Q=^reUu[Wo[ShM&]t' );
define( 'SECURE_AUTH_SALT', 'nq=k,{8?2r$OD#20~4<aiPIzF[P3D/:7rg@y=L{1zJ?Mh$javlc[Ei#S7df>gsHQ' );
define( 'LOGGED_IN_SALT',   'X<GVep,uOr0Z)Vre-nsr.Ibv~VF4AVZ$AS$*KO}[#KU1tEhIChN@a1!/ss9W../A' );
define( 'NONCE_SALT',       '{}f7y$g63U:XpKXqhEZ9Ni|J-,0FEvF7-Lo5#&VF@[adADM.TXA4KRL&Q2n)]RUW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tnj_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');
