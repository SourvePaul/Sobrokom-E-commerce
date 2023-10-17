<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MenuComponent extends Component
{
    public function render()
    {
        return <<<'blade'
        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
            <nav>
                <ul>
                    <li><a class="active" href="{{route('home')}}"> Home </a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('shop')}}"> Shop </a></li>
                    <li><a href="{{route('sale')}}"> Sale </a></li>
                    <li>
                        <a href="#"> Brands <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            @php
                                $brands=DB::table('brands')->get();
                            @endphp
                            @foreach($brands as $brand)
                                <li><a href="{{route('brand', ['id'=>$brand->id])}}">{{$brand->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="position-static"><a href="#">Best Collection<i class="fa fa-angle-down"></i></a>
                    
                    <li><a href="#"> More <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('purchase-guide') }}">Purchase Guide</a></li>
                            <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('terms-condition') }}">Terms of Service</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        blade;
    }
}