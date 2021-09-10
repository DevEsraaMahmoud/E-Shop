<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }


    public function AddContact(){
        return view('admin.contact.create');
    }
    public function store(Request $request){
        $request->validate([
            'address' => 'unique:contacts|max:255',
            'email' => 'unique:contacts|max:255',
            'phone' => 'unique:contacts|max:255',
        ]);
        Contact::insert([
            'address'=> request('address'),
            'email'=> request('email'),
            'phone'=> request('phone'),
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully!');
    }
    public function contact(){
        $contacts = Contact::all();
        return view('pages.contact', compact('contacts'));
    }

    public function ContactForm(Request $request){
        $request->validate([
            'name' => 'unique:contact_forms|max:255',
            'subject' => 'unique:contact_forms|max:255',
            'email' => 'unique:contact_forms|max:255',
            'message' => 'unique:contact_forms|max:255',
        ]);
        ContactForm::insert([
            'name'=> request('name'),
            'subject'=> request('subject'),
            'email'=> request('email'),
            'message'=> request('message'),
            'status'=> request('status'),
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('contact')->with('success', 'Your Message sent Successfully!');

    }

      public function AdminMessages(){
          $messages = ContactForm::all();
          return view('admin.contactform.index', compact('messages'));
      }

    public function deleteMessage(ContactForm $message){
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Message Deleted Successfully! ');

    }
       public function deleteContact(Contact $contact){
        $contact->delete();
        return redirect()->route('admin.contact')->with('success', 'Contact Deleted Successfully! ');

    }

   /* public function messReply($id){
            ContactForm::find($id)->update([
                'status'=>'jhjjhjhj'
            ]);
        return redirect()->route('admin.messages')->with('success', 'Contact Deleted Successfully! ');

    }*/
    public function messReply(ContactForm $message, Request $request){

        $message->status = $request->get('status');
        $message->update();
        return back();

    }
    public function messUnread(ContactForm $message, Request $request){

        $message->status = $request->get('status');
        $message->update();
        return back();

    }

}
