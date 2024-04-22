<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\EmailSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Application;
use Illuminate\Mail\Message;
use Symfony\Component\Mime\Part\TextPart;

class EmailController extends Controller
{
    public function index()

    {
        $emails = EmailSent::paginate(10); // Paginer les données avec 10 éléments par page
        return view('emails.index', ['emails' => $emails]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email',
        ]);

        Email::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Adresse email enregistrée avec succès !');
    }

    public function create()

    {

        $email = null;

        return view('emails/edit', compact('email'));
    }
    public function sendmail(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
    
        $emails = Email::all();
        $subject = $request->subject;
        $message = $request->message;
    
        foreach ($emails as $email) {
            Mail::raw($message, function ($m) use ($email, $subject) {
                // Accédez à la propriété email de l'objet Email pour obtenir l'adresse e-mail
                $m->to($email->email)->subject($subject);
            });
    
            // Enregistrez les détails de l'e-mail envoyé dans la table emails_sent
            EmailSent::create([
                'email_id' => $email->id, // Vous devrez peut-être ajuster ceci selon votre structure de base de données
                'subject' => $subject,
                'message' => $message,
            ]);
        }
    
        return redirect()->back()->with('success', 'Email envoyé avec succès !');
    }
    
}
