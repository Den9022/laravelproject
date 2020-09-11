<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Customer;

class IssueController extends Controller
{
    public function submit(Request $request){
        
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required'
            ]);
        // Create a new issue


        if(!$customer = Customer::where('email',  $request->input('email'))->first()){

            $customer = new Customer;
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->save();
        }      

        $issue = new Issue;
        $issue->title = $request->input('title');
        $issue->subject = $request->input('subject');
        $issue->content = $request->input('content');
        $issue->due_date =  date('yy-m-d h:i:s', $this->addWorkingHours(time(), 16));
        $issue->customer_id = $customer->id;
        $issue->save();

        //Redirect
        return redirect('/')->with('success', 'Issue submitted!');

    }

    public function getIssues(){

        $issues = Issue::all();

        return view('issues')->with('issues', $issues);
    }

    public function getIssuesByCustomer($id){

        $issues = Issue::where('customer_id', $id)->get();

        return view('issues')->with('issues', $issues);
    }

    public function addWorkingHours($timestamp, $hoursToAdd, $skipWeekends = true)
    {
        // Set constants
        $dayStart = 9;
        $dayEnd = 17;
    
        // For every hour to add
        for($i = 0; $i < $hoursToAdd; $i++)
        {
            // Add the hour
            $timestamp += 3600;
    
            // If the time is between 1800 and 0800
            if ((date('G', $timestamp) >= $dayEnd && date('i', $timestamp) >= 0 && date('s', $timestamp) > 0) || (date('G', $timestamp) < $dayStart))
            {
                // If on an evening
                if (date('G', $timestamp) >= $dayEnd)
                {
                    // Skip to following morning at 08XX
                    $timestamp += 3600 * ((24 - date('G', $timestamp)) + $dayStart);
                }
                // If on a morning
                else
                {
                    // Skip forward to 08XX
                    $timestamp += 3600 * ($dayStart - date('G', $timestamp));
                }
            }
    
            // If the time is on a weekend
            if ($skipWeekends && (date('N', $timestamp) == 6 || date('N', $timestamp) == 7))
            {
                // Skip to Monday
                $timestamp += 3600 * (24 * (8 - date('N', $timestamp)));
            }
        }
    
        // Return
        return $timestamp;
    }
}
