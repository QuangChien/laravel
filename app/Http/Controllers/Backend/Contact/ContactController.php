<?php

namespace App\Http\Controllers\Backend\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{   
    private $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function index(){
        $contacts = $this->contact->latest()->paginate(5);
        return view('backend.contacts.listcontact', compact('contacts'));
    }

    public function delete($id){
        try {
            $this->contact->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: '.$exception->getMessage(). ' Line '.$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
