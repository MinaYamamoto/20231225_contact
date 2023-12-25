<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(10);

        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $gender = $request->gender;
        $date = $request->date;

        return view ('admin.admin', compact('categories', 'contacts', 'keyword', 'category_id', 'gender', 'date'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->GenderSearch($request->gender)->DateSearch($request->date)->KeywordSearch($request->keyword)->paginate(10);
        $reset = strtok($request, '?');

        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $gender = $request->gender;
        $date = $request->date;

        return view('admin.admin', compact('categories', 'contacts', 'reset', 'keyword', 'category_id', 'gender', 'date'));
    }

    public function exportCsv( ?int $category_id = null, ?int $gender = null, ?string $date = null ,?string $keyword = null)
    {
        if ($category_id||$gender||$date||$keyword){
            //検索条件あり。途中
            $contacts = Contact::with('category')->CategorySearch($category_id)->GenderSearch($gender)->DateSearch($date)->KeywordSearch($keyword)->get();
        } else {
            //全件
            $contacts = Contact::with('category')->get();
        }

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment;'
        ];

        $fileName = 'contact.csv';
        $callback = function() use($contacts)
        {
            $handle = fopen('php://output', 'w');

            $head = [
                'お名前',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容',
            ];

            mb_convert_variables('SJIS', 'UTF-8', $head);
            fputcsv($handle, $head);

            foreach($contacts as $contact)
            {
                if($contact['gender'] == 1)
                {
                    $gender = '男性';
                } elseif($contact['gender'] == 2)
                {
                    $gender = '女性';
                } else {
                    $gender = 'その他';
                }
                $categories = Category::all();

                foreach($categories as $category)
                {
                    if ($category->id == $contact['category_id'])
                    {
                        $content = $category->content;
                    }
                }
                $data = [
                    $contact->last_name.
                    $contact->first_name,
                    $gender,
                    $contact->email,
                    $contact->tell,
                    $contact->address,
                    $contact->building,
                    $content,
                    $contact->detail
                ];
                mb_convert_variables('SJIS', 'UTF-8', $data);
                fputcsv($handle, $data);
            }

            fclose($handle);
        };
        return response()->streamDownload($callback, $fileName, $headers);
    }
}