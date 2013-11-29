<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'urbanopus_site');

/** MySQL database username */
define('DB_USER', 'uo_user');

/** MySQL database password */
define('DB_PASSWORD', 'urbanOpusAdmin');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '8t/4z:pSli4J_|._E<zm5BtU@.O-X{7}QFNTMnpKg81kQoYra1{jl<6DJ9zk&7*>');
define('SECURE_AUTH_KEY',  '<|gV]zI^6&YI1VLQ]!vRv,nZis~Rw%Ij>Q@Q}3dA(gw-.&s]xQ;/@T4s%sgQvT^v');
define('LOGGED_IN_KEY',    '7}cRv_VE+_xR||2e{mP}=6F0C46Pv+et|}CB.TM-Sps7VQVqx?|[<;[1JySK>!-~');
define('NONCE_KEY',        '={[cP4+AL!>4oeP.. DiDxB%_+HU8TU8Q7_+23<d00jN@pgMZwf30H>b(V14Y>dr');
define('AUTH_SALT',        '/~]h8r7OH4q0r&@JhFKSw{@ZJwU-| ^&.!e#q/|[=7zSGIyOC|t+S-=k9wy,z=Rn');
define('SECURE_AUTH_SALT', '!?B;-2?VVePYZX~trQH{[=[&,nd1-rL5ZuRng}JGyvn]|:ZGy]K5C>:3HN{a[9u+');
define('LOGGED_IN_SALT',   'Np|{Q7V5/{X0hbbU1 $w:zmXoFsjYz$0x7Br}]hT!8l|ykk/J{0Aeb+w{Mb+Az&=');
define('NONCE_SALT',       'I#P&qcZnuw]5Y17s91~xTn#8xpnNE+=#<bov609KYc;C?s1iP0{-7-e|6uBlSY-P');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to Canadian English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * en_CA.mo to wp-content/languages and set WPLANG to 'en_CA' to enable Canadian
 * English language support.
 */
define('WPLANG', 'en_CA');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


/* ADDITIONAL NON DEFAULT CONFIG 
 * These settings are added specifically for the urbanopus landing page
 */
define("FEATURED_APP_1", 454);
define("FEATURED_APP_2", 436);
define("FEATURED_APP_3", 448);
