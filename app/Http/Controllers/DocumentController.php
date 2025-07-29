<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\DocumentService;
use App\Http\Requests\StoreUpdateDocumentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class DocumentController extends Controller
{
    protected $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $documents = $this->documentService->getAllDocumentsByUser($userId);

        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $document = null;

        return view('documents.create', compact('document'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateDocumentRequest $request)
    {
        $data = $request->all();
        $data["user_id"] = Auth::id();

        $document = $this->documentService->makeDocument($data, $request->file("file"));

        return redirect()->route('documentos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = $this->documentService->getDocumentById($id);

        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateDocumentRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
