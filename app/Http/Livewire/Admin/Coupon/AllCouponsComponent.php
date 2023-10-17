<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class AllCouponsComponent extends Component
{

    use WithPagination;
    use LivewireAlert;


    public function changeStatus($id, $status) {

        try{
            $cop = Coupon::find($id);
            $cop->status = $status;
            $cop->save();
            $this->alert('success', 'Coupon status has been updated successfully!');
        }catch(\Exception $e) {
            $this->alert('error', 'Error Coupon status' . $e->getMessage());
        }
    }

    public function deleteCoupon($id) {
        try{
            $cop = Coupon::find($id);
            $cop->delete();
            $this->alert('success', 'Coupon deleted successfully!');
        }
        catch(\Exception $e){
            $this->alert('error', 'Ops something went wrong Coupon has been not deleted! ' . $e->getMessage());
        }
    }

    public function render()
    {
        $coupons = Coupon::paginate(4);
        return view('livewire.admin.coupon.all-coupons-component', ['coupons'=>$coupons])->layout("layouts.admin");
    }
}