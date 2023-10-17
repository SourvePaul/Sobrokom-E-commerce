<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditCouponComponent extends Component
{
    use LivewireAlert;
    
    public $name;
    public $coupon_value;
    public $cart_value;
    public $type;
    public $status;
    public $end;

    public $c_id;
    protected $rules = [
        'name' => 'required',
        'coupon_value' => 'required',
        'cart_value' => 'required',
        'type' => 'required',
        'status' => 'required',
        'end' => 'required'
    ];

    public function mount($id) {
        $this->c_id = $id;
        $cop = Coupon::find($this->c_id);
        $this->name = $cop->name;
        $this->coupon_value = $cop->coupon_value;
        $this->cart_value = $cop->cart_value;
        $this->type = $cop->type;
        $this->status = $cop->status;
        $this->end = $cop->end;
    }
    
    public function updateCoupon(){
        try{
            $cop = Coupon::find($this->c_id);
            $cop->name = $this->name;
            $cop->coupon_value = $this->coupon_value;
            $cop->cart_value = $this->cart_value;
            $cop->type = $this->type;
            $cop->status = $this->status;
            $cop->end = $this->end;
            $cop->save();
            $this->alert('success', 'This Coupon has been updated successfully!'); 
        }catch(\Exception $e){
            $this->alert('error', 'Coupon update error ' . $e->getMessage()); 
        }
    }
    public function render()
    {
        return view('livewire.admin.coupon.edit-coupon-component')->layout("layouts.admin");
    }
}