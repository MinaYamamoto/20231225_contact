<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 修正ボタンを押下したときの実装。できればあとで・・・
    // public $form_data= [
    //     ["category_id", ""],
    //     ["first_name", "text"],
    //     ["last_name", "text"],
    //     ["gender", "radio"],
    //     ["email", "email"],
    //     ["tell--1", "tell"],
    //     ["tell--2", "tell"],
    //     ["tell--3", "tell"],
    //     ["address", "text"],
    //     ["building", "text"],
    //     ["detail", "text"],
    // ];

    public function index()
    {
        $categories = Category::all();

        return view('contact', ['categories' => $categories]);
    // 修正ボタンを押下したときの実装。できればあとで・・・
        // return view('contact', ['categories' => $categories], ['form_data' => $this->form_data]);
    }

    public function confirm(ContactRequest $request) {
        $categories = Category::all();
        $tell = $request->only(['tell--1', 'tell--2', 'tell--3']);
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        // 修正ボタンを押下したときの実装。できればあとで・・・
        // $input_data= [
        //     ["category_id", $request->input('category_id')],
        //     ["first_name", $request->input('first_name')],
        //     ["last_name", $request->input('last_name')],
        //     ["gender", $request->input('gender')],
        //     ["email", $request->input('email')],
        //     ["tell--1", $request->input('tell--1')],
        //     ["tell--2", $request->input('tell--2')],
        //     ["tell--3", $request->input('tell--3')],
        //     ["address", $request->input('address')],
        //     ["building", $request->input('building')],
        //     ["detail", $request->input('detail')],
        // ];

        // 修正ボタンを押下したときの実装。できればあとで・・・
        // return view('confirm', ['categories' => $categories], ['input_data' => $input_data], compact('contact', 'tell'));
        return view('confirm', ['categories' => $categories], compact('contact', 'tell'));

    }

    public function store(Request $request)
    {
        // 修正ボタンを押下したときの実装。できればあとで・・・
        // if($request->input('back') == 'back') {
        //     return redirect('/')->withInput();
        // }

        $contact = $request->only(['category_id','first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building',  'detail']);
        Contact::create($contact);

        return view('thanks');
    }

}
