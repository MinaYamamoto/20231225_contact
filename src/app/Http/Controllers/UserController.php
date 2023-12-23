<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class UserController extends Controller
{
    public function index()
    {
        $contacts = Contact::simplePaginate(10);
        return view('user.admin', ['contacts' => $contacts]);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword)) {
            $query->where('contact', 'like', '%' . $keyword. '%');
        }
    }
// modelに記載
    public function scopeGenderSearch($query, $category_id)
    {
        if(!empty($gender)) {
            $query->where('category_id', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if(!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }
// modelに記載
}
