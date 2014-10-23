<?php
/**
 * Created by PhpStorm.
 * User: Christoph
 * Date: 19.07.14
 * Time: 23:54
 */

class ErrorController {
    function page_load($msg) {
        $this->display_error('Page load failed', $msg);
    }
    function template_load($msg) {
        $this->display_error('Template load failed', $msg);
    }
    function display_error($header, $content) {
        echo '<!DOCTYPE html><html><title>' . SITE_NAME_SHORT . ' - Error</title><head><link rel="stylesheet" href="global/css/error.css"></head><body><div class="onyx_error_box"><div class="onyx_error_header">' . $header . '</div><div class="onyx_error_content">' . $content . '</div></div></body></html>';
    }
}