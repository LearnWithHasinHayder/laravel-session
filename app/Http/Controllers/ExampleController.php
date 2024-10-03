<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class ExampleController extends Controller
{
    function setSession(Request $request)
    {
        session()->put('name', 'John Doe');
        $request->session()->put('email', 'john@doe.com');
        session(['phone' => '1234567890']);
        return response("Session Data has been set");
    }

    function getSession(Request $request){
        $name = session()->get('name', 'Guest');
        $email = $request->session()->get('email');
        $phone = session('phone');
        $age = session('age', 25);
        return response("Name: $name, Email: $email, Phone: $phone, Age:  $age");
    }

    function readAgain(Request $request){
        $name = session()->get('name', 'Guest');
        $email = $request->session()->get('email');
        $phone = session('phone');
        $age = session('age', 25);
        return response("Name: $name, Email: $email, Phone: $phone, Age:  $age");
    }

    function updateSession(Request $request){
        $currentName = session()->get('name');
        Log::info("Current Name: $currentName");
        session()->put('name', 'Jane Doe');
        $request->session()->put('email', 'jane@doe.com');
        // session(['phone' => '0987654321']);
        // session(['age' => 30]);
        session([
            'phone' => '0987654321',
            'age' => 30
        ]);
        Log::info('Session Data has been updated');
        return response("Session Data has been updated");
    }

    function deleteSessionData(Request $request){
        $request->session()->forget('name');
        session()->forget('email');
        session()->forget([
            'phone',
            'age'
        ]);
        Log::warning('Session Data has been deleted');
        return response("Session Data has been deleted");
    }

    function setFlashMessage(Request $request){
        $request->session()->flash('message', 'This is a flash message');
        $request->session()->flash('error', 'This is an error message');
        return response("Flash message has been set");
    }

    function getFlashMessage(Request $request){
        $message = $request->session()->get('message');
        $error = session('error');
        return response("Message: $message, Error: $error");
    }

    function setFlashAndRedirect(Request $request){
        // session()->flash('message', 'This is a flash message 123');
        // return redirect('/flash');
        return redirect('/flash')->with('message', 'Something is wrong');
    }

    function about(Request $request){
        return view('about');
    }

    function flash(){
        return view('flash');
    }

    function formSubmit(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password'=> 'required|min:6|max:12|alpha_num',
            'password_confirmation' => 'required|same:password'
        ], [
            'name.required' => 'Please enter your name',
            'name.min' => 'Name must be at least 3 characters',
            'email.required' => 'Please enter your email',
            'email.email' => 'Please enter a valid email',
            'password.required' => 'Please enter a password',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must not exceed 12 characters',
            'password.alpha_num' => 'Password must be alphanumeric',
            'password_confirmation.required' => 'Please confirm your password',
            'password_confirmation.same' => 'Password and Confirm Password must match'
        ]);

        return response("Form Submitted Successfully");
    }

    function createLog(Request $request){
        Log::info('This is an info log');
        Log::warning('This is a warning log');
        Log::error('This is an error log');
        return response("Log has been created");
    }

    function sampleCountryApi(Request $request){
        $countries = [
            'Nepal',
            'India',
            'China',
            'USA',
            'UK',
            'Australia'
        ];
        return response()->json($countries)->header('Content-Type', 'application/json');
    }


}
