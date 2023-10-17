<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AllBannersComponent extends Component
{

    use LivewireAlert;
    use WithPagination;

    public $perPage = 8;
    public $sorting = 'desc';
    public $search;

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
        $banners = Banner::where('position', 'LIKE', '%' . $this->search . '%')->orderBy('position', $this->sorting)->paginate($this->perPage);
        return view('livewire.admin.banners.all-banners-component', ['banners'=>$banners])->layout("layouts.admin");
    }
}