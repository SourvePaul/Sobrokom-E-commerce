<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    public function render()
    {
        $users = User::where('utype','USR')->orderBy('id','desc')->paginate(8);
        return view('livewire.admin.user.user-component', ['users' => $users])->layout("layouts.admin");
    }
}