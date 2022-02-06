<?php

namespace Src\Common\Laravel\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class FilesBrowserControllers extends Controller {

    public function dir(Request $request)
    {
        $resp = [
            'dirs' => [
                'dir1',
                'dir2',
            ],
            'files' => [
                'file1',
                'file2',
            ],
        ];
        return response()->json($resp);
    }

}