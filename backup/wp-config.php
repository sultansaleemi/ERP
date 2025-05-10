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
define('DB_NAME', 'sxjnqpte_WP62G');

/** Database username */
define('DB_USER', 'sxjnqpte_WP62G');

/** Database password */
define('DB_PASSWORD', '!)l!a@E_roO#LpI)F');

/** Database hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', 'de85b8e30a0fcd380d911de2204786011f526ff30ec0905fb9ef8776549a0999');
define('SECURE_AUTH_KEY', 'f08f755b5a24b12543251ac12578fce7e7ad8384ce5350cb3b3066a1aafdd8cb');
define('LOGGED_IN_KEY', '065351d3b4bc39bbda491cd0bf9a6c861874c8904c848c18c4a9c64e031c6537');
define('NONCE_KEY', '400b2fa20993017f7d5c7bb2ab0c8e39d36ccc0682ff79dc89c0a9d1ab3c7e16');
define('AUTH_SALT', '419203edeb6ec17f638d4b8dac1e2fb4b875237eb8980d06a0bf276c49367fa4');
define('SECURE_AUTH_SALT', 'b7a57a66a20367b03cb6bc7e4bc9461a075f7b72d195a6329020199c454d902b');
define('LOGGED_IN_SALT', 'dac80ad605e459a7cb09c95acf6df0425e8ee9cc3a7789013cd9881f1493e4bb');
define('NONCE_SALT', '06602b48163595774b5df45c58f2c21be2af4d9fddf694032fdb3bc13aab57db');

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
$table_prefix = 'NN5_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 20);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

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
