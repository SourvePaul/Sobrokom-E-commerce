<?php

namespace App\Http\Livewire\Admin\Brand;

use Carbon\Carbon;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditBrandComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;

    public $name;
    public $logo;
    public $status;
    public $position;
    public $newlogo;
    public $b_id;

    protected $rules = [
        'name' => 'required',
        'position' => 'required',
        'status' => 'required',
        // 'logo' => 'required|mimes:jpeg,jpg,png',
    ];

    public function mount($id){
        $this->b_id = $id;

        $brand= Brand::find($this->b_id);
        $this->name = $brand->name;
        $this->logo = $brand->logo;
        $this->status = $brand->status;
        $this->position = $brand->position;
    }

    public function updateBrand() {
        $this->validate();
        try{
            $brand = Brand::find($this->b_id);
            $brand->name = $this->name;
            $brand->status = $this->status;
            $brand->position = $this->position;
            if($this->newlogo){
                $imageName = Carbon::now()->timestamp.'.'.$this->newlogo->getClientOriginalExtension();
                $this->newlogo->storeAs('assets/images/brand', $imageName);
                $brand->logo=$imageName;
                unlink('assets/images/brand'.'/'.$this->logo);
            }else {
                $this->alert('danger', 'Brand Image/logo is missing', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                    'timeProgressBar' =>true,
                ]);
            }
            $brand->save();
            $this->alert('success', 'Brand has been edit successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }catch(\Exception $e){
            $this->alert('danger', 'Brand edit error ' . $e->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
    }

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
        $brands = Brand::orderBy('id','desc')->take(6)->get();
        return view('livewire.admin.brand.edit-brand-component', ['brands' => $brands])->layout('layouts.admin');
    }
}