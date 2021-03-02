<?php
require_once 'init.php';

use Parse\Path;
use Helpers\Input;
use Helpers\Validate;
use Helpers\Sanitize;

try {
    $depth = 0;
    $leafs = 0;

    if (Input::isCli()) {
        $depth = Input::cli('depth');
        $leafs = Input::cli('leafs');
    } else {
        $depth = Input::get('depth');
        $leafs = Input::get('leafs');
    }

    if (empty($depth)) {
        throw new \Exception('Error: depth parameter not found.');
    }

    if (empty($leafs)) {
        throw new \Exception('Error: leafs parameter not found.');
    }

    if (Validate::int($depth) === false) {
        throw new \Exception('Error: depth only accepts integer values.');
    }

    if (Validate::int($leafs) === false) {
        throw new \Exception('Error: leafs only accepts integer values.');
    }

    $depth = intval(Sanitize::int($depth));
    $leafs = intval(Sanitize::int($leafs));

    $paths = array(
        '/home/user/folder1/folder2/kdh4kdk8.txt',
        '/home/user/folder1/folder2/565shdhh.txt',
        '/home/user/folder1/folder2/folder3/nhskkuu4.txt',
        '/home/user/folder1/iiskjksd.txt',
        '/home/user/folder1/folder2/folder3/owjekksu.txt'
    );

    $parsedPaths = Path::toArray($paths);
    echo Path::createTree($parsedPaths, $depth, $leafs);
} catch (Exception $e) {
    echo $e->getMessage();
}
