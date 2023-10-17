<?php

namespace App\Http\Livewire\Admin\Banners;

use Carbon\Carbon;
use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditBannerComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;

    public $banner;
    public $title;
    public $subtitle;
    public $image;
    public $status;
    public $position;
    public $link;
    public $new_image;
    public $b_id;


    protected $rules = [
        'title' => 'required',
        'subtitle' => 'required',
        'status' => 'required',
        'position' => 'required',
        'link' => 'required',
    ];

    public function mount($id){
        $this->b_id = $id;
        $banner = Banner::find($this->b_id);
        $this->title = $banner->title;
        $this->subtitle = $banner->subtitle;
        $this->link =  $banner->link;
        $this->position = $banner->position;
        $this->image = $banner->image;
        $this->status = $banner->status;
    }

    public function updateBanner() {
        $this->validate();

        try{
            $banner = Banner::find($this->b_id);
            $banner->title = $this->title;
            $banner->subtitle = $this->subtitle;
            $banner->link = $this->link;
            $banner->position = $this->position;
            $banner->status = $this->status;
            if($this->new_image){
                $imageName = Carbon::now()->timestamp.'banner.'.$this->new_image->getClientOriginalExtension();
                $this->new_image->storeAs('assets/images', $imageName);
                $banner->image = $imageName;
            }
            $banner->save();
            $this->alert('success', 'Banner Updated Successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timeProgressBar' =>true,
            ]);

        }catch(\Exception $e){
            $this->alert('error', 'Error Banner Updated' . $e->getMessage());
        }
    }

    
    public function render()
    {
        return view('livewire.admin.banners.edit-banner-component')->layout("layouts.admin");
    }
}