<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Models\Commande;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        Mail::to(Auth()->user()->email)->send(new TestEmail);
        $order = Commande::find($request->id); 
        $order->status = 'validé';
        $order->save();

        return  redirect('/client/dashboard')->with("success", "Email sent successfully.");
    }
}
