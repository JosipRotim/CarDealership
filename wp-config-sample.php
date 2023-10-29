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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_project' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'f&V**vGf!1Za*]h=,;aLR!TL@Q=Jwma.6/WNUS#LEc!WNzBgW{UaJxF#yst@(u3>' );
define( 'SECURE_AUTH_KEY',  'cy|ZFNc5hSb}5r=Z4Z?<&7Icv7`5LfB+Uv8.`0]Wl6.cKS`Cq/yFF>VT+iYo_n,N' );
define( 'LOGGED_IN_KEY',    'aVo5C9Nl{d]CTxl&w3#_6Qrq,7(NKhLBdX3Gu*ZwO&-$U(4y]8C4vTHMs&JHfjPu' );
define( 'NONCE_KEY',        '3G-6YG4^D|/q,(^m/icX.P*6Y#*!hne;j{v|G2OD`i3Hk{ Mc$#x}H0jz15ScTU_' );
define( 'AUTH_SALT',        'WMPvu03$e0@bfp:h[~K=l[*c+{SB!4Ey,IVyH4Z62FS$s8!0Fk[q_^2vVAH^vz-b' );
define( 'SECURE_AUTH_SALT', 'Iu=?)A @#) r8Zz;v*VuWb{LErT_-RbpX6#);fH]SAVN26$X5S/X05RF(slst28Y' );
define( 'LOGGED_IN_SALT',   '/|++MapR%?7HVm?}46leEQ;qC~kNXX!bxIfIqT:yC<=CA{P_pM$aCnV#vybS:v4d' );
define( 'NONCE_SALT',       '39o$EWIUkn6m:W@bv7(iOi}KQq4?sDPg1+w2ATg19~_/P{%qYg!)LF9*`Grg`i3C' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
