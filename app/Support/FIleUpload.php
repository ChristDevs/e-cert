<?php

namespace App\Support;

use Illuminate\Http\Request;

trait FileUpload
{
    protected function upload(Request $request, $entity, $files = 'documents')
    {
        if ($uploaded = $request->file($files)) {
            if (is_array($uploaded)) {
                foreach ($uploaded as $upload) {
                    $this->savefiles($upload, $entity);
                }

                return;
            }
            $this->savefiles($uploaded, $entity);

            return;
        }
    }

    /**
     * undocumented function summary.
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    protected function saveFiles($upload, $entity)
    {
        $name = $upload->store('uploads');
        $entity->files()->create(['name' => $name]);
    }
}
