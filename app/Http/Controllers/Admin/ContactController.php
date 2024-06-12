<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $contacts = Contacts::all();
                $contact = $contacts[0];
                return view('admin.contact.index', compact('contact'));
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }

    public function update(ContactRequest $request, $id)
    {
        if (auth()->user() != null) {
            if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3) {
                $contact = Contacts::find($id);
                $contact->phone = $request->phone;
                $contact->email = $request->email;
                $contact->address = $request->address;
                $contact->save();
                return redirect()->back()->withSuccess('Контакты успешно обновлены');
            }
            return view('/notUserOrAdmin');
        } else {
            return view('/notUserOrAdmin');
        }
    }
}
