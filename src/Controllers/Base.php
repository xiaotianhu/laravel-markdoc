<?php 
namespace Xiaotianhu\Markdoc\Controllers;
use Illuminate\Routing\Controller ;

class Base extends Controller{

    public function json($code, $msg, $data=null)
    {
        $d = [ 'code' => $code, 'msg' => $msg, 'data' => $data];

        return json_encode($d);
    }

    public function getDirFiles($dir)
    {
        $r = [];
        $files = scandir($dir);
        foreach($files as $file){
            if($file == '.' || $file == '..') continue;
            if(is_file($dir.'/'.$file)) $r[] = [
                'text'=>$file,
                'icon'=>'fa fa-file-code-o',
                'a_attr'=>['full_path'=>$dir.'/'.$file],
            ];

            if(is_dir($dir.'/'.$file)) $r[] = [
                'children' => $this->getDirFiles($dir.'/'.$file),
                'text' => $file,
                'state' => ['opened' => true],
            ];
        }
        return $r;
    }   
}
