<?php

/**
 * Plugin Name:       Easy Smart Login
 * Plugin URI:        https://example.com
 * Description:       A simple and smart login plugin for WordPress
 * Version:           1.1.0
 * Author:            YourName
 * Author URI:        https://yourwebsite.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       easy-smart-login
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/includes/init.php';

/**
 * Main plugin class
 */
final class EasySmartLogin
{
    /**
     * Plugin version
     * 
     * @var string
     */
    const version = '1.1.0';

    /**
     * constructor
     */
    private function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /**
     * Initialize singleton instance
     *
     * @return \EasySmartLogin
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('EASY_SMART_LOGIN_VERSION', self::version);
        define('EASY_SMART_LOGIN_FILE', __FILE__);
        define('EASY_SMART_LOGIN_PATH', __DIR__);
        define('EASY_SMART_LOGIN_URL', plugins_url('', EASY_SMART_LOGIN_FILE));
        define('EASY_SMART_LOGIN_ASSETS', EASY_SMART_LOGIN_URL . '/assets');
        define('EASY_SMART_LOGIN_DIR_PATH', plugin_dir_path(__FILE__));
        define('EASY_SMART_LOGIN_ELEMENTOR', EASY_SMART_LOGIN_DIR_PATH . 'includes/Elementor/');
    }

    /**
     * Plugin activation
     *
     * @return void
     */
    public function activate()
    {
        $installer = new EasySmartLogin\Installer();

        $installer->run();
    }

    /**
     * Load plugin files
     *
     * @return void
     */
    public function init_plugin()
    {
        new EasySmartLogin\Assets();
        new EasySmartLogin\Ajax();
        new EasySmartLogin\Gutenberg();
        new EasySmartLogin\Api();
       // new EasySmartLogin\Load_Elementor();
        if (is_admin()) {
            new EasySmartLogin\Admin();
        }
    }
}

/**
 * Initialize main plugin
 *
 * @return \EasySmartLogin
 */
function easy_smart_login()
{
    return EasySmartLogin::init();
}

easy_smart_login();
