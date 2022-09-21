<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Pacontact;
use App\Parents;
use App\Pcontact;
use App\Student;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Aindex()
    {
        $contacts = Contact::latest()->paginate(5);
        //$tcontacts = Tcontact::where("user_id", "=", Auth::id())->get();
       // $pacontacts = Pacontact::where("user_id", "=", Auth::id())->get();
        return view('contact', compact('contacts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Tindex()
    {
        $pcontacts = Pacontact::where("user_id", "=", Auth::id())->get();
        return view('contact', compact('pcontacts'));
    }
    public function Sindex()
    {
        $tcontacts = Tcontact::where("user_id", "=", Auth::id())->get();
        $contacts = Pcontact::where("user_id", "=", Auth::id() )->get();
        return view('contact', compact('contacts', 'tcontacts'));
    }

    public function Pindex()
    {
        $tcontacts = Tcontact::where("user_id", "=", Auth::id() )->get();
        $contacts = Pcontact::where("user_id", "=", Auth::id() )->get();

        return view('layouts', compact('contacts', 'tcontacts'));
    }
    //parent contact
    public function ParentContactA()
    {
        return view('layouts.contacts.parent.admin');
    }

    public function ParentContactAd(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
        $currentUser = Auth::user();

        $msg = new Pacontact();
        $msg->user_id = 1;
        $msg->subject = "De Parent ". $currentUser->name .": ". $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect()->route('parent.admin')
            ->with('success', 'Your Message sended successfully');
    }

    public function ParentContactT()
    {
        $teachers = Teacher::latest()->get();
        return view('layouts.contacts.parent.teacher', compact('teachers'));
    }

    public function ParentContactTe(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $currentUser = Auth::user();

        $msg = new Pacontact();
        $msg->user_id = $request->input('user_id');
        $msg->subject = "De Parent ". $currentUser->name .": ". $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect()->route('parent.teacher')
            ->with('success', 'Your Message sended successfully');

    }


    public function TeacherContactA()
    {
        return view('layouts.contacts.teacher.admin');
    }

    public function TeacherContactP()
    {
        $parents = Parents::latest()->get();
        return view('layouts.contacts.teacher.parent', compact('parents'));
    }
    public function TeacherContactS()
    {

        $students = Student::latest()->get();

        return view('layouts.contacts.teacher.student', compact('students'));
    }

    public function AdminContactP()
    {
        $parents = Parents::latest()->get();
        return view('layouts.contacts.admin.parent', compact('parents'));
    }
    public function AdminContactS()
    {

        $students = Student::latest()->get();

        return view('layouts.contacts.admin.student', compact('students'));
    }


    public function InternauteContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        Contact::create($request->all());

        return redirect()->route('login')
            ->with('success', 'Your Message sended successfully');
    }



    public function TeacherContactAdmin(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
        $currentUser = Auth::user();

        $msg = new Tcontact();
        $msg->user_id = 1;
        $msg->subject = "De l'enseignant ". $currentUser->name .": ". $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect()->route('teacher.admin')
            ->with('success', 'Your Message sended successfully');
    }

    public function TeacherContactParent(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $currentUser = Auth::user();

        $msg = new Tcontact();
        $msg->user_id = $request->input('user_id');
        $msg->subject = "De l'enseignant ". $currentUser->name .": ". $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect()->route('teacher.parent')
            ->with('success', 'Your Message sended successfully');
    }

    public function TeacherContactStudent(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $currentUser = Auth::user();

        $msg = new Tcontact();
        $msg->user_id = $request->input('user_id');
        $msg->subject = "De l'enseignant ". $currentUser->name .": ". $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect()->route('teacher.student')
            ->with('success', 'Your Message sended successfully');
    }

    public function AdminContactParent(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $currentUser = Auth::user();

        $msg = new Pcontact();
        $msg->user_id = $request->input('user_id');
        $msg->subject = "De l'administration ". $currentUser->name .": ". $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect()->route('admin.parent')
            ->with('success', 'Your Message sended successfully');
    }

    public function AdminContactStudent(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $currentUser = Auth::user();

        $msg = new Pcontact();
        $msg->user_id = $request->input('user_id');
        $msg->subject = "De l'administration ". $currentUser->name .": ". $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        return redirect()->route('admin.student')
            ->with('success', 'Your Message sended successfully');
    }
}
