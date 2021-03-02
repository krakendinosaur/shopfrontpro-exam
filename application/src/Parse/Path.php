<?php

namespace Parse;

use Helpers\Input;

class Path
{
    const DEFAULT_COUNT_INDENTION_SPACES = 4;

    const WEB_SPACE = '&nbsp;';

    const WEB_NEWLINE = '<br />';

    const CLI_SPACE = ' ';

    const CLI_NEWLINE = "\n";

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

    public static function createTree(array &$parsedPaths, int $depth, int $leafs, int &$currentCount = 0)
    {
        try {
            if (empty($depth)) {
                throw new \Exception('Error: Depth does not accept null or zero values.');
            }

            if (empty($leafs)) {
                throw new \Exception('Error: Leafs does not accept null or zero values.');
            }

            $space = self::WEB_SPACE;
            $newline = self::WEB_NEWLINE;

            if (Input::isCli()) {
                $space = self::CLI_SPACE;
                $newline = self::CLI_NEWLINE;
            }

            $display = '';

            $currentCount++;
            $leafCount = 0;

            foreach ($parsedPaths as $key => $value) {
                $spacesCount = ($currentCount - 1) * self::DEFAULT_COUNT_INDENTION_SPACES;

                if ($leafCount >= $leafs) {
                    continue;
                }

                if (is_array($value)) {
                    $display .= str_repeat($space, $spacesCount) . $key . $newline;

                    $depth--;

                    if ($depth > 0) {
                        $display .= self::createTree($value, $depth, $leafs, $currentCount);
                    }
                } else {
                    $display .= str_repeat($space, $spacesCount) . $value . $newline;
                }

                $leafCount++;
            }

            return $display;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
