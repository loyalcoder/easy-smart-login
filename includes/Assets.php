<?php

namespace EasySmartLogin;

/**
 * Assets class handler
 */
class Assets
{
    /**
     * Initialize assets
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
    }

    /**
     * EasySmartLogin scripts
     *
     * @return array
     */
    public function get_scripts()
    {
        return [
            'easy-smart-login-script' => [
                'src'     => EASY_SMART_LOGIN_ASSETS . '/js/frontend.js',
                'version' => filemtime(EASY_SMART_LOGIN_PATH . '/assets/js/frontend.js'),
                'deps'    => ['jquery']
            ],
            'easy-smart-login-enquiry-script' => [
                'src'     => EASY_SMART_LOGIN_ASSETS . '/js/enquiry.js',
                'version' => filemtime(EASY_SMART_LOGIN_PATH . '/assets/js/enquiry.js'),
                'deps'    => ['jquery']
            ]
        ];
    }

    /**
     * EasySmartLogin styles
     *
     * @return array
     */
    public function get_styles()
    {
        return [
            'easy-smart-login-style' => [
                'src'     => EASY_SMART_LOGIN_ASSETS . '/css/frontend.css',
                'version' => filemtime(EASY_SMART_LOGIN_PATH . '/assets/css/frontend.css'),
            ]
        ];
    }

    /**
     * Register assets
     */
    public function register_assets()
    {
        $scripts = $this->get_scripts();
        $styles = $this->get_styles();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? $script['deps'] : false;
            $version = isset($script['version']) ? $script['version'] : EASY_SMART_LOGIN_VERSION;

            wp_register_script($handle, $script['src'], $deps, $version, true);
        }

        wp_localize_script('easy-smart-login-enquiry-script', 'esl_data', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'message' => __('Message from enquiry form', 'easy-smart-login'),
        ]);

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? $style['deps'] : false;
            $version = isset($style['version']) ? $style['version'] : EASY_SMART_LOGIN_VERSION;

            wp_register_style($handle, $style['src'], $deps, $version);
        }
    }
}
