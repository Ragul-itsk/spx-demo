<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function storeNote(Request $request)
    {
        $validatedData = $request->validate([
            'feedback' => 'required',
            'user_id' => 'required',

        ]);
        $leadRegisterId = $validatedData['user_id'];
        $client = new Feedback();
        $client->feedback = $validatedData['feedback'];
        $client->user_id = $leadRegisterId;
        $client->auth_user_id =auth()->user()->id;
        $client->save();
        return back()->with('success', 'Client Note created successfully.');

    }


}