<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pbmedia\FilesystemProviders\WebDAVServiceProvider;
use Illuminate\Support\Facades\Storage;

class webDavController extends Controller
{
    public function explodeDirPath($str)
    {
        $output = array();
        $chunks = explode('/', $str);
        foreach ($chunks as $i => $chunk) {
            $output[] = sprintf(
                '<a href="/?dirname=%s">%s</a>',
                implode('/', array_slice($chunks, 0, $i + 1)),
                $chunk
            );
        }
        return $output;
    }

    public function index(Request $request)
    {
        if ($request->get('dirname')) {
            $response = Storage::disk('webdav')->listContents($request->get('dirname'));
            $currPath = $request->get('dirname');
            $dirPath = $this->explodeDirPath($currPath);
            return view('welcome')->with(['response' => $response, 'currPath' => $currPath, 'dirPath' => $dirPath]);
        }
        $response = Storage::disk('webdav')->listContents('/');
//        var_dump($response);exit;
        $currPath = '';
        $dirPath = $this->explodeDirPath($currPath);
        return view('welcome')->with(['response' => $response, 'currPath' => $currPath, 'dirPath' => $dirPath]);
    }

    public function delete(Request $request)
    {
        if ($request->get('path')) {
            Storage::disk('webdav')->delete($request->get('path'));
            $response = Storage::disk('webdav')->listContents($request->get('currPath'));
            $currPath = $request->get('currPath');
            $dirPath = $this->explodeDirPath($currPath);
            return view('welcome')->with(['response' => $response, 'currPath' => $currPath, 'dirPath' => $dirPath]);
        }
    }

    public function newFile(Request $request)
    {
        $filePath = $request->get('currPath') . '/' . $request->get('fileName');
        Storage::disk('webdav')->put($filePath, $request->get('fileContent'));
        $response = Storage::disk('webdav')->listContents($request->get('currPath'));
        $currPath = $request->get('currPath');
        $dirPath = $this->explodeDirPath($currPath);
        return view('welcome')->with(['response' => $response, 'currPath' => $currPath, 'dirPath' => $dirPath]);
    }

    public function newFolder(Request $request)
    {
        $filePath = $request->get('currPath') . '/' . $request->get('folderName');
        Storage::disk('webdav')->makeDirectory($filePath);
        $response = Storage::disk('webdav')->listContents($request->get('currPath'));
        $currPath = $request->get('currPath');
        $dirPath = $this->explodeDirPath($currPath);
        return view('welcome')->with(['response' => $response, 'currPath' => $currPath, 'dirPath' => $dirPath]);
    }

    public function getFile(Request $request)
    {
        if ($request->get('path') !== '') {
            $auth = base64_encode(config('filesystems.disks.webdav.userName') . ':' . config('filesystems.disks.webdav.password'));
            $context = stream_context_create([
                "http" => [
                    "header" => "Authorization: Basic $auth"
                ]
            ]);
            $filePath = config('filesystems.disks.webdav.baseUri') . '/'
                . config('filesystems.disks.webdav.pathPrefix') . '/' . $request->get('path');
            if (file_put_contents('download/' . $request->get('filename'), file_get_contents($filePath, false, $context))) {
                return redirect('/download/' . $request->get('filename'));
            } else {
                echo "<br>File downloading failed.";
            }
        }

    }

}
