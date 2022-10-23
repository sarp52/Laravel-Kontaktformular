<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;
 
class KontaktformularController extends Controller {
 
    // Kontaktformular erstellen
    public function createForm(Request $request) {
      return view('contact');
    }
 
    // Kontaktformulardaten speichern
    public function KontaktformularController(Request $request) {

        // Formularvalidierung
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'comments' => 'required'
         ]);
        //  Daten in Datenbank speichern
         Contact::create(
             [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'comments' => $request->comments
             ]);
        
        //  Mail an Administrator senden
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('comments'),
        ), function($comments) use ($request){
            $comments->from($request->email);
            $comments->to('seyfullaharpaci@gmail.com', 'Admin')->subject($request->get('subject'));
        });
 
        return back()->with('success', 'Wir haben Ihren Kommentar erhalten und danken Ihnen für Ihre Nachricht.');
    }
}