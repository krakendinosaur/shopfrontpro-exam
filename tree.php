<?php
require_once 'init.php';

use Parse\Path;
use Helpers\Input;
use Helpers\Sanitize;

try {
    $depth = 0;
    $leafs = 0;

    if (Input::isCli()) {
        $depth = intval(Sanitize::int(Input::cli('depth')));
        $leafs = intval(Sanitize::int(Input::cli('leafs')));
    } else {
        $depth = intval(Sanitize::int(Input::get('depth')));
        $leafs = intval(Sanitize::int(Input::get('leafs')));
    }


    if (empty($depth)) {
        throw new \Exception('Error: Depth does not accept null or zero values.');
    }

    if (empty($leafs)) {
        throw new \Exception('Error: Leafs does not accept null or zero values.');
    }

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
