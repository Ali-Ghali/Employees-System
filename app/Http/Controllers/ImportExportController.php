<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function importExportView()
    {
       return view('importexport');
    }
    public function import() 
    {
        Excel::import(new BulkImport,request()->file('file'));
           
        return back();
    }
}
