<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\SaleOn;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SaleONComponent extends Component
{

    use LivewireAlert;

    public $start;
    public $end;
    public $status;

    public function mount(){
        $sale = SaleOn::find(1);
        $this->start = $sale->start;
        $this->end = $sale->end;
        $this->status = $sale->status;
    }

    public function updateSale(){
        try{
            $sale = SaleOn::find(1);
            $sale->start =  $this->start;
            $sale->end = $this->end;
            $sale->status = $this->status;
            $sale->save();
            $this->alert('success', 'Sale On Timer Updated');
        }catch(\Exception $e) {
            $this->alert('error', 'Sale On Timer error' . $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.admin.home.sale-o-n-component')->layout("layouts.admin");
    }
}