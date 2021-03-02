<?php

namespace Parse;

use Helpers\Input;

class Path
{
    public static function toArray(array $paths)
    {
        try {
            if (empty($paths)) {
                throw new \Exception('Error: Path list cannot be empty.');
            }

            $filePaths = array();

            foreach ($paths as $path) {
                $trimmedPath = trim($path, '/');
                $explodedPath = explode('/', $trimmedPath);
                $totalFileDirs = count($explodedPath);

                if ($totalFileDirs > 1) {
                    $lastFileDir = end($explodedPath);
                    $current = &$filePaths;

                    foreach ($explodedPath as $key => $dir) {
                        if ($dir === $lastFileDir) {
                            $current[] = $dir;
                        } else {
                            $current = &$current[$dir];
                        }
                    }
                } else {
                    $filePaths[] = $trimmedPath;
                }
            }

            return self::sortParsedPaths($filePaths);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function sortParsedPaths(array &$filePaths)
    {
        try {
            if (empty($filePaths)) {
                throw new \Exception('Error: Parsed paths cannot be empty.');
            }

            ksort($filePaths, SORT_STRING);

            foreach ($filePaths as $key => &$value) {
                if (is_array($value)) {
                    ksort($filePaths[$key], SORT_STRING);
                    self::sortParsedPaths($value);
                }
            }

            return $filePaths;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function dump(array $paths)
    {
        $parsedPaths = self::toArray($paths);

        $output = '';

        if (Input::isCli()) {
            $output = print_r($parsedPaths, true);
        } else {
            $output = '<pre>';
            $output .= print_r($parsedPaths, true);
            $output .= '</pre>';
        }

        return $output;
    }
}
