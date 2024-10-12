<?php

namespace EasySmartLogin;

/**
 * Ajax class
 */
class Ajax
{
    /**
     * Initialize ajax class
     */
    public function __construct()
    {
        add_action('wp_ajax_easy_smart_login_enquiry', [$this, 'enquiry']);
        add_action('wp_ajax_nopriv_easy_smart_login_enquiry', [$this, 'enquiry']);
    }

    /**
     * Perform enquiry operation
     *
     * @return array
     */
    public function enquiry()
    {
        if (!wp_verify_nonce($_REQUEST['_wpnonce'], 'easy-smart-login-enquiry-form')) {
            wp_send_json_error([
                'message' => __('Nonce verification failed!', 'easy-smart-login')
            ]);
        }

        wp_send_json_success([
            'message' => __('Perform your operation', 'easy-smart-login'),
            'data'    => $_REQUEST,
        ]);
    }
}
