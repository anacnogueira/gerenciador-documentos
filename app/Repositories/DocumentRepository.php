<?php

namespace App\Repositories;

use App\Repositories\Contracts\DocumentRepositoryInterface;
use App\Models\Document;

class DocumentRepository implements DocumentRepositoryInterface
{
    protected $entity;

    public function __construct(Document $document)
    {
        $this->entity = $document;
    }

    /**
     * Get all Documents
     * @return array
     */
    public function getAllDocumentsByUser($userId)
    {
        return $this->entity->where('user_id', $userId)->get();
    }

    /**
     * Create a new Document
     * @param array $data
     * @return object
     */
    public function createDocument(array $data)
    {
        return $this->entity->create($data);
    }

     /**
     * Select Document by ID
     * @param int $id
     * @return object
     */
    public function getDocumentById($id, $userId)
    {
        return $this->entity
            ->where('user_id', $userId)
            ->find($id);
    }

    /**
     * Update data of Document
     * @param object $Document
     * @param array $data
     * @return object
     */
    public function updateDocument(Document $document, array $data)
    {
        return $document->update($data);
    }

    /**
     * Delete a Document
     * @param object $Document
     */
    public function destroyDocument(Document $document)
    {
        return $document->delete();
    }
}