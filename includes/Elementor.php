<?php

namespace EasySmartLogin;

use Elementor\Plugin;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Load elementor class
 */
class Load_Elementor
{
    /**
     * Init elementor class
     *
     * @since 1.0.0
     * @return null
     */
    public function __construct()
    {
        add_action('elementor/elements/categories_registered', [$this, 'register_category']);
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'custom_elementor_scripts']);
    }


    /**
     * custom_elementor_scripts
     * 
     * @since 1.0.0
     */
    public function custom_elementor_scripts()
    {
        $scripts     = $this->get_scripts();

        foreach ($scripts as $handle => $script) {
            $deps    = isset($script['deps']) ? $script['deps'] : false;
            $version = isset($script['version']) ? $script['version'] : (defined('EASY_SMART_LOGIN_VERSION') ? EASY_SMART_LOGIN_VERSION : '1.0.0');
            wp_register_script($handle, $script['src'], $deps, $version, true);
            wp_enqueue_script($handle);
        }
    }

    /**
     * Register elementor category
     *
     * @param object $elementor
     *
     * @since 1.0.0
     * @return object
     */
    public function register_category($elementor)
    {
        $elementor->add_category(
            'easy-smart-login-widgets',
            [
                'title' =>  __('Easy Smart Login Widgets', 'easy-smart-login'),
                'icon'  => 'eicon-font',
            ]
        );

        return $elementor;
    }

    /**
     * Register elementor widgets
     *
     * @since 1.0.0
     * @return void
     */
    public function register_widgets()
    {
        $this->includeWidgetsFiles();

        Plugin::instance()->widgets_manager->register(new \Elementor\Hello_World());
    }

    /**
     * Widget Scripts
     *
     * @since 1.0.0
     * @return array
     */
    public static function getWidgetScript()
    {
        return [];
    }

    /**
     * Lily scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'easy-smart-login' => [
                'src'     => defined('EASY_SMART_LOGIN_ASSETS') ? EASY_SMART_LOGIN_ASSETS . '/js/easy-smart-login.js' : '',
                'version' => defined('EASY_SMART_LOGIN_PATH') ? filemtime(EASY_SMART_LOGIN_PATH . '/assets/js/easy-smart-login.js') : '1.0.0',
                'deps'    => ['jquery']
            ],
        ];
    }

    /**
     * CHH Elementor styles
     *
     * @since 1.0.0
     * @return array
     */
    public function getStyles()
    {
        return [

            'easy-smart-login' => [
                'src'     => defined('EASY_SMART_LOGIN_ASSETS') ? EASY_SMART_LOGIN_ASSETS . '/css/easy-smart-login.css' : '',
                'version' => defined('EASY_SMART_LOGIN_PATH') ? filemtime(EASY_SMART_LOGIN_PATH . '/assets/css/easy-smart-login.css') : '1.0.0',
            ]
        ];
    }

    /**
     * Widget list
     *
     * @since 1.0.0
     * @return array
     */
    public static function getWidgetList()
    {
        return [
            'Hello_World',
        ];
    }

    /**
     * Widget files
     *
     * @since 1.0.0
     * @return void
     */
    public function includeWidgetsFiles()
    {
        $scripts     = $this->get_scripts();
        $styles      = $this->getStyles();
        $widget_list = $this->getWidgetList();

        if (!count($widget_list)) {
            return;
        }

        foreach ($widget_list as $handle => $widget) {
            $file = defined('EASY_SMART_LOGIN_ELEMENTOR') ? EASY_SMART_LOGIN_ELEMENTOR . $widget . '.php' : '';
            if (file_exists($file)) {
                continue;
            }
            require_once $file;
        }

        foreach ($scripts as $handle => $script) {
            $deps    = isset($script['deps']) ? $script['deps'] : false;
            $version = isset($script['version']) ? $script['version'] : defined('EASY_SMART_LOGIN_VERSION') ? EASY_SMART_LOGIN_VERSION : '1.0.0';
            wp_register_script($handle, $script['src'], $deps, $version, true);
            // wp_enqueue_script($handle);
        }

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;
            $version = isset($style['version']) ? $style['version'] : defined('EASY_SMART_LOGIN_VERSION') ? EASY_SMART_LOGIN_VERSION : '1.0.0';
            wp_register_style($handle, $style['src'], $deps, $version);
            // wp_enqueue_style($handle);
        }
    }
}
