<?php

namespace Src\Common\Laravel\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Src\Common\Factory as CommonFactory;

class FilesBrowserControllers extends Controller {

    public function dir(Request $request)
    {
        $factory = new CommonFactory();
        $path = $request->get('path') ?? '';
        $path = ($this->isPathVerify($path)) ? $path : '';
        /** TODO Засунуть это в конфиг */
        $resp = $factory->getFilesBrowser()->setRootDir(config('admin.filesBrowser.rootDir'));
        $resp = $factory->getFilesBrowser()->scanDir($path);
        return response()->json($resp);
    }

    protected function isPathVerify($path)
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

        // return implode('/', $stack);
        return count($stack) > 0;
    }

}