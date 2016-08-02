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
define('DB_NAME', 'wordpress-test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'S%t6fd2316asdkj');

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
// define('AUTH_KEY',         'put your unique phrase here');
// define('SECURE_AUTH_KEY',  'put your unique phrase here');
// define('LOGGED_IN_KEY',    'put your unique phrase here');
// define('NONCE_KEY',        'put your unique phrase here');
// define('AUTH_SALT',        'put your unique phrase here');
// define('SECURE_AUTH_SALT', 'put your unique phrase here');
// define('LOGGED_IN_SALT',   'put your unique phrase here');
// define('NONCE_SALT',       'put your unique phrase here');
define('AUTH_KEY',         'NFKShUC-V/[MqUHKN>WHL(2(L R,RG5nf5XO|P7VU>0Dhcl|tG=`ZQr]8$N]|!Ax');
define('SECURE_AUTH_KEY',  '`#2vg6&_A+wgg8|J1-_;t~^1nGEl.l6FY.1S;6Ajm@+F(-|xs|0X,>0|x!B-;M)q');
define('LOGGED_IN_KEY',    'JOalpNgJvInA-+qXRf?yl+?]YBJ2u-`c=soT%Rf?~in=6F>//Q:>r l`%68rRa)D');
define('NONCE_KEY',        '0!$q~<]F[s&8aj.X vW &V]JI%`&liWBE-LPe7a@98n?7[^<vt3@!6@fj~t(=Ce$');
define('AUTH_SALT',        'x<sB{0i<@Q<?%vw/g}<cetm zr2gxi/$-Qh?|s.lw(Z4Ar~trxt?@R|*9_4Gg^^x');
define('SECURE_AUTH_SALT', '2jF*-v$uE3k<|}V@R=tR([l+tksBR=]-OIyy!%m}E,k;,T8eCHP2]QO*snE7JEV/');
define('LOGGED_IN_SALT',   '}7/IC,q)/,-mHT0KGSdfAO!KI?,Jl bUXaS~JD.dxdPCN1Gng!SYN+ .qJKk82Q2');
define('NONCE_SALT',       '|gJfcH7`o*7avn(ILu;%|b.}-J$P.A5<:;57bc k&fOTr.I)4$c=Xs6(m_-Jt_?e');
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
