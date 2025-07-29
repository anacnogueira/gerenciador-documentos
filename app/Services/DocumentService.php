<?php

namespace App\Services;

use App\Repositories\Contracts\DocumentRepositoryInterface;
use App\Services\StoreFileService;
use Illuminate\Support\Str;

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
    public function getAllDocumentsByUser($userId)
    {
        return $this->documentRepository->getAllDocumentsByUser($userId);
    }

    /**
     * Create a new Document
     * @param array $data
     * @return object
    */
    public function makeDocument(array $data, $file)
    {

        $document = $this->documentRepository->createDocument($data);

        $fileName = Str::kebab($document->name)."-".date('dmYHis');

        if($file) {
            $storeFileService = new StoreFileService(
                $file,
                "documents",
                $fileName
            );
            $pathFile = $storeFileService->upload();
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
        return $this->documentRepository->getDocumentById($id);
    }

    /**
     * Update a Document
     * @param int $id
     * @param arrray $data
     * @return json response
    */
    public function updateDocument(int $id, array $data)
    {

        $document = $this->documentRepository->getDocumentById($id);

        if (!$document) {
            return response()->json(['message' => 'Document Not Found'], 404);
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
        $document = $this->documentRepository->getDocumentById($id);

        if (!$document) {
            return response()->json(['message' => 'Document Not Found'], 404);
        }

        $this->documentRepository->destroyDocument($document);

        return response()->json(['message' => 'Document Deleted'], 200);
    }

}
