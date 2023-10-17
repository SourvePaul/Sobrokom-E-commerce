<div class="sort-by-cover">
    <div>
        <select class="form-control" style="color:#777;
            background: #f7f8f9;
            border-radius: 26px;
            height: 43px;
            padding-left: 0px;
            font-size: 13px;
            text-align: center;"
                wire:model="sorting">
            <option value="default" selected="selected">Default sorting</option>
            <option value="1">Featured</option>
            <option value="date">Sort by newness</option>
            <option value="price">Sort by price: low to high</option>
            <option value="price-desc">Sort by price: high to low</option>
            <option value="az">Sort by: a to z</option>
            <option value="za">Sort by: z to a</option>
        </select>
    </div>
</div>

