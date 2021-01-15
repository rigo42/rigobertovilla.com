<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function contact(Request $request){
        $data = $request->validate([
            'user' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('rigoberto.villa42@gmail.com')->send(new Contact($data));

        session()->flash('alert','Tu correo fue enviado con exito. ¡Me pondré en contacto contigo lo más pronto posible!.');
        session()->flash('alert-type','primary');
        return redirect('/#contact');
    }
}
