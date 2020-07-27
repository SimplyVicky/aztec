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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wethink_wp236' );

/** MySQL database username */
define( 'DB_USER', 'wethink_wp236' );

/** MySQL database password */
define( 'DB_PASSWORD', '1.8K2-nS4p' );

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
define( 'AUTH_KEY',         'll5fpym5nln9oelwoe5ns1f7a6cgaojikjesnquvm3pge4x0lszwurbwxqxrvluf' );
define( 'SECURE_AUTH_KEY',  'jjzhhrcoyadyvbxxf9ojai5se8q9tvn2f2mpan3mpypzieb4yb6nkfafhpnj85up' );
define( 'LOGGED_IN_KEY',    'arkmblc2ccxbkjrfp59zs9stkehsr0d0bfady8crj8jnhkw97uc5ilinsmlu2can' );
define( 'NONCE_KEY',        'ltescpx5bsx2pvazwmvu4ejwpjkzc34pq9rlvzoxkzjxs9p4knxdsdzopeuwdhtz' );
define( 'AUTH_SALT',        'ucfphloorq8pwfsbieuvuukl8pdbjgmw2oxpyfw5ovm6fntimasc1789bmylhwuq' );
define( 'SECURE_AUTH_SALT', 'ggif9vtmvwej9ee3tukavv15dabrs50xjp4tzav7fg0upuvpakqjm1zy6jiwinwi' );
define( 'LOGGED_IN_SALT',   '9hodz0isbny7gddvl8xb9wufquhihmreabgl61nqhrfweqioig9tteohltjbvsae' );
define( 'NONCE_SALT',       'l9hnggskdfhm32p9kykzswo8eyag03bde8us9xsxwnrmfvkzu3ajojcnn1a3xku9' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpsu_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
