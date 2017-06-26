<?php

namespace App\Support;

use Illuminate\Http\Request;

trait FileUpload
{
    protected function upload(Request $request, $entity, $files = 'documents'): bool
    {
        if ($uploaded = $request->file($files)) {
            if (is_array($uploaded)) {
                foreach ($uploaded as $upload) {
                    $this->savefiles($upload, $entity);
                }

                return true;
            }
            $this->savefiles($uploaded, $entity);

            return true;
        }

        return false;
    }

    /**
     * Move uploaded files to the storage location.
     *
     * @param type var Description
     **/
    protected function saveFiles($upload, $entity)
    {
        $name = $upload->store('uploads');
        $entity->files()->create(['name' => $name]);
    }
}
