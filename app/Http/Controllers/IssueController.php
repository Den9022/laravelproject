<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;

class IssueController extends Controller
{
    public function submit(Request $request){
        
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required'
            ]);
            // Create a new issue

            $issue = new Issue;
            $issue->name = $request->input('name');
            $issue->email = $request->input('email');
            $issue->title = $request->input('title');
            $issue->subject = $request->input('subject');
            $issue->content = $request->input('content');
            $issue->save();

            //Redirect
            return redirect('/');

        
    }
}
