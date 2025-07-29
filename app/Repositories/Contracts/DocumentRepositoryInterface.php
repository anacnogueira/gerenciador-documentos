<?php

namespace App\Repositories\Contracts;

use App\Models\Document;

interface DocumentRepositoryInterface
{
    public function getAllDocumentsByUser($userId);
    public function createDocument(array $data);
    public function getDocumentById($id);
    public function updateDocument(Document $document, array $data);
    public function destroyDocument(Document $document);
}