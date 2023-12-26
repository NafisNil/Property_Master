<?php


namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Spatie\DbDumper\Databases\MySql;
use Image;

trait FileSaver
{


    /*
     |--------------------------------------------------------------------------
     | UPLOAD FILE IN LOCAL DISK, LOCAL DISK MEANS PUBLIC DIRECOTROY
     |--------------------------------------------------------------------------
    */
    public function upload_file($uploaded_file, $model, $database_field_name, $base_path)
    {
//        dd($base_path);

        // <!-- upload file -->
        if ($uploaded_file) {


            // <!-- delete file if exist -->
            if (file_exists($model->$database_field_name)) {
                unlink($model->$database_field_name);
            }



            // <!-- create unique file name -->
            $new_file_name   = time() . '.' . $uploaded_file->getClientOriginalExtension();



            // <!-- create upload directory -->
            $directory   = 'assets/uploads/' . $base_path . '/' . date('Y') . '/';
//            dd($directory);




            // <!-- create store file to directory -->
            $uploaded_file->move($directory, $new_file_name);



            // <!-- update file name to database -->
            $model->update([$database_field_name => $directory . $new_file_name]);
        }
    }



}
