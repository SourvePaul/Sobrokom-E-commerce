<?php

namespace App\Http\Livewire\Header;

use Livewire\Component;
use App\Models\HomePageSetting;

class Headercomponent extends Component
{
    public function render()
    {
        $setting = HomePageSetting::first();
        return view('livewire.header.headercomponent', ['setting' => $setting]);
    }
}