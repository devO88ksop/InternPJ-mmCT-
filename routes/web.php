    <?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Console\View\Components\Alert;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\UI\ProductController as UIProductController;

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
Route::get('/ui/product', [UIProductController::class, 'index'])->name('ui.product');
Route::get('/ui/category', [UIProductController::class, 'category'])->name('ui.category');
Route::get('/ui/cart', [UIProductController::class, 'cart'])->name('cart');
Route::get('/ui/add-to-cart/{id}', [UIProductController::class, 'addToCart'])->name('add.to.cart');
Route::post('/ui/buy-now/{id}', [UIProductController::class, 'buyNow'])->name('buy.now');
Route::patch('/ui/update-cart', [UIProductController::class, 'update'])->name('update.cart');
Route::patch('/ui/minusupdate-cart', [UIProductController::class, 'minusUpdate'])->name('minusupdate.cart');
Route::delete('ui/remove-from-cart',[UIProductController::class, 'remove'])->name('remove.from.cart');
Route::post('ui/checkout',[UIProductController::class,'checkout'])->name('checkout.from.cart');
Route::post('/ui/preorder/{id}',[UIProductController::class,'preorder'])->name('preorder.cart');
Route::get('/ui/buynowcart/{id}',[UIProductController::class,'buynowcart'])->name('buynowcart.cart');
Route::get('/ui/preorderCart/{id}',[UIProductController::class,'preorderCart'])->name('preorderCart.cart');

// Route::get

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.master');
    });
// Route::redirect('/', 'admin/dashboard');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);
Route::get('preorder', [OrderController::class,'preOrder'])->name('preorder');
Route::resource('subcategories', SubCategoryController::class);
Route::resource('PurchaseOrders', PurchaseOrderController::class);
Route::post('order/{id}/update/status', [OrderController::class,'updateStatus']);
Route::post('order/{id}/update/delivery', [OrderController::class,'updateDelivery']);
Route::resource('deliverys', DeliveryController::class);
Route::resource('sliders', SliderController::class);
Route::resource('aboutus' , AboutUsController::class);




    });
    Route::get('/master', function () {
        return view('layouts.masterL');
    });
Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('admins', AdminController::class);

Route::get('/alert',function(){
    Alert::success('Success Title', 'Success Message');
});

