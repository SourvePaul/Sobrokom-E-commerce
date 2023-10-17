<?php

namespace App\Http\Livewire\Admin\Messages;

use App\Models\Message;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class AllMessagesComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public function deleteMessage($id){
        try{
            $msg = Message::find($id);
            $msg->delete();
            $this->alert('success', 'Delete this message done.');
        }catch(\Exception $e){
            $this->alert('error', 'Delete this message error ' . $e->getMessage());
        }
    }

    public function render()
    {
        $msgs = Message::orderBy('created_at', 'desc')->paginate(12);
        return view('livewire.admin.messages.all-messages-component', ['msgs'=>$msgs])->layout("layouts.admin");
    }
}