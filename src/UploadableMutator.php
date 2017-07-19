<?php

namespace Dartika\UploadableMutator;

trait UploadableMutator
{
    public function setAttribute($key, $value)
    {
        if (isset($this->fileFields) && array_key_exists($key, $this->fileFields)) {
            try {
                $this->attributes[$key] = $this->uploadfile($value, $this->fileFields[$key]);
            } catch (\Exception $e) {
                // assign the "string" or the old value (not overwrite with empty)
                $this->attributes[$key] = $value ?? $this->attributes[$key];
            }

            return $this;
        }

        return parent::setAttribute($key, $value);
    }

    protected function uploadFile($file, $path)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            if ($file->store($path)) {
                return $file->hashName();
            } else {
                throw new \Exception('Error on upload');
            }
        } else {
            throw new \Exception('No Uploaded File');
        }
    }
}
