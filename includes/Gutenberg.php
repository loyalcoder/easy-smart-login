<?php

namespace EasySmartLogin;

/**
 * Gutenberg class handler
 */
class Gutenberg
{
    /**
     * Initialize Gutenberg blocks
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_blocks']);
    }

    /**
     * Register Gutenberg blocks
     *
     * @return void
     */
    public function register_blocks()
    {
        register_block_type(__DIR__ . '/../build/login-form');
        register_block_type(__DIR__ . '/../build/login-form-user-name');
        register_block_type(__DIR__ . '/../build/login-form-user-password');
        register_block_type(__DIR__ . '/../build/login-form-user-authenticate-cookie');
        register_block_type(__DIR__ . '/../build/login-form-submit');
    }
}
