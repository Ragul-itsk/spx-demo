<?php

namespace App\Http\Controllers;

use App\Models\OurBankDetail;
use Illuminate\Http\Request;

class OurBankDetailController extends Controller
{
    public function index()
    {
        $bankdetail = OurBankDetail::get();
        return view('Master.ourbankdetail.index', compact('bankdetail'));
    }

    public function create()
    {
        return view ('Master.ourbankdetail.create');
    }

    public function store(Request $request)
    {


      $request->validate([
            'bank_name'=>'required',
            'account_number'=>'required',
            'ifsc'=>'required',
            'remarks'=>'required',


         ]);

         $input=[
            'bank_name'=>$request['bank_name'],
            'account_number'=>$request['account_number'],
            'ifsc'=>$request['ifsc'],
            'remarks'=>$request['remarks'],
            'status'=> 0,

        ];
        OurBankDetail::create($input);
        session()->flash('success', 'Data has been successfully stored.');
        return redirect()->route('ourbankdetail.index');

    }

    public function edit($id)
    {
        $frame=OurBankDetail::find($id);

        return view('Master.ourbankdetail.edit', compact('frame'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bank_name'=>'required',
            'account_number'=>'required',
            'ifsc'=>'required',


         ]);

        $record = OurBankDetail::find($id);

        if (!$record) {
            return redirect()->route('ourbankdetail.index')->with('error', 'Record not found');
        }

        $record->bank_name = $request->input('bank_name');
        $record->account_number = $request->input('account_number');
        $record->ifsc = $request->input('ifsc');
        $record->remarks = $request->input('remarks');
        $record->save();

        return redirect()->route('ourbankdetail.index')->with('success', 'Record updated successfully');
    }

    public function delete($id)
    {
        $a = OurBankDetail::find($id);

        $a->delete();
        session()->flash('success', 'Data has been successfully Deleted.');
        return redirect()->route('ourbankdetail.index');
    }


}