<?php

namespace App\Services;

use App\Models\Attachment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService


{

    function upload($request, $user = null, $key = 'files', $config = [])
    {

        $dir = !empty($config['dir']) ? $config['dir'] : '';
        $disk = !empty($config['disk']) ? $config['disk'] : 'files';
        $mode = !empty($config['mode']) ? $config['mode'] : 'multiple';
        $returnObjectArray = !empty($config['returnObjectArray']);

        $attachments = [];

        if ($request->hasFile($key)) {

            $files = $request->file($key);

            if (gettype($files) !== 'array') {
                $files = [$files];
            }


            foreach ($files as $file) {

                $size = $file->getSize();
                $filename = Str::random(30);
                $mimeType = $file->getClientMimeType();
                $extension = $file->getClientOriginalExtension();

                if (substr($mimeType, 0, 5) == 'image') {
                    $disk = 'public';
                }

                $filename .= '.' . $extension;

                $fileNameWithDir = $filename;

                if (empty($dir) && !empty($user)) {
                    $dir = $user->school_id . '/' . now()->format('Y-m');
                }

                if (!empty($dir)) {
                    $fileNameWithDir = $dir . '/' . $filename;
                }

                //dd($file);

                Storage::disk($disk)->put($fileNameWithDir, file_get_contents($file));

                $att = Attachment::create([
                    'file_name' => $filename,
                    'file_path' => $fileNameWithDir,
                    'size' => $size,
                    'mime_type' => $mimeType,
                    'owner_id' => $user->id ?? null,
                    'school_id' => $user->school_id ?? null,
                    'disk' => $disk,
                ]);

                $attachments[] = $att;

            }

        }

        if (!empty($attachments && $mode == 'single')) {
            return $attachments[0];
        }

        if (!empty($attachments && !$returnObjectArray)) {
            return array_map(function ($item) {
                return $item['id'];
            }, $attachments);
        }

        return $attachments;
    }

}
