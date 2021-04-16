<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pbmedia\FilesystemProviders\WebDAVServiceProvider;
use Illuminate\Support\Facades\Storage;

class webDavController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('dirname')) {
            $response = Storage::disk('webdav')->listContents($request->get('dirname'));
            $currPath = $request->get('dirname');
            return view('welcome')->with(['response' => $response, 'currPath' => $currPath]);
        }
        $response = Storage::disk('webdav')->listContents('/');
        $currPath = '/';
        return view('welcome')->with(['response' => $response, 'currPath' => $currPath]);
    }

    public function delete(Request $request)
    {
        if ($request->get('path')) {
            Storage::disk('webdav')->delete($request->get('path'));
            $response = Storage::disk('webdav')->listContents($request->get('currPath'));
            $currPath = $request->get('currPath');
            return view('welcome')->with(['response' => $response, 'currPath' => $currPath]);
        }
    }

    public function newFile(Request $request)
    {
        $filePath = $request->get('currPath') . '/' . $request->get('fileName');
        Storage::disk('webdav')->put($filePath, $request->get('fileContent'));
        $response = Storage::disk('webdav')->listContents($request->get('currPath'));
        $currPath = $request->get('currPath');
        return view('welcome')->with(['response' => $response, 'currPath' => $currPath]);
    }

    public function newFolder(Request $request)
    {
        $filePath = $request->get('currPath') . '/' . $request->get('folderName');
        Storage::disk('webdav')->makeDirectory($filePath);
        $response = Storage::disk('webdav')->listContents($request->get('currPath'));
        $currPath = $request->get('currPath');
        return view('welcome')->with(['response' => $response, 'currPath' => $currPath]);
    }

}
