<?php

namespace App\Http\Controllers;

use App\Imports\PlayerExcelImport;
use App\Models\File;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileImportController extends Controller
{
    public function playerFile()
    {
        $files = File::all();
        return view('files.playerUpload.index', ['files'=>$files]);
    }
    public function playerUpload()
    {
        return view('files.playerUpload.create');
    }

    public function playerStore(Request $request)
    {
        $this->validate($request, [
            'excel_file' => 'required|mimes:xlsx,csv',
        ]);

        $file = $request->file('excel_file');
        $filePath = $file->store('excel-files');
        $uploadedFile = new File([
            'original_name' => $file->getClientOriginalName(),
            'path' => $filePath,
            'created_by' => auth()->user()->id,
        ]);
        $uploadedFile->save();

        // Process the Excel file and get counts
        $import = new PlayerExcelImport;

        Excel::import($import, $file);

        $totalRecords  = $import->getTotalCount();
        $duplicateRecords   = $import->getDuplicateCount();
        $addedRecords = $import->getCorrectlyAddedCount();

        // Update the counts in the "files" table
        $uploadedFile->total_records = $totalRecords;
        $uploadedFile->duplicate_records = $duplicateRecords;
        $uploadedFile->added_records = $addedRecords;
        $uploadedFile->save();

        return redirect()->route('player-files')->with('success', 'Excel file uploaded successfully');
    }
}
