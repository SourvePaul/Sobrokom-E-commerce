<?php

namespace App\Http\Livewire\Header;

use App\Models\HomePageSetting;
use Livewire\Component;

class MobileHeadercomponent extends Component
{
    public function render()
    {
        $setting = HomePageSetting::first();
        return view('livewire.header.mobile-headercomponent', ['setting' => $setting]);
    }
}