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

define('DB_NAME', 'expwpdb');



/** MySQL database username */

define('DB_USER', 'expwp_user');



/** MySQL database password */

define('DB_PASSWORD', 'expwp!103');



/** MySQL hostname */

define('DB_HOST', 'db:3306');



/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');



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

define('AUTH_KEY',         '0363b6a388f83f9adcc3c70fba28fbac83aab06a');

define('SECURE_AUTH_KEY',  '2b2347d10388f975935d8fe9fa06054bcb8777c9');

define('LOGGED_IN_KEY',    '825f79453444d2fa3b64ba7ed963a1b5e33df049');

define('NONCE_KEY',        'add81f95d0c592e6c59e255f0413c9d0bc1bc416');

define('AUTH_SALT',        '2f36e9ba0bf6fbb42e8a4c8fb97afd553f6af0d1');

define('SECURE_AUTH_SALT', 'cc475dfcf642b8ff65d39dd3f4067d90f229bc2e');

define('LOGGED_IN_SALT',   'e4d7cc7852775a716bdee20e41e202ee82e234f4');

define('NONCE_SALT',       '');



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



// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

