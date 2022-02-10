<?php

namespace Src\Common\Application;

use Src\Common\Interfaces\Application\IFilesBrowser;

class FilesBrowser implements IFilesBrowser {

    protected $rootDir = './';

    public function setRootDir(string $rootDir):void
    {
        $this->rootDir = $rootDir;
    }

    public function scanDir(string $path):array
    {
        $files = scandir($this->rootDir . $path);
        $result = [];
        $path = $this->canonicalizePath($path);
        foreach($files as $file){
            $result[] = [
                'name' => $file,
                'path' => $path,
                'isDir' => is_dir($this->rootDir . $path . '/' . $file),
            ];
        }
        return $result;
    }

    private function canonicalizePath($path)
    {
        $path = explode('/', $path);
        $stack = array();
        foreach ($path as $seg) {
            if ($seg == '..') {
                // Ignore this segment, remove last segment from stack
                array_pop($stack);
                continue;
            }

            if ($seg == '.') {
                // Ignore this segment
                continue;
            }

            $stack[] = $seg;
        }

        return implode('/', $stack);
    }

}