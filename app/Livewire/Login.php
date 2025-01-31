<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Auth;


class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function loginUser(Request $request)
    {
        $validated = $this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return $this->redirect('/admin-home', navigate:true);
        }

        $this->addError('email', 'The password provided does not match the email');

    }
}
