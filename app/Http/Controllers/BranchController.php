<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branch=branch::get();
        return view('Master.branch.index',compact('branch'));
    }
    public function create()
    {
        return view('Master.branch.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'contact_number' => 'required',
         ]);
         $input=[
            'name'=>$request['name'],
            'contact_number'=>$request['contact_number'],
            'address'=>$request['address'],
            'code'=>$request['code'],
        ];

        branch::create($input);
        session()->flash('success', 'Data has been successfully stored.');
        return redirect()->route('branch.index');

    }
    public function edit($id)
    {

        $frame=branch::find($id);

        return view('Master.branch.edit', compact('frame'));
    }

        public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'contact_number' => 'required'
        ]);

        $record =Branch::find($id);

        if (!$record) {
            return redirect()->route('branch.index')->with('error', 'Record not found');
        }

        $record->name = $request->input('name');
        $record->contact_number = $request->input('contact_number');
        $record->address = $request->input('address');
        $record->code = $request->input('code');
        $record->save();
        session()->flash('success', 'Data has been successfully updated.');
        return redirect()->route('branch.index')->with('success', 'Record updated successfully');
    }
    public function delete($id)
    {
        $a = branch::find($id);

        $a->delete();

        return redirect()->route('branch.index');
    }

}