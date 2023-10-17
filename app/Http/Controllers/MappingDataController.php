<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MappingData as Model;
use App\Models\MainData ;
use App\Imports\MappingDataImport ;
use Excel;

class MappingDataController extends Controller
{
    function __construct(public Model $repo)
    {}
    public function index()
    {
        return view('mapping_data',['records'=>$this->repo->paginate(100)]);
    }

    function create()
    {
        return view('create_mapping',['mainDataItems'=>MainData::all()]);
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'description' => 'required|string',
            'main_data_id' => 'required|exists:main_data,id',
            'reason' => 'required|in:A,B,C',
        ]);

        // Create a new mapping_data record
        $mappingData = $this->repo->create([
            'description' => $request->input('description'),
            'main_data_id' => $request->input('main_data_id'),
            'reason' => $request->input('reason'),
        ]);

        // Optionally, you can return a response or redirect back to the form
        return redirect()->back()->with('success', 'Data imported successfully');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:10240', // Validate file type and size
        ]);
        Excel::import(new MappingDataImport, $request->file('file'));
        return redirect()->back()->with('success', 'Data Imported successfully');
    }
}
