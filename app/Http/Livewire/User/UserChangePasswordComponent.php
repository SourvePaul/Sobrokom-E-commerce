<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserChangePasswordComponent extends Component
{

    public $current_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed|different:current_password',
    ];

    public function changePassword() {
        
        $this->validate();
        
        if(Hash::check($this->current_password, Auth::user()->password)) {
            $user = User::findOrfail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('success', 'Password has been changed successfully');
        } else {
            session()->flash('fail', 'Password does not match');
        }
    }
    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout("layouts.base");
    }
}