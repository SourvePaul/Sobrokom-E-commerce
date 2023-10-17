@php
    $categories = DB::table('categories')->inRandomOrder()->limit(10)->get();
@endphp
<div class="widget-category mb-30">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
    <ul class="categories">
        @forelse($categories as $category)
        <li><a href="{{route('category', ['slug'=>$category->slug])}}">{{ $category->name }}</a></li>
        @empty
            <li><a href="#">Blouses & Shirts</a></li>
            <li><a href="#">Dresses</a></li>
            <li><a href="#">Swimwear</a></li>
            <li><a href="#">Beauty</a></li>
            <li><a href="#">Jewelry & Watch</a></li>
            <li><a href="#">Accessories</a></li>
        @endforelse
    </ul>
</div>