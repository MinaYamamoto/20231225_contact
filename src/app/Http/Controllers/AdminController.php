<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->get();
        $paginate = Contact::Paginate(10);

        return view('admin.admin', compact('categories', 'contacts' ,'paginate'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->GenderSearch($request->gender)->DateSearch($request->date)->KeywordSearch($request->keyword)->get();

        $paginate = Contact::Paginate(10);

        $reset = strtok($request, '?');
        return view('admin.admin', compact('categories', 'contacts', 'paginate', 'reset'));
    }

}
