<?php

namespace App\Support;

use Illuminate\Http\Request;

trait FileUpload
{
    protected function upload(Request $request, $entity, $files = 'documents')
    {
        if ($uploaded = $request->file($files)) {
            foreach ($uploaded as $upload) {
                $name = $upload->store('uploads');
                $entity->files()->create(['name' => $name]);
            }
        }
    }
}
