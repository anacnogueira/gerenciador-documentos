<?php
namespace App\Services;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class StoreFileService
{
    protected $uploadedFile;
    protected $basePath;
    protected $fileName;
    protected $ip;

    public function __construct($file, $basePath, $fileName, $ip = "")
    {
        $this->uploadedFile = $file;
        $this->basePath = $basePath;
        $this->fileName = $fileName;
        $this->ip = $ip;
    }

    public function upload()
    {
        $filePath = $this->storeFile();

        $templatePath = Storage::disk("public")->path($filePath);
        $templateProcessor = new TemplateProcessor($templatePath);

        $user = Auth::user();
        $userName = $user ? $user->name : 'Convidado';
        $userRole = $user ? $user->role : 'Sem Função definida';
        $userDocument = $user ? $user->document : 'Documento não informado';

        //Product
        $productBrand           = $user->product ? $user->product->brand : 'Marca não definida';
        $productModel           = $user->product ? $user->product->model : 'Modelo não definido';
        $productSerialNumber    = $user->product ? $user->product->serial_number : 'Nº de série não definido';
        $productProcessor       = $user->product ? $user->product->processor : 'Processador não definido';
        $productMemory          = $user->product ? $user->product->memory : 'Memória não definida';
        $productDisk            = $user->product ? $user->product->disk : 'Disco não definido';
        $productPrice           = $user->product ? $user->product->price : 'Price não definido';
        $productPriceString     = $user->product ? $user->product->price_string : 'Faixa de Preço não definido';

        //Locale
        if ($position = Location::get($this->ip)) {
            $local = $position->cityName . '/' . $position->regionName;
        } else {
            $local = "Localhost";
        }

        $date = Carbon::now()->format('d/m/Y');

        $templateProcessor->setValue('user_name', $userName);
        $templateProcessor->setValue('user_role', $userRole);
        $templateProcessor->setValue('user_document', $userDocument);
        $templateProcessor->setValue('product_brand', $productBrand);
        $templateProcessor->setValue('product_model', $productModel);
        $templateProcessor->setValue('product_serial_number', $productSerialNumber);
        $templateProcessor->setValue('product_processor', $productProcessor);
        $templateProcessor->setValue('product_memory', $productMemory);
        $templateProcessor->setValue('product_disk', $productDisk);
        $templateProcessor->setValue('product_price', $productPrice);
        $templateProcessor->setValue('product_price_string', $productPriceString);
        $templateProcessor->setValue('local', $local);
        $templateProcessor->setValue('date', $date);

        $outputFileName = $this->fileName . '.' . $this->uploadedFile->getClientOriginalExtension();
        $outputPath = $this->basePath . "/" . $outputFileName;
        $templateProcessor->saveAs(Storage::disk("public")->path($outputPath));

        return $outputPath;
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