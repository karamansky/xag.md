<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'argicos_xag' );

/** MySQL database username */
//define( 'DB_USER', 'agricos_xag' );
define( 'DB_USER', 'root' );

/** MySQL database password */
//define( 'DB_PASSWORD', 'DenisXag21!' );
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );
//define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '1+)4@PEySlP33]Pxy33w9R@lN;m5_N260in+~1J~]w:B+|)0-]olr(Vp2QXkK6Q5');
define('SECURE_AUTH_KEY', 'I)I0E)0D)kbJ|-Vd-3hf(4)yul3O2d%uG9J1%0;!3f:50Uq;_t~+::Q4V80F/8[6');
define('LOGGED_IN_KEY', 'le_bsq3fzLbT-~bT%vgsYV~NQy/Drhe3RE2:Fe5*Qnn(XU|eso7D5&Gr049~V2Yw');
define('NONCE_KEY', 'mlRKrvIJ8I(FgdX:%33U791CN-cB8+Ke(H%#7@Q;f8K50dYH0;3ate/_*bmG1]9p');
define('AUTH_SALT', '5JocemKhhy:9GCcNY*-*!22DaR[Z:wlX:y3Y4m5wQvaYyq7&Wy_82-5F@d)RUz2J');
define('SECURE_AUTH_SALT', '28xgsC4@HF3jaEH1)7R~2S[[;+]k4~5:xeR#50)d9y[GJ5[q-le~j5|B*e7zuK55');
define('LOGGED_IN_SALT', 'LYKYLwr#A5w+MN%yOsvR-r8#C/FN6b;)LA9:6[%48Mze0p-@L-3xDujPRe!c(8an');
define('NONCE_SALT', 'h[]vx0Frz_oIf7#t*HLe5Viv2_M&d1;2(1&/d6gYYi6/|G33P%Ja;7#*n_)!us]%');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'JM853ehz_';


define('WP_ALLOW_MULTISITE', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
