<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ContactComponent extends Component
{

    use LivewireAlert;

    public $name;
    public $email;
    public $mobile;
    public $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'message' => 'required'
    ];
    
    public function sendMessage(){
        try{
            $msg = new Message();
            $msg->name = $this->name;
            $msg->email = $this->email;
            $msg->mobile = $this->mobile;
            $msg->message = $this->message;
            $msg->save();
            $this->alert('success', 'Message send successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
            
        }catch(\Exception $e){
            $this->alert('error', 'error from message send ' . $e->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.contact-component')
                    ->layout('layouts.base');
    }
}