<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function fileMetadata(Request $request)
    {
        return response()->json([
            'name' => $request->file->getClientOriginalName(),
            'type' => $request->file->getMimeType(),
            'size' => $request->file->getSize(),
        ]);
    }
}
