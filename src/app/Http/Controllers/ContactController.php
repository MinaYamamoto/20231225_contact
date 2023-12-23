<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('contact', ['categories' => $categories]);
    }

    public function confirm(ContactRequest $request) {
        $categories = Category::all();
        $tell = $request->only(['tell--1', 'tell--2', 'tell--3']);
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', ['categories' => $categories], compact('contact', 'tell'));

    }

    public function store(Request $request)
    {
        if($request->input('back') == 'back')
        {
            return redirect('/')->withInput();
        }

        $contact = $request->only(['category_id','first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building',  'detail']);
        Contact::create($contact);

        return view('thanks');
    }

}
