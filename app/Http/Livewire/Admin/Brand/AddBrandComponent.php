<?php

namespace App\Http\Livewire\Admin\Brand;

use Carbon\Carbon;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddBrandComponent extends Component
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
        'logo' => 'required|mimes:jpeg,jpg,png',
    ];

    public function addBrand() {
        $this->validate();
        try{
            $brand = new Brand;
            $brand->name = $this->name;
            $brand->status = $this->status;
            $brand->position = $this->position;
            if($this->logo){
                $imageName = Carbon::now()->timestamp.'.'.$this->logo->getClientOriginalExtension();
                $this->logo->storeAs('assets/images/brand', $imageName);
                $brand->logo=$imageName;
                // unlink('assets/images'.'/'.$this->logo);
            }else {
                $this->alert('danger', 'Brand Image/logo is missing', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                    'timeProgressBar' =>true,
                ]);
            }
            $brand->save();
            $this->alert('success', 'New Brand has been Added successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }catch(\Exception $e){
            $this->alert('danger', 'Brand add error ' . $e->getMessage(), [
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
            $this->alert('danger', 'Brand delete error ' . $e->getMessage(), [
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
            $this->alert('success', 'Brand status has been updated successfully!', [
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
        $brands = Brand::orderBy('id','desc')->limit(5)->get();
        return view('livewire.admin.brand.add-brand-component', ['brands'=>$brands])->layout('layouts.admin');
    }
}