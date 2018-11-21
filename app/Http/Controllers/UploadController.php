<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
  function index(Request $request)
  {

    ini_set('display_errors', 1);
    try{
      $file_key = key($request->file());
      if ($request->file($file_key)->isValid())
      {
        $file_extension = $request->$file_key->extension();
        $file_name = md5(uniqid(rand())).".".$file_extension; $path = $request->$file_key->storeAs('images/'.date('Y-m-d'), $file_name, 'admin_desc'); //$path = $request->$file_key->store('images/'.date('Y-m-d'),'admin_desc');
        $previewname = asset('uploads/'.$path);
        return [ "uploaded" => true, "fileName" => $file_name, "url" => $previewname, "error" => [ "message" => '' ] ];
      }else{
        return [ "uploaded" => false, "fileName" => '', "url" => '', "error" => [ "message" => '上传出错！' ] ];
      }
      }catch(\Exception $e){
        return [ "uploaded" => false, "fileName" => '', "url" => '', "error" => [ "message" => '上传出错！' ] ];
      }
  }
}
