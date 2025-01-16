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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', 'userpassword' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'I`vJiO {gc.O>]}6=cLlz3I^?~4tE1:H%|>wf>Hg;cZ$8xHDKI4W%aN(_32#zkcj' );
define( 'SECURE_AUTH_KEY',   ';$}Y`pzP%S+>d~_,j|rn;E`Rd)ks!3)I#,#Nl b6aA<,zr0ECD{I&&<+Q/8aYLFF' );
define( 'LOGGED_IN_KEY',     'Sx#ejiQJz~/N*%e1)q7Q%cTQt9%3a^Uo<>k..W<KAp,I)e/<,#Z5X]HjI*{O_sc)' );
define( 'NONCE_KEY',         'pimwyUKc;(2&;ES1&}yi8bp-%J~o}YV5.m_ I0k/7`J[!][]PpHb,^:m5%!_0#bf' );
define( 'AUTH_SALT',         'abEYB-Y[0Vs5+NQc/t/7 v-}y+`(phf|aI4N(OavkErk=UAXkR1%+~OPDOlYizBN' );
define( 'SECURE_AUTH_SALT',  '1}~1V>{#gh{|.Fdv49A%~=a^),7OC]%|;sqSE1 EoVXVmQ%|y!)+JL2_%_S!}+W}' );
define( 'LOGGED_IN_SALT',    '[rmV6VjNvm2aX^Q+BOC|{I;v%Y`]9FJ*u`l|p&(WV7[EKBV:cs)h:0Yu.4x]0{us' );
define( 'NONCE_SALT',        'wb]UXrIR2-N4Kd{[:VYv#$E@C^cl(fR)x!,X<awf8!(Y68j B#/S]PpR64~3-_9X' );
define( 'WP_CACHE_KEY_SALT', 'BItt!w|,H&DT`Tr|~/B!H|CChl++u2UFX6?g]-{#cG:6YrXg/m(bc@,IjO4kAe;|' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
