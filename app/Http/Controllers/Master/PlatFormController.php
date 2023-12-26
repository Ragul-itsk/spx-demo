<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\PlatForm;
use Illuminate\Http\Request;

class PlatFormController extends Controller
{
    public function index()
    {
        $platformdata = PlatForm::get();
        return view('Master.platform.index', compact('platformdata'));
    }

    public function create()
    {
        return view ('Master.platform.create');
    }

    public function store(Request $request)
    {


      $request->validate([
            'name'=>'required',
            'code'=>'required',
            'url'=>'required',
         ]);

         $input=[
            'name'=>$request['name'],
            'code'=>$request['code'],
            'url'=>$request['url'],
        ];
        PlatForm::create($input);
        return redirect()->route('platform.index') ->with('success','Platform created successfully');

    }

    public function edit($id)
    {
        $frame=PlatForm::find($id);

        return view('Master.platform.edit', compact('frame'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'url' => 'required',
        ]);

        $record = PlatForm::find($id);

        if (!$record) {
            return redirect()->route('platform.index')->with('error', 'Record not found');
        }

        $record->name = $request->input('name');
        $record->code = $request->input('code');
        $record->url = $request->input('url');
        $record->save();

        return redirect()->route('platform.index')->with('success', 'Record updated successfully');
    }

    public function delete($id)
    {
        $a = PlatForm::find($id);

        $a->delete();

        return redirect()->route('platform.index') ->with('success','deleted successfully');
    }
}