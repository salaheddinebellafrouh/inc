<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'wp_user' );
define( 'DB_PASSWORD', 'userpassword' );
define( 'DB_HOST', 'mariadb' );
define( 'DB_CHARSET', 'utf8' );
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
	define('AUTH_KEY',         '|D?^UM-#&V>5GmDL.wIYB|):-%>P-!zk/anBzMdDg`5T#F<{[|?*h>+Z z4wmwi,');
	define('SECURE_AUTH_KEY',  'ESggq9*%=NnW(174Y.r/mdg&GrO##AV+/8#-mo-ZqZ1?Wj]VDhFGsiSC[SV,JY<%');
	define('LOGGED_IN_KEY',    'i(ucZ:/8t%dB(qLgm1E$c-4$@qmVtyg[K+x^8M@,BQUCVN5,VDX*~/rxD36F?PwQ');
	define('NONCE_KEY',        '+9M/gtpYcNz!_W}B9B|7&%;rG#o5-[}g0<;.v8=LRv9(JrS-$Um1N:9zBsE(*|cB');
	define('AUTH_SALT',        'or ^<57j3)fk0UW<JMkp?:%:2#bL?<|i=FA5E+N8Jy|ud}kbax[o<Z6y!Q+WB.[E');
	define('SECURE_AUTH_SALT', 'Wp>iZudeWi<4E:a9f6N@M4519Vd[Y>7PM|m>2K;O%37{C;eLvv@twXg06Nd4bi01');
	define('LOGGED_IN_SALT',   '[SH:f- /94fDo.f ;chE!o )Hn?k9e%jKK09K%$@,^XfB+3:)r7.[U*Ky0_Bb$#t');
	define('NONCE_SALT',       'X`C|e BUfNJ|k|U*ONr6)S3=Xgcpi@xt2I{g-t*:a1?/TGaO+Ir{E`/)+2 *VXxa');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
