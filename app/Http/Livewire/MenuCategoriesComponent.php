<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuCategoriesComponent extends Component
{
    public function render()
    {
        return <<<'blade'
        @php
            $categories = DB::table("categories")->inRandomOrder()->limit(10)->get();
        @endphp
        <div class="main-categori-wrap d-none d-lg-block">
            <a class="categori-button-active" href="#">
                <span class="fa fa-th"></span> Browse Categories
            </a>
            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                <ul>
                    @foreach($categories as $category)
                        <li class="has-children">
                            <a href="{{route('category', ['slug'=>$category->slug])}}">
                                <img src="{{asset('assets/images/category')}}/{{$category->logo}}" style="width:24px; border-radius:91px; border:1px solid #79101e; margin-right:5px;" alt="category_logo_image" />
                                {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="more_categories">Show more...</div>
            </div>
        </div>
        blade;
    }
}