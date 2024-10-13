<?php

namespace EasySmartLogin;

/**
 * API class handler
 */
class Api
{
    /**
     * Initialize API endpoints
     */
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    /**
     * Register API routes
     *
     * @return void
     */
    public function register_routes()
    {
        register_rest_route('easy-smart-login/v1', '/login', [
            'methods' => 'POST',
            'callback' => [$this, 'handle_login'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Handle login request
     *
     * @param \WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function handle_login(\WP_REST_Request $request)
    {
        $username = sanitize_text_field($request->get_param('username'));
        $password = sanitize_text_field($request->get_param('password'));

        $user = wp_authenticate($username, $password);

        if (is_wp_error($user)) {
            return new \WP_REST_Response(['message' => 'Invalid username or password'], 401);
        }

        // Set secure cookie for SSL
        wp_set_auth_cookie($user->ID, true, is_ssl());

        return new \WP_REST_Response(['message' => 'Login successful'], 200);
    }
}
