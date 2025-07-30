<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\DocumentService;
use App\Http\Requests\StoreUpdateDocumentRequest;

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
        $documents = $this->documentService->getAllDocumentsByUser(Auth::id());

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
        $document = $this->documentService->getDocumentById($id, Auth::id());

        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = $this->documentService->getDocumentById($id, Auth::id());

        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateDocumentRequest $request, string $id)
    {
        $data = $request->all();

        $document = $this->documentService->updateDocument($id, $data, $request->file("file"));

        return redirect()->route('documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = $this->documentService->destroyDocument($id);

        return redirect()->route('documentos.index');
    }

    /**
     * Download the specified resource from storage.
     */
    public function download(string $id)
    {
        $document = $this->documentService->getDocumentById($id, Auth::id());

        if (Storage::disk('public')->exists($document->file)) {
            return Storage::disk('public')->download($document->file);
        }

        abort(404, 'File not found.');
    }
}
