<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class StoreFileService
{
    protected $uploadedFile;
    protected $basePath;
    protected $fileName;

    public function __construct($file, $basePath, $fileName)
    {
        $this->uploadedFile = $file;
        $this->basePath = $basePath;
        $this->fileName = $fileName;
    }

    public function upload()
    {
        $path = $this->storeFile();

        return $path;
    }

    public function delete()
    {
        $fullPath = $this->basePath . "/" . $this->fileName;
        $fileExists = Storage::disk('public')->exists($fullPath);
        if ($fileExists) {
            Storage::disk('public')->delete($fullPath);
        }
    }

    private function storeFile()
    {
        return $this->uploadedFile->storeAs(
            $this->basePath,
            $this->generateUniqueFileName(),
            'public'
        );
    }

    private function generateUniqueFileName()
    {
        return $this->fileName . '.' . $this->uploadedFile->getClientOriginalExtension();
    }

}