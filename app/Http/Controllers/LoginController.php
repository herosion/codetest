<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function showLogin(Request $request)
    {
     
      // on teste si on arrive dans la méthode en post, vérifie le verb HTTP
      if( $request->isMethod('post') == true)
      {
       	$this->validate($request,[
          		'email' => 'required|email',//Rules laravel
          		'password' => 'required'
        ]);
        
        // récupérer en même temps les champs email et password
        $credentials = $request->only('email', 'password');
        
        if ($request->remember == 'yes') {
        	$remember = true;
        }else{
           $remember = false;
        }
       
        
        if(Auth::attempt($credentials, $remember))
        {
           /*dump('ok connexion réussie!');*/
          session()->flash('flashMessage', 'Connection réussie');

           return redirect()->intended('dashboard/admin');
           
        }else{
          
          return back()->withInput($request->only('email')); 
        }
      }

      return view('front.index');
    }

    public function Logout()
    {
        auth()->logout(); 

        session()->flash('flashMessage', 'Vous êtes déconnecté');

        return redirect()->intended('/');     
    }
}
