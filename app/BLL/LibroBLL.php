<?php
namespace JOSE\app\BLL;
use JOSE\app\helpers\UploadFile;

class LibroBLL
{
    use UploadFile;

    private array $allowedFileTypes;
    private array $fileProperties;

    public function __construct(array $fileProperties)
    {
        $this->allowedFileTypes = ['image/png', 'image/jpeg'];
        $this->uploadsDirectory = 'img/feature';
        $this->fileProperties = $fileProperties;
    }

    public function uploadImagen()
    {
        $this->uploadFile(
            $this->allowedFileTypes,
            $this->uploadsDirectory,
            $this->fileProperties
        );
    }
}