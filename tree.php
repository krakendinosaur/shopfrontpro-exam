<?php
require_once 'init.php';

use Parse\Path;

$paths = array(
    '/home/user/folder1/folder2/kdh4kdk8.txt',
    '/home/user/folder1/folder2/565shdhh.txt',
    '/home/user/folder1/folder2/folder3/nhskkuu4.txt',
    '/home/user/folder1/iiskjksd.txt',
    '/home/user/folder1/folder2/folder3/owjekksu.txt'
);

$parsedPaths = Path::toArray($paths);
echo Path::createTree($parsedPaths, 6, 3);
