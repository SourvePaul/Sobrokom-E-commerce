<?php

namespace App\Http\Livewire\Admin\Banners;

use Carbon\Carbon;
use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddBannerComponent extends Component
{

    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $image;
    public $status;
    public $position;
    public $link;

    protected $rules = [
        'title' => 'required',
        'subtitle' => 'required',
        'image' => 'required',
        'status' => 'required',
        'position' => 'required',
        'link' => 'required',
    ];

    public function addBanner() {
        $this->validate();

        try{
            $banner = new Banner();
            $banner->title = $this->title;
            $banner->subtitle = $this->subtitle;
            $banner->link = $this->link;
            $banner->position = $this->position;
            $banner->status = $this->status;
            if($this->image){
                $imageName = Carbon::now()->timestamp.'banner.'.$this->image->getClientOriginalExtension();
                $this->image->storeAs('assets/images', $imageName);
                $banner->image = $imageName;
            }
            $banner->save();
            $this->alert('success', 'New Banner Added Successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timeProgressBar' =>true,
            ]);

        }catch(\Exception $e){
            $this->alert('error', 'Error Banner Added' . $e->getMessage());
        }
    }

    public function changeStatus($id, $status) {

        try{
            $banner = Banner::find($id);
            $banner->status = $status;
            $banner->save();
            $this->alert('success', 'Banner status has been updated successfully!');
        }catch(\Exception $e) {
            $this->alert('error', 'Error Banner status' . $e->getMessage());
        }
    }

    public function deleteBanner($id) {
        try{
            $banner = Banner::find($id);
            unlink('assets/images'.'/'.$banner->image);
            $banner->delete();
            $this->alert('success', 'Banner deleted successfully!');
        }
        catch(\Exception $e){
            $this->alert('error', 'Ops something went wrong Banner has been not deleted!' . $e->getMessage());
        }
    }
    
    public function render()
    {
        $banners = Banner::orderBy('id','desc')->limit(5)->get();
        return view('livewire.admin.banners.add-banner-component', ['banners'=>$banners])->layout("layouts.admin");
    }
}