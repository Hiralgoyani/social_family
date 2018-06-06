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
define('DB_NAME', 'admin_natsocialdev');

/** MySQL database username */
define('DB_USER', 'natsa');

/** MySQL database password */
define('DB_PASSWORD', 'vsD_31z4');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_MAX_MEMORY_LIMIT', '1024M' );


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ar!1U,GxP0{KX=AHGR%5ND#/|x7/Ku[O*&{!66k+oDlAq9(Gaxdd&V>G!*7LW{W*');
define('SECURE_AUTH_KEY',  'hIqX;fd.PP=BO}jA5>cDzitSUm1} SqgG6PlT<htm~mDnJ`t7?}u$jF:,cQF}1a!');
define('LOGGED_IN_KEY',    'NT|e:@1v*KaXK&W+LrAm*}OoDd`8VTg7[#;tr_K#+%s1Kw&6NJYl|$.}(hB%lVwa');
define('NONCE_KEY',        '}3Ib;Gg+jEhQW.*v]S$WN-!j:VMqSmDY>~#LP*f=P/suT`k^:y 4AsH&:B_sV$>c');
define('AUTH_SALT',        'PV.}RaoS<eotq+b|=Qt*B`h**eCT]pn2RN0v>DPB@FcX9*cE}N.W/Z<` X$nYCC8');
define('SECURE_AUTH_SALT', ':Ou@xNam!3OM9#ukNmgP&oI)0+DQ]U%ihu~S)7vIG@[/~(y},0=)QrE}0-o9zGs%');
define('LOGGED_IN_SALT',   '9kw zKkrDXfv).K2z:ez|2{o?X:m@lb.2=tcog(L a;K<eas@Ze~Woi(NO{7`lcV');
define('NONCE_SALT',       'b@Uv/XHV|=uie@5/oi#vK:+bOET07Y|!Ox>=BD5AW.sJCO0O)}|+%/Fp`zm$!z%?');

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
define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
