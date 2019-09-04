<?php 
namespace Xiaotianhu\Markdoc\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class IndexController extends Base{

    public function index()
    {
        $baseDir = config('markdoc.file_path',base_path('doc'));
        if(empty($baseDir)||!is_dir($baseDir)) return $this->json(201, 'doc file path err.');
        $files = $this->getDirFiles($baseDir);
        $welcome = config('markdoc.welcome','');

        return view('markdoc::index', [
            'folderFiles'=>json_encode($files),
            'welcome' => $welcome,
        ]);
    }

    public function getContent(Request $r)
    {
        $path = $r->input('path');
        if(!is_file($path)) return $this->json(201, 'file not exist');
        $content = file_get_contents($path);
        return $this->json(200, 'ok', ['content'=>$content]);
    }
}
