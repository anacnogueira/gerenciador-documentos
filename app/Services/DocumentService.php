<?php

namespace App\Services;

use App\Repositories\Contracts\DocumentRepositoryInterface;
use App\Services\StoreFileService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DocumentService
{
    protected $documentRepository;

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

     /**
     * Select all Documents By User id
     * @return array
    */
    public function getAllDocumentsByUser()
    {
        return $this->documentRepository->getAllDocumentsByUser(Auth::id());
    }

    /**
     * Create a new Document
     * @param array $data
     * @return object
    */
    public function makeDocument(array $data, $file, $ip)
    {
        $data["user_id"] = Auth::id();
        $document = $this->documentRepository->createDocument($data);

        if($file) {
            $pathFile = $this->uploadDocument($document->name, $file, $ip);
            $document->update([
                "file" => $pathFile,
            ]);
        }

        return $document;
    }

    /**
     * Get Document by ID
     * @param int $id
     * @return object
    */
    public function getDocumentById(int $id)
    {
        return $this->documentRepository->getDocumentById($id, Auth::id());
    }

    /**
     * Update a Document
     * @param int $id
     * @param arrray $data
     * @return json response
    */
    public function updateDocument(int $id, array $data, $newFile, $ip)
    {

        $document = $this->documentRepository->getDocumentById($id, Auth::id());

        if (!$document) {
            return response()->json(['message' => 'Document Not Found'], 404);
        }

        if(!empty($newFile)) {
            $this->deleteFileDocument($document->file);

            $pathFile = $this->uploadDocument($data["name"], $newFile, $ip);
            $data["file"] = $pathFile;
        }

        $this->documentRepository->updateDocument($document, $data);
        return response()->json(['message' => 'Document Updated'], 200);
    }

    /**
     * Delete a Document
     * @param int $id
     * @return json response
    */
    public function destroyDocument(int $id)
    {
        $document = $this->documentRepository->getDocumentById($id, Auth::id());

        if (!$document) {
            return response()->json(['message' => 'Document Not Found'], 404);
        }

        $this->deleteFileDocument($document->file);

        $this->documentRepository->destroyDocument($document);

        return response()->json(['message' => 'Document Deleted'], 200);
    }

    private function uploadDocument($name, $file, $ip)
    {
        $fileName = Str::kebab($name)."-".date('dmYHis');

        $storeFileService = new StoreFileService(
            $file,
            "documents",
            $fileName,
            $ip,
        );
        $pathFile = $storeFileService->upload();

        return $pathFile;
    }

    private function deleteFileDocument($file)
    {
        $fileName = str_replace("documents/", "", $file);
        $storeFileService = new StoreFileService(
            $file,
            "documents",
            $fileName
        );
        $storeFileService->delete();
    }

}
