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

        $contacts = Contact::orderBy('id', 'desc')->paginate(7);

        return view('admin.index', compact('categories', 'contacts'));
    }

    public function destroy(Request $request)
    {
        $contact = Contact::findOrFail($request->id);
        $contact->delete();

        return redirect()->route('admin.index');
    }

    public function export(Request $request)
    {
        return redirect()->route('admin.index');
    }
}
