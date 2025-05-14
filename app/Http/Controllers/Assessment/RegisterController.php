<?php

namespace App\Http\Controllers\Assessment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('assessment.register');
    }

    public function submitForm(Request $request)
    {
        // echo "<pre>"; 
        // print_r($request->all());   
        // die;    
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            // 'email' => 'required|email|unique:participants,email',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $participantId = DB::table('participants')->insertGetId([
            'full_name'    => $validated['full_name'],
            'school_name'  => $validated['school_name'],
            'designation'  => $validated['designation'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'],
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        session(['participant_id' => $participantId]);

        return redirect()->route('assessment.quiz');
    }
}
