<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Contact;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    
    public function contact()
    {
        return view('contact');
    }
    
    public function storeContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back()->withFlashMessage('تم إرسال رسالتك بنجاح');
    }
}
