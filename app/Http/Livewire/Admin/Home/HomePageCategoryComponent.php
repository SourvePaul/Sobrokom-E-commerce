<?php

namespace App\Http\Livewire\Admin\Home;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HomePageCategoryComponent extends Component
{
    use LivewireAlert;

    public $selected_categories = [];
    public $numberofproducts;

    public function mount(){
        $category = HomeCategory::find(2);
        if ($category) {
            $this->selected_categories = explode(',', $category->categories);
            $this->numberofproducts = $category->products;
        }
    }

    public function updateHomeCategory(){

        try{
            $category = HomeCategory::find(2);
            if($category) {
                $category->categories = implode(',', $this->selected_categories);
                $category->products = $this->numberofproducts;
                $category->save();
                $this->alert('success', 'Categories and Products have been updated or added');
            } else {
                $this->alert('error', 'HomeCategory with ID 1 not found');
            }
        }catch(\Exception $e) {
            $this->alert('error', ' error form Categories and Products has been updated or added' . $e->getMessage());
        }
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.home.home-page-category-component', ['categories'=>$categories])->layout('layouts.admin');
    }
}