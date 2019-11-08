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
define( 'DB_NAME', 'rtcamp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '~{$)9HjIBA;3E|.3&$dww,cF1g+ExB1q[|/~gxo;!cTf/`3qazPate|6C=x+9>s$' );
define( 'SECURE_AUTH_KEY',  '~/+hgx?X}YT;!u/>O-M=NZ=]*7[1R>L}or&KZl.}I!VVLsRCcZ<l66t(A?u%)]C:' );
define( 'LOGGED_IN_KEY',    '!8D4fg9AqTARIfR#<SYZTTF<;@6oH-+aA0QOI$*}!A64&WdH(;CSV7iL]J5.KT<W' );
define( 'NONCE_KEY',        '1KfW$:R{-`US|VUQFRkV:klF?-8EEQT!&%2LfE}EFt{/|Cll~^Y1n:JB6,y&;n#S' );
define( 'AUTH_SALT',        '3,$$-@ZpvmP&@TAu|`qu8^$;:?dzJ8v4vk3Lva||+iKA71Ijai]NOHI7 }%}%%n`' );
define( 'SECURE_AUTH_SALT', ' (T_Cn!yy9IH_JB(YZt6gS}Njuj{x1u*wr~U-[{PluvZafjuM0uw;t$m-E@`w_`?' );
define( 'LOGGED_IN_SALT',   'KCoqU5Dv(Y/$rvPm4||_i$^VMvq} h5dtwt5NuY^ >|nb!#lAl+x9`P]@mF}VX2}' );
define( 'NONCE_SALT',       ']k#bH@vF&&P[p:t/yQQj@Qy4(&GF5(anm&,0q_fF*6)|.R8fM!TxBe=>c=Oh}Y,l' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
