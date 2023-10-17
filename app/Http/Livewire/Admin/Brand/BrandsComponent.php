<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BrandsComponent extends Component
{

    use LivewireAlert;
    use WithPagination;

    public function deleteBrand($id) {
        try{
            Brand::destroy($id);
            $this->alert('success', 'Brand Has been deleted successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }catch(\Exception $e) {
            $this->alert('danger', 'Brand not delete ' . $e->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
    }

    public function updateStatus($id, $status) {
        try{
            $brand = Brand::find($id);
            $brand->status = $status;
            $brand->save();
            $this->alert('success', 'Brand Has been updated successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }catch(\Exception $e) {
            
            $this->alert('danger', 'Brand status error ' . $e->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
    }

    public function render()
    {
        $brands = Brand::orderBy('id','desc')->paginate(8);
        return view('livewire.admin.brand.brands-component', ['brands'=>$brands])->layout('layouts.admin');
    }
}