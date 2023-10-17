<?php

namespace App\Http\Livewire\Admin\Category;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Phparser\Node\Stmt\TryCatch;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditCategoryComponent extends Component
{

    use LivewireAlert;
    use WithFileUploads;
    public $name;
    public $slug;
    public $logo;
    public $status;
    public $newlogo;
    public $cat_slug;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'status' => 'required',
        // 'logo' => 'required|mimes:jpeg,jpg,png',
    ];

    public function mount($slug){

        $this->cat_slug = $slug;
        $category = Category::where('slug', $slug)->first();

        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->logo = $category->logo;
        $this->status = $category->status;
    }

    public function generateslug() {
        $this->slug = Str::slug($this->name, '-');
    }
    
    public function updateCategory() {

        $this->validate();
        try{
            $category = Category::where('slug',$this->cat_slug)->first();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->status = $this->status;
            if($this->newlogo){
                $imageName = Carbon::now()->timestamp.'.'.$this->newlogo->getClientOriginalExtension();
                $this->newlogo->storeAs('assets/images/category', $imageName);
                $category->logo=$imageName;
                unlink('assets/images/category'.'/'.$this->logo);
            }else {
                $this->alert('danger', 'Category Image/logo is missing', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                    'timeProgressBar' =>true,
                ]);
            }
            $category->save();
            $this->alert('success', 'Category has been edit successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        } catch(\Exception $e) {
           return redirect()->route('error');
        }
    } 

    public function updateStatus($id, $status) {
        try{
            $category = Category::find($id);
            $category->status = $status;
            $category->save();
            $this->alert('success', 'Category status has been updated successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
        catch(\Exception $e){
            $this->alert('danger', 'Ops something went wrong status has been not updated!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
    }

    public function deleteCategory($id) {
        try{
            $category = Category::find($id);
            unlink('assets/images/category'.'/'.$category->logo);
            $category->delete();
            $this->alert('success', 'Category deleted successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
        catch(\Exception $e){
            $this->alert('danger', 'Ops something went wrong category has been not deleted!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timeProgressBar' =>true,
            ]);
        }
    }
    
    public function render()
    {
        $categories = Category::orderBy('id','desc')->limit(5)->get();
        return view('livewire.admin.category.edit-category-component', ['categories' => $categories])->layout('layouts.admin');
    }
}