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
define('DB_NAME', 'asd');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'asd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'l:%>Z~LCp$KHl!reK_u]+;U sIY.|:g{xQcF]69u/[%?I^X6%#)zo3xd[=6V(ylE');
define('SECURE_AUTH_KEY',  'Rp?] q]Q&GeKg?z>;_N-A4Ck}:%ZKr&HgW-yT7`hU`7yT$j! ?mb^HE3_Eaedk_/');
define('LOGGED_IN_KEY',    '#,==VzpQ=PTfOUN<iz=2x<q9Zn9U Aq#Z`VAj}~J8d~ukvuA2sj<3:,+;|GWmh5Y');
define('NONCE_KEY',        'iJ*MkAY-f4Pjp>9@im#U)(:B)GPG@)D@M>kQ<0GcHjF7P?fXxegPb28kE=a[LGws');
define('AUTH_SALT',        '9T8)^{zo]l(~aLV;mm_)g_l5Jx,6oS!+$mTuBk D{qRMmlnzm=CknN*t3Ug7+N}R');
define('SECURE_AUTH_SALT', '<B(m<cwFgy;SOwW*2m^Lav_xIpj$w{:PE/J$MlK4rV),3?U%?~Q`X1aj^r7xC*=S');
define('LOGGED_IN_SALT',   'pvsDf*BGvs=hem~DT<[OMKekvLUs>DiKYq(fMS]h(Yd^lufBd,gsR9sOa ~fTYZ;');
define('NONCE_SALT',       'H;T;LPJTBoT4K>K!Zr|^:qbHDi3[mi,!{sFry8V,TX,Q3dJT0yLu`Duq9Y1`bG.`');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
