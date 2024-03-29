<?php

namespace App\Services;

use App\Models\HtmlSnippet;
use App\Models\Link;
use App\Models\PdfFile;

/**
 * Class ResourceService
 * @package App\Services
 */
class ResourceService
{
    /*PdfFile Methods*/
    public function getAllPdfFiles()
    {
        return PdfFile::all();
    }
    public function storePdfFile($data)
    {
         $file = $data['file'];
         $file_name = uniqid().'-'.time().'.'.$file->getClientOriginalExtension();
         $pdfFile = new PdfFile;
         $pdfFile->title = $data['title'];
         $pdfFile->name = $file->getClientOriginalName();
         $pdfFile->file_name = $file_name;
         $pdfFile->file_path = '/uploads';
         $pdfFile->size = $file->getSize();
         $file->move(storage_path('uploads'), $file_name);
         return $pdfFile->save();
    }

    public function updatePdfFile($pdfFile, $data)
    {
        if (!array_key_exists('file', $data)){
            $pdfFile->update($data);
        }else{
         $this->deleteFile($pdfFile);
         $file = $data['file'];
         $file_name = uniqid().'-'.time().'.'.$file->getClientOriginalExtension();
         $pdfFile->title = $data['title'];
         $pdfFile->name = $file->getClientOriginalName();
         $pdfFile->file_name = $file_name;
         $pdfFile->file_path = '/uploads';
         $pdfFile->size = $file->getSize();
         $file->move(storage_path('uploads'), $file_name);
         $pdfFile->save();
        }
    }
    /*PdfFile Methods End*/




    /*HtmlSnippet Methods*/
    public function getAllHtmlSnippets()
    {
        return HtmlSnippet::all();
    }
    /*HtmlSnippet Methods End*/




    /*Link Methods*/
    public function getAllLinks()
    {
        return Link::all();
    }

    /*Link Methods End*/


    /*Other methods*/
    public function deleteFile($file)
    {
        if (file_exists(storage_path("uploads\\").$file->file_name)) {
            unlink(storage_path('uploads\\').$file->file_name);
         }
    }

    public function storeModel($data, $model)
    {
        return $model::create($data);
    }
    public function updateModel($model, $data)
    {
        return $model->update($data);
    }
}
