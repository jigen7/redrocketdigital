<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'redrocketdigitalarts');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'qe.ypF>Xz-61poz|z80XMn3eiE_cSJjeRX&Bpb,kzUqeXU#85wgflB}Lh;[C7W=g');
define('SECURE_AUTH_KEY',  ']k3b^VhKx8:!P`tOnr!LA1#F_l>fJOfl4*nAS/Nj]Vr@^SjWi(Nr)V6jAB9$2IML');
define('LOGGED_IN_KEY',    '[9P]hDa4[wiFW#=DzjWg;NV;k#2xd)nQ-c3I }Z]je]E)g7*AIs%=,:2&PA:,w<!');
define('NONCE_KEY',        'wF+]}L[4].]d}oXl5t5|B+TC%kFjoEH-S?.lTmjxsv^>|7}&quKL34tT>+pP?QGW');
define('AUTH_SALT',        'Z@Bl+U^+zcphSPo/ev3n]!mY5TH&[ajVzfeM?z5#DSGy7j:Lx$H ((2]`q864`$|');
define('SECURE_AUTH_SALT', 'NVGTe%C!s:/WQ)97%I+pbgu?I]G>#|F,!*~1-?*0T!i Etch6-Mo$3vzYun0j4g8');
define('LOGGED_IN_SALT',   'wrgyJ%oUFjEL DlzE%qXm%mh7(}Z:wG--GnK7z@k`bm~|f~pS/7= e1U>HWmfPY#');
define('NONCE_SALT',       'E5Kl@IlR6.toRo32/n*^3V_vOh5P:SV5v[,n2Go<+a+N|hJOI6x|b,zxbD}EL((4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
