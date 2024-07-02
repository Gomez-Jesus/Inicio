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
define( 'DB_NAME', 'db_gomez' );

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
define( 'AUTH_KEY',         '$#EWojIfjZ]!Cq~<&>*ZJxXiJ|T.:Fpb&~k[dFf_MUu0<:6H1`DYxI%2ucRX.V,{' );
define( 'SECURE_AUTH_KEY',  '?K/bGRZ8>c.vyCZ$%yfIjCAgd[uC|+J&79Cbq)#q!RL6GF`.St1GyOQ}izl,4nus' );
define( 'LOGGED_IN_KEY',    '^%mlC]=l,fnN:wT=spj~]*I(wi;N$i}eQe;+<)p` ]voj^R-eF@@K4=wN}T ZQH@' );
define( 'NONCE_KEY',        'Z=JiU$<fJ^)[f4~1+~p&bk+Wh*u [MY.H,Y0t]O^:wM}r5:1:{WKG`8Mp -PuTC3' );
define( 'AUTH_SALT',        'ryo{9n($nyg; uV%>rOj*m}He~plq~z>c%=!B(ZD2_VVat?f~=R@+/>Juy_fdlHN' );
define( 'SECURE_AUTH_SALT', '@tP$!7a,!]]li&p6R(SQ/!|[Y@w7dvoHB]5;yt]E6N)|qCP/V,|3cx-pW Iusc_k' );
define( 'LOGGED_IN_SALT',   '*ga3V]o^*UF*@7`C)jEm.;S+TOEu>@s^n->v%m,MbgI>Rgis$< `uE]SCc(f!b0V' );
define( 'NONCE_SALT',       '<bSVK2Ag^4E/kKtiLjRl`$(%v.X]&&e6NuF@D|]VY3S=&$M>.wD#ba`EoQY%``t&' );

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
