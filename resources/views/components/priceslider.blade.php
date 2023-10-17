<div class="sidebar-widget price_range range mb-30">
        <h5 class="section-title style-1 mb-30">Fill by price</h5> 
    <div class="price-filter">
        <div class="price-filter-inner">
            <h2 class="widget-title" style="font-size:12px;padding-bottom:10px;">Price
                <span class="text-info"></span>
            </h2>
            <div class="widget-content" style="padding-bottom:20px;">
                <div id="slider" wire:ignore></div>
            </div>
        </div>
    </div>
    <div class="list-group">
        <div class="list-group-item mb-9 mt-11">
            <label class="fw-900">Color</label>
            <div class="custome-checkbox">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                <label class="form-check-label" for="exampleCheckbox1">
                    <span>Red (56)</span>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                <label class="form-check-label" for="exampleCheckbox2">
                    <span>Green (78)</span>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                <label class="form-check-label" for="exampleCheckbox3">
                    <span>Blue (54)</span>
                </label>
            </div>
            <label class="fw-900 mt-15">Item Condition</label>
            <div class="block">
                <input type="radio" name="new" id="new11" style="width:18px;margin-right:5px;" value="New" wire:model="new">
                <label class="form-check-label" for="new11">
                    <span>New (1506)</span>
                </label>
                <br>
                <input type="radio" name="refurbished" id="refurnished21" style="width:18px;margin-right:5px;" value="Refurnished" wire:model="refurnished">
                <label class="form-check-label" for="refurnished21">
                    <span>Refurnished (27)</span>
                </label>
                <br>
                <input type="radio" name="used" id="used31" style="width:18px;margin-right:5px;" value="Used" wire:model="used">
                <label class="form-check-label" for="used31">
                    <span>Used (45)</span>
                </label>
            </div>
        </div>
    </div>
    {{-- <a href="shop-grid-right.html" class="btn btn-sm btn-default">
        <i class="fa fa-filter mr-5"></i> 
        Fillter
    </a> --}}
</div>