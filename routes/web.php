<?php

use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminCategoriesComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\HomeSlide\AdminAddHomeSlideComponent;
use App\Http\Livewire\Admin\HomeSlide\AdminEditHomeSlideComponent;
use App\Http\Livewire\Admin\HomeSlide\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\Product\AdminAddProductComponent;
use App\Http\Livewire\Admin\Product\AdminEditProductComponent;
use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CommentComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\TermConditionsComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\WishListComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/cart', CartComponent::class)->name('shop.cart');
Route::get('/wishlist', WishListComponent::class)->name('shop.wishlist');
Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');
Route::get('/product-category/{slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
Route::get('/private-policy', PrivacyPolicyComponent::class)->name('policy');
Route::get('/terms-conditions', TermConditionsComponent::class)->name('terms');


//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
Route::middleware(['auth', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',  AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_id}',  AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/products',  AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',  AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/product/edit/{product_id}',  AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('/admin/slider',  AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('/admin/slider/add',  AdminAddHomeSlideComponent::class)->name('admin.home.slide.add');
    Route::get('/admin/slider/edit/{slide_id}',  AdminEditHomeSlideComponent::class)->name('admin.home.slide.edit');
    Route::get('/admin/orders/{order_id}',  AdminOrderDetailsComponent::class)->name('admin.orderdetails');
});



require __DIR__.'/auth.php';
