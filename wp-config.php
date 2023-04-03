<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'woocommerce-me');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '>-pHs>;]|ZHv^C8m39QK-iPx$0=~WVz6I3CYj?qy6t<+sg(hMcvjw=Q<ww dw>ci');
define('SECURE_AUTH_KEY',  'zqD)O2}Nt##MD7?se#wv`af/{~*g@x}FXJaFc8$9[*{ypM }Ql%?kZf)aJl7sea=');
define('LOGGED_IN_KEY',    'Ng$Qd .[Be6D0c}_=|#0U}Jyej]h1o+@7U<ekPhE<n`F&TF1$u@Jh1O6xm+1P3&I');
define('NONCE_KEY',        'E=0ggj4 E$wjc,D#tg.@oWT;O7Gtq}>pv,u<-C?5![T-4bR0=xz*CI)3NQCiTP>+');
define('AUTH_SALT',        'C<4XMG~<_+UU5hlVHQCQeB<WyFB{a4cx .M^XRb}w=O)DPq|d [.R[@/ps9_<?,e');
define('SECURE_AUTH_SALT', 'ago qO<bD{(&l20|0^:*vZoJ!Ti@(DC0T d~iVSe6o[G:[^~8 wI?LzT2<gxVbq`');
define('LOGGED_IN_SALT',   'cI>ak4 #_Jax/<A]}#AA[Im<bl>3ouhJQ<XauYkir6]!_*v20Nd~|Lq]`L6-Mh6z');
define('NONCE_SALT',       'VVR$R2s|-/8(T.ejK@%w`E&+n}KW7NW% 6,bV{rf:Q%$3b:F>PN~!lxzJV%2Fu3c');

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
