<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PurchaseGuideComponent extends Component
{
    public function render()
    {
        return view('livewire.purchase-guide-component')->layout('layouts.base');
    }
}