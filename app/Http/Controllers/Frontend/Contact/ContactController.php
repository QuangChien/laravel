<?php

namespace App\Http\Controllers\Frontend\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use App\Http\Requests\AddContactRequest;

class ContactController extends Controller
{   
    private $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function index(){
        return view('frontend.contact.contact');
    }

    public function store(AddContactRequest $request){
        $this->contact->create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content,
        ]);

        return redirect()->route('contact')->with('success','Gửi liên hệ thành công!');
    }
}
