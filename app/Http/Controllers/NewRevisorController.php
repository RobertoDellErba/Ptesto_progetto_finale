<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewRevisorController extends Controller
{
    public function create()
    {
        return view('revisor.new');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function accept(Request $request)
    {
        
        
          $name = Auth::user()->name;
          $email = Auth::user()->email;
          $reference = $request->reference;
          
            
            
             
        $bag=compact('name','email','reference');
        
        Mail::to('info@presto.it')->send(new ContactReceived($bag));


        
        return redirect()->back()->with('send','La tua richiesta è in fase di valutazione');
            
            
            
        }


        public function maker(){

            return view('revisor.makerevisor');

        }


        public function make(Request $request)
        {
            $email = $request->email;

            $user= User::where('email', $email)->first();

            if (!$user){
                
                return redirect()->back()->with('error',"Utente non trovato");
            }
    
            $user->is_revisor=true;
            $user-> save();
            
            return redirect()->back()->with('message',"L'Utente {$user->name} riveste il ruolo di un revisore.");
        }




        }




