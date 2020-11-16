<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class ImageController extends Controller
    {

        public function __construct()
        {


        }


        public function index(Request $request)
        {

            $Image = app("ImageClass");
            $Image->create();

            $diskApp = \Storage::disk($request->input('dir'));
            $diskStatic = \Storage::disk('static');

            $file = $diskApp->path($request->input('image'));
            $fileStatic = $diskStatic->path($request->input('image'));
            $fileThumnail = $diskApp->path($request->input('size') . '/' . $request->input('image'));



            header('Access-Control-Allow-Origin:' .  getVariable($_SERVER, 'HTTP_ORIGIN'));
            header('Access-Control-Allow-Methods:'.  'GET, POST, PUT, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers:' .  'Content-Type');
            header('Access-Control-Allow-Credentials:' .  'true');
            header('Access-Control-Max-Age:' .  '86400');

            //If the file exist
            if (file_exists($file)){
                //If size in parameter.If Not Thumnail


                if ($request->input('size')){
                    if (!file_exists($fileThumnail)){
                        $Image->saveThumnail($file);
                    }

                    $file = $fileThumnail;
                }

                $Image->view($file);
            }else{
                if (file_exists($fileStatic)){
                    $Image->scale($fileStatic, 'Thum');
                    $Image->view();
                }
            }


            exit();

        }

    }
