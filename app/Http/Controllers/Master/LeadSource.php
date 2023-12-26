<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\LeadSource as ModelsLeadSource;
use Illuminate\Http\Request;

class LeadSource extends Controller
{

    public function index()
    {
        $leaddata = ModelsLeadSource::get();

        return view ('Master.leadsource.index',compact('leaddata'));
    }

    public function create()
    {
        return view ('Master.leadsource.create');
    }

    public function store(Request $request)
    {

      $request->validate([
            'name'=>'required',
            'code'=>'required',
         ]);

         $input=[
            'name'=>$request['name'],
            'code'=>$request['code'],
        ];
        ModelsLeadSource::create($input);
        return redirect()->route('lead.index')->with('success','User created successfully');

    }

    public function edit($id)
    {
        $frame=ModelsLeadSource::find($id);

        return view('Master.leadsource.edit', compact('frame'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $record = ModelsLeadSource::find($id);

        if (!$record) {
            return redirect()->route('lead.index')->with('error', 'Record not found');
        }

        $record->name = $request->input('name');
        $record->code = $request->input('code');
        $record->save();

        return redirect()->route('lead.index')->with('success', 'Record updated successfully');
    }

    public function delete($id)
    {
        // dd($id);
        $a = ModelsLeadSource::find($id);

        $a->delete();

        return redirect()->route('lead.index')->with('success','User deleted successfully');
    }
}