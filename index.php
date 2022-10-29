<?php

$app_folder = 'app';
$system_folder = 'system';
$composer_autoload = 'vendor/autoload.php';
$modules_folder = 'app/modules';
require __DIR__ . '/vendor/autoload.php';

if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

if (($_temp = realpath($system_folder)) !== FALSE) {
    $system_folder = $_temp . '/';
} else {
    // Ensure there's a trailing slash
    $system_folder = strtr(
        rtrim($system_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    ) . DIRECTORY_SEPARATOR;
}

// Is the system path correct?
if (!is_dir($system_folder)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(3); // EXIT_CONFIG
}

// check if composer autoload exists
if (!file_exists($composer_autoload)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Composer autoload file not found. Please run composer install.';
    exit(3); // EXIT_CONFIG
}
// The path to the "system" directory
define('BASEPATH', $system_folder);

// The path to the "application" directory
if (is_dir($app_folder)) {
    if (($_temp = realpath($app_folder)) !== FALSE) {
        $app_folder = $_temp;
    } else {
        $app_folder = strtr(
            rtrim($app_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
} elseif (is_dir(BASEPATH . $app_folder . DIRECTORY_SEPARATOR)) {
    $app_folder = BASEPATH . strtr(
        trim($app_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(3); // EXIT_CONFIG
}

// The path to the "modules" directory
if (is_dir($modules_folder)) {
    if (($_temp = realpath($modules_folder)) !== FALSE) {
        $modules_folder = $_temp;
    } else {
        $modules_folder = strtr(
            rtrim($modules_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
} elseif (is_dir(BASEPATH . $modules_folder . DIRECTORY_SEPARATOR)) {
    $modules_folder = BASEPATH . strtr(
        trim($modules_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your modules folder path does not appear to be set correctly. Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(3); // EXIT_CONFIG
}

// 
define('APPPATH', $app_folder . DIRECTORY_SEPARATOR);
define('MODULESPATH', $modules_folder . DIRECTORY_SEPARATOR);

require_once APPPATH.'/modules/modules.php';
require_once 'system/core/Init.php';

require_once 'system/Routes.php';
new \system\Routes();
require_once BASEPATH . 'core/Core.php';