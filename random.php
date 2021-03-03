<?php
require_once 'init.php';

use Parse\Path;
use Helpers\Input;
use Helpers\Validate;
use Helpers\Sanitize;

try {
    $basePath = '';
    $paths = 0;
    $depth = 0;
    $files = 0;

    if (Input::isCli()) {
        $basePath = Input::cli('base-path');
        $depth = Input::cli('depth');
        $files = Input::cli('files');
        $paths = Input::cli('paths');
    } else {
        $basePath = Input::get('base-path');
        $depth = Input::get('depth');
        $files = Input::get('files');
        $paths = Input::get('paths');
    }

    if (empty($basePath)) {
        throw new \Exception('Error: base-path parameter not found.');
    }

    if (empty($paths)) {
        throw new \Exception('Error: paths parameter not found.');
    }

    if (empty($depth)) {
        throw new \Exception('Error: depth parameter not found.');
    }

    if (empty($files)) {
        throw new \Exception('Error: files parameter not found.');
    }

    if (Validate::int($depth) === false) {
        throw new \Exception('Error: depth only accepts integer values.');
    }

    if (Validate::int($files) === false) {
        throw new \Exception('Error: files only accepts integer values.');
    }

    if (Validate::int($paths) === false) {
        throw new \Exception('Error: paths only accepts integer values.');
    }

    $basePath = Sanitize::string($basePath);
    $depth = intval(Sanitize::int($depth));
    $files = intval(Sanitize::int($files));
    $paths = intval(Sanitize::int($paths));

    $randomPaths = Path::createRandom($basePath, $paths, $depth, $files);

    $output = '';

    if (Input::isCli()) {
        $output = print_r($randomPaths, true);
    } else {
        $output = '<pre>';
        $output .= print_r($randomPaths, true);
        $output .= '</pre>';
    }

    echo $output;
} catch (Exception $e) {
    echo $e->getMessage();
}
