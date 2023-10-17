<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategoriesComponent extends Component
{

    use LivewireAlert;
    use WithPagination;

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
        $categories = Category::orderBy('id','desc')->paginate(12);
        return view('livewire.admin.category.categories-component', ['categories' => $categories])->layout('layouts.admin');
    }
}