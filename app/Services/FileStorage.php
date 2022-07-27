<?php

namespace App\Services;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileStorage
{
    /**
     * @param $files
     * @param $id
     * @param $type
     * @param $isAvatar
     * @return bool is file has been saved
     */
    public static function saveFiles($files, $id, $type, $isAvatar)
    {
        $isSaved = false;

        foreach ($files as $file){
            $uploadFolder = "public/images/" . date('Y-m-d');
            $name = $file->getClientOriginalName();
            $name = strstr($name, '.', true);
            $extensions = $file->getClientOriginalExtension();
            $name = $name . date('Y-m-d-H-i-s') . '.' . $extensions;
            $path = Storage::putFileAs($uploadFolder, $file, $name);

            $path = str_replace('public', 'storage', $path);

            File::create([
                'path' => $path,
                'fileable_id' => $id,
                'fileable_type' => $type,
                'is_avatar' => $isAvatar,
            ]);

            $isSaved = true;
        }

        return $isSaved;
    }

    /**
     * @param $filePath
     * @return bool is file has been deleted
     */
    public static function fileDelete($filePath)
    {
        $isDelete = false;
        $path = str_replace('storage', 'public', $filePath);
        Storage::delete($path);
        $isDelete = true;
        return $isDelete;
    }
}
