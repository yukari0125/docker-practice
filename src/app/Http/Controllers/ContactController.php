<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact; 

class ContactController extends Controller
{
   public function index()
    {
    $categories = Category::all();
    return view('contact.index', compact('categories'));
    }

   public function confirm(ContactRequest $request)
    {
    $inputs = $request->validated();

    $category = Category::find($inputs['category_id']);

    $fullName = $inputs['last_name'] . ' ' . $inputs['first_name'];
    $tel = $inputs['tel1'] . $inputs['tel2'] . $inputs['tel3'];

    $genderText = match ((int)$inputs['gender']) {
        1 => '男性',
        2 => '女性',
        3 => 'その他',
        default => '',
    };

    return view('contact.confirm', compact(
        'inputs',
        'category',
        'fullName',
        'tel',
        'genderText'
    ));
    }


    public function store(ContactRequest $request)
    {
        $inputs = $request->validated();

        $tel = $inputs['tel1'] . $inputs['tel2'] . $inputs['tel3'];

    Contact::create([
        'last_name'   => $inputs['last_name'],
        'first_name'  => $inputs['first_name'],
        'gender'      => $inputs['gender'],
        'email'       => $inputs['email'],
        'tel'         => $tel,
        'address'     => $inputs['address'],
        'building'    => $inputs['building'] ?? null,
        'category_id' => $inputs['category_id'],
        'detail'      => $inputs['detail'],
    ]);

    return view('contact.thanks');
    }
}