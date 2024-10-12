<?php

namespace EasySmartLogin\Admin;

use EasySmartLogin\Traits\Test;

/**
 * Handle settings
 */
class Settings
{
    use Test;

    /**
     * Setting page template handle
     *
     * @return void
     */
    public function settings_page()
    {
        $template = EASY_SMART_LOGIN_PATH . '/includes/Admin/views/settings.php';

        if (file_exists($template)) {
            include $template;
        }
    }

    /**
     * Report handler
     *
     * @return void
     */
    public function report_page()
    {
        $template = EASY_SMART_LOGIN_PATH . '/includes/Admin/views/report.php';

        if (file_exists($template)) {
            include $template;
        }
    }
}
