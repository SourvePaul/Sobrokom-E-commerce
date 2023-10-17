<?php

use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SaleComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\BrandComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\CompareComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ShopGridComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\BlogDetailComponent;
use App\Http\Livewire\Admin\ErrorComponent;
use App\Http\Livewire\ShopListViewComponent;
use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\ProductDetailComponent;
use App\Http\Livewire\PurchaseGuideComponent;
use App\Http\Livewire\TermsConditionComponent;
use App\Http\Livewire\Admin\User\UserComponent;
use App\Http\Livewire\User\UserOrdersComponent;

// Admin Routes Component Spo //
use Illuminate\Foundation\Console\AboutCommand;

// User Routes Component Class Spo //
use App\Http\Livewire\ShopRightSideBarComponent;
use App\Http\Livewire\Admin\Home\SaleONComponent;
use App\Http\Livewire\Admin\Brand\BrandsComponent;
use App\Http\Livewire\Admin\Order\OrdersComponent;
use App\Http\Livewire\User\UserAddReviewComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\Brand\AddBrandComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\User\UserOrderDetailComponent;
use App\Http\Livewire\Admin\Brand\EditBrandComponent;
use App\Http\Livewire\Admin\Coupon\AddCouponComponent;
use App\Http\Livewire\Admin\Product\ProductsComponent;
use App\Http\Livewire\Admin\Banners\AddBannerComponent;
use App\Http\Livewire\Admin\Coupon\AllCouponsComponent;
use App\Http\Livewire\Admin\Coupon\EditCouponComponent;
use App\Http\Livewire\Admin\Order\OrderDetailComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\Admin\Banners\AllBannersComponent;
use App\Http\Livewire\Admin\Banners\EditBannerComponent;
use App\Http\Livewire\Admin\Product\AddProductComponent;
use App\Http\Livewire\Admin\Category\CategoriesComponent;
use App\Http\Livewire\Admin\Product\EditProductComponent;
use App\Http\Livewire\Admin\Category\AddCategoryComponent;
use App\Http\Livewire\Admin\Home\HomePageSettingComponent;
use App\Http\Livewire\Admin\Messages\AllMessagesComponent;
use App\Http\Livewire\Admin\Category\EditCategoryComponent;
use App\Http\Livewire\Admin\Home\HomePageCategoryComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/shop-right-grid', ShopRightSideBarComponent::class)->name('shop-right-grid');
Route::get('/shop-grid', ShopGridComponent::class)->name('shop-grid');
Route::get('/shop-list-view', ShopListViewComponent::class)->name('shop-list');
Route::get('/product-detail/{slug}', ProductDetailComponent::class)->name('product-detail');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/compare', CompareComponent::class)->name('compare');
Route::get('/blog', BlogComponent::class)->name('blog');
Route::get('/blog-detail', BlogDetailComponent::class)->name('blog-detail');
Route::get('/purchase-guide', PurchaseGuideComponent::class)->name('purchase-guide');
Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('privacy-policy');
Route::get('/terms-condition', TermsConditionComponent::class)->name('terms-condition');
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
Route::get('/category/{slug}', CategoryComponent::class)->name('category');
Route::get('/search', SearchComponent::class)->name('search');
Route::get('/brand/{id}',BrandComponent::class)->name('brand');
Route::get('/sale', SaleComponent::class)->name('sale');

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
	Route::prefix('admin')->group(function () {
		Route::get('/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
		Route::get('/categories', CategoriesComponent::class)->name('admin.categories');
		Route::get('/add/category', AddCategoryComponent::class)->name('admin.add_category');
		Route::get('/edit/category/{slug}', EditCategoryComponent::class)->name('admin.edit_category');
		Route::get('/error/404', ErrorComponent::class)->name('error');

		Route::get('/brands', BrandsComponent::class)->name('admin.brands');
		Route::get('/add/new/brand', AddBrandComponent::class)->name('admin.add_brand');
		Route::get('/edit/brand/{id}', EditBrandComponent::class)->name('admin.edit_brand');

		Route::get('/products', ProductsComponent::class)->name('admin.products');
		Route::get('/add/new/product', AddProductComponent::class)->name('admin.add_product');
		Route::get('/edit/product/{id}', EditProductComponent::class)->name('admin.edit_product');

		Route::get('all/customers', UserComponent::class)->name('admin.users');

		Route::get('/all/orders', OrdersComponent::class)->name('admin.orders');
		Route::get('/detail/order/{id}', OrderDetailComponent::class)->name('admin.order_detail');

		Route::get('/admin/all/banners', AllBannersComponent::class)->name('admin.banners');
		Route::get('/add/new/banner', AddBannerComponent::class)->name('admin.add_banner');
		Route::get('/edit/banner/{id}', EditBannerComponent::class)->name('admin.edit_banner');

		Route::get('/home_page/categories', HomePageCategoryComponent::class)->name('admin.home_page_categories');
		Route::get('/sale_on', SaleONComponent::class)->name('admin.sale');

		Route::get('/all/coupons', AllCouponsComponent::class)->name('admin.coupons');
		Route::get('/add/coupon', AddCouponComponent::class)->name('admin.add_coupon');
		Route::get('/edit/coupon/{id}', EditCouponComponent::class)->name('admin.edit_coupon');

		Route::get('/all/messages', AllMessagesComponent::class)->name('admin.messages');
		Route::get('/web/general/setting', HomePageSettingComponent::class)->name('admin.setting');
	});									 
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::prefix('user')->group(function () {
		Route::get('/dashboard', UserDashboardComponent::class)->name('user.dashboard');
		Route::get('/edit/profile', UserEditProfileComponent::class)->name('edit.profile');
		Route::get('/edit/password', UserChangePasswordComponent::class)->name('user_change.password');
		Route::get('/my/orders', UserOrdersComponent::class)->name('user.orders');
		Route::get('/order/detail/{id}', UserOrderDetailComponent::class)->name('user_order.detail');
		Route::get('/order/review/{id}/{product_id}', UserAddReviewComponent::class)->name('user_add.review');
	});
});