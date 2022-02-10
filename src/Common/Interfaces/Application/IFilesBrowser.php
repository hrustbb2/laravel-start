<?php

namespace Src\Common\Interfaces\Application;

interface IFilesBrowser {
    public function setRootDir(string $rootDir):void;
    public function scanDir(string $path):array;
}