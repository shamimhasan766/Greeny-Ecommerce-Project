<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerAdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceDownloadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WishlistController;
use App\Models\Color;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;


// Frontend
Route::get('/', [HomeController::class, 'Index'])->name('index');
Route::post('get/product/details', [HomeController::class, 'GetProductDetails'])->name('get.product.details');
Route::get('category/products/{slug}', [HomeController::class, 'CategoryProduct'])->name('category.product');
Route::get('subcategory/products/{slug}', [HomeController::class, 'SubCategoryProduct'])->name('subcategory.product');
Route::get('product/details/{slug}', [HomeController::class, 'ProductDetails'])->name('product.details');
Route::get('product/tag/{id}', [HomeController::class, 'ProductTag'])->name('tag.product');

// Download Invoice
Route::get('invoice/download/{order_id}', [InvoiceDownloadController::class, 'InvoiceDownload'])->middleware('customer.auth')->name('invoice.download');

// WishList
Route::get('wish/list', [WishlistController::class, 'Wishlist'])->name('wishlist');
Route::post('store/wish/list', [WishlistController::class, 'StoreWishlist'])->name('store.wishlist');


// Cart
Route::post('store/cart', [CartController::class, 'StoreCart'])->middleware('customer.auth')->name('store.cart');
Route::post('/get/price/quantity', [CartController::class, 'GetQuantityPrice'])->name('get.quantity.price');
Route::post('/get/colors/', [CartController::class, 'GetColors'])->name('get.colors');
Route::get('cart/page', [CartController::class, 'CartPage'])->middleware('customer.auth')->name('cart.page');
Route::post('update/cart/quantity', [CartController::class, 'UpdateCartQuantity'])->middleware('customer.auth')->name('update.cart.quantity');
Route::delete('cart/delete', [CartController::class, 'CartDelete'])->middleware('customer.auth')->name('cart.delete');
Route::post('get/cart/count', [CartController::class, 'GetCartCount'])->middleware('customer.auth')->name('get.cart.count');
Route::post('get/coupon', [CartController::class, 'GetCoupon'])->middleware('customer.auth')->name('get.coupon');

// CheckOut
Route::get('checkout/page', [CheckOutController::class, 'CheckOutPage'])->middleware('customer.auth')->name('checkout.page');
Route::post('store/billing', [CheckOutController::class, 'StoreBilling'])->middleware('customer.auth')->name('store.billing');
Route::post('store/shipping', [CheckOutController::class, 'StoreShipping'])->middleware('customer.auth')->name('store.shipping');
Route::post('get/shipping/address', [CheckOutController::class, 'GetShippingAddress'])->middleware('customer.auth')->name('get.shipping.address');
Route::delete('delete/shipping/address', [CheckOutController::class, 'DeleteShipping'])->middleware('customer.auth')->name('delete.shipping.address');
Route::post('get/shipping/details', [CheckOutController::class, 'GetShippingDetails'])->middleware('customer.auth')->name('get.shipping.details');
Route::post('store/order', [CheckOutController::class, 'StoreOrder'])->middleware('customer.auth')->name('store.order');
Route::get('order/success/{order_id}', [CheckOutController::class, 'OrderSuccess'])->middleware('customer.auth')->name('order.success');
Route::get('tracking/order/{order_id}', [CheckOutController::class, 'TrackingOrder'])->middleware('customer.auth')->name('tracking.order');
Route::post('cancel/order', [CheckOutController::class, 'CancelOrder'])->middleware('customer.auth')->name('cancel.order');
Route::post('ssl/order', [CheckOutController::class, 'SSLOrder'])->middleware('customer.auth')->name('ssl.order');

// Customer Authentication
Route::get('customer/login', [CustomerController::class, 'CustomerLogin'])->name('customer.login');
Route::get('customer/register', [CustomerController::class, 'CustomerRegister'])->name('customer.register');
Route::post('store/customer', [CustomerController::class, 'StoreCustomer'])->name('store.customer');
Route::post('login/customer', [CustomerController::class, 'LoginCustomer'])->name('login.customer');
Route::get('customer/profile', [CustomerController::class, 'CustomerProfile'])->middleware('customer.auth')->name('customer.profile');
Route::get('customer/address', [CustomerController::class, 'CustomerAddress'])->middleware('customer.auth')->name('customer.address');
Route::get('customer/orders', [CustomerController::class, 'CustomerOrders'])->middleware('customer.auth')->name('customer.orders');
Route::get('customer/log/out', [CustomerController::class, 'CustomerLogOut'])->name('customer.log.out');
Route::post('customer/profile/update', [CustomerController::class, 'CustomerProfileUpdate'])->middleware('customer.auth')->name('customer.profile.update');
Route::post('customer/address/update', [CustomerController::class, 'CustomerAddressUpdate'])->middleware('customer.auth')->name('customer.address.update');
Route::post('customer/get/city', [CustomerController::class, 'CustomerGetCity'])->middleware('customer.auth')->name('customer.get.city');


// ------Admin Controller-------
Route::get('/dashboard', [AdminController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// User
Route::get('/user-list', [AdminController::class, 'UserList'])->middleware(['auth', 'verified'])->name('user.list');
Route::get('/user/profile', [AdminController::class, 'UserProfile'])->middleware(['auth', 'verified'])->name('user.profile');
Route::get('/user/setting', [AdminController::class, 'UserSetting'])->middleware(['auth', 'verified'])->name('user.setting');
Route::post('/user/profile/update', [AdminController::class, 'UserProfileUpdate'])->middleware(['auth', 'verified'])->name('user.profile.update');
Route::post('/user/profile/photo/update', [AdminController::class, 'UserProfilePhotoUpdate'])->middleware(['auth', 'verified'])->name('user.profile.photo.update');

// Category
Route::get('/all/category', [CategoryController::class, 'AllCategory'])->middleware(['auth', 'verified'])->name('all.category');
Route::get('/add/category', [CategoryController::class, 'AddCategory'])->middleware(['auth', 'verified'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->middleware(['auth', 'verified'])->name('store.category');
Route::get('/change/status/category/{id}', [CategoryController::class, 'ChangeStatus'])->middleware(['auth', 'verified'])->name('category.status');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->middleware(['auth', 'verified'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->middleware(['auth', 'verified'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->middleware(['auth', 'verified'])->name('delete.category');
Route::get('/trash/category', [CategoryController::class, 'TrashCategory'])->middleware(['auth', 'verified'])->name('trash.category');
Route::get('/restore/category/{id}', [CategoryController::class, 'RestoreCategory'])->middleware(['auth', 'verified'])->name('restore.category');
Route::get('/force/delete/category/{id}', [CategoryController::class, 'CategoryForceDelete'])->middleware(['auth', 'verified'])->name('force.delete.category');


// Sub Category
Route::get('/all/sub/category', [SubcategoryController::class, 'AllSubCategory'])->middleware(['auth', 'verified'])->name('all.sub.category');
Route::get('/add/sub/category', [SubcategoryController::class, 'AddSubCategory'])->middleware(['auth', 'verified'])->name('add.sub.category');
Route::get('/trash/sub/category', [SubcategoryController::class, 'TrashSubCategory'])->middleware(['auth', 'verified'])->name('trash.sub.category');
Route::post('/store/sub/category', [SubcategoryController::class, 'StoreSubCategory'])->middleware(['auth', 'verified'])->name('store.subcategory');
Route::get('/change/subcategory/status/{id}', [SubcategoryController::class, 'ChangeSubCategoryStatus'])->middleware(['auth', 'verified'])->name('change.subcategory.status');
Route::get('/delete/subcategory/{id}', [SubcategoryController::class, 'DeleteSubCategory'])->middleware(['auth', 'verified'])->name('delete.subcategory');
Route::get('/restore/subcategory/{id}', [SubcategoryController::class, 'RestoreSubCategory'])->middleware(['auth', 'verified'])->name('restore.subcategory');
Route::get('/force/delete/subcategory/{id}', [SubcategoryController::class, 'SubCategoryForceDelete'])->middleware(['auth', 'verified'])->name('force.delete.subcategory');


// Tag
Route::get('/all/tag', [TagController::class, 'AllTag'])->middleware(['auth', 'verified'])->name('all.tag');
Route::get('/add/tag', [TagController::class, 'AddTag'])->middleware(['auth', 'verified'])->name('add.tag');
Route::get('/trash/tag', [TagController::class, 'TrashTag'])->middleware(['auth', 'verified'])->name('trash.tag');
Route::post('/store/tag', [TagController::class, 'StoreTag'])->middleware(['auth', 'verified'])->name('store.tag');
Route::get('/delete/tag/{id}', [TagController::class, 'DeleteTag'])->middleware(['auth', 'verified'])->name('delete.tag');
Route::get('/restore/tag/{id}', [TagController::class, 'RestoreTag'])->middleware(['auth', 'verified'])->name('restore.tag');
Route::get('/force/delete/tag/{id}', [TagController::class, 'TagForceDelete'])->middleware(['auth', 'verified'])->name('force.delete.tag');

// Brands
Route::get('/all/brands', [BrandController::class, 'AllBrand'])->middleware(['auth', 'verified'])->name('all.brand');
Route::get('/add/brand', [BrandController::class, 'AddBrand'])->middleware(['auth', 'verified'])->name('add.brand');
Route::get('/trash/brands', [BrandController::class, 'TrashBrand'])->middleware(['auth', 'verified'])->name('trash.brand');
Route::post('/store/brand', [BrandController::class, 'StoreBrand'])->middleware(['auth', 'verified'])->name('store.brand');
Route::get('/delete/brand/{id}', [BrandController::class, 'DeleteBrand'])->middleware(['auth', 'verified'])->name('delete.brand');
Route::get('/restore/brand/{id}', [BrandController::class, 'RestoreBrand'])->middleware(['auth', 'verified'])->name('restore.brand');
Route::get('/force/delete/brand/{id}', [BrandController::class, 'BrandForceDelete'])->middleware(['auth', 'verified'])->name('force.delete.brand');



// Product
Route::get('/all/Product', [ProductController::class, 'AllProduct'])->middleware(['auth', 'verified'])->name('all.product');
Route::get('/all/Product/grid', [ProductController::class, 'AllProductGrid'])->middleware(['auth', 'verified'])->name('all.product.grid');
Route::get('/add/Product', [ProductController::class, 'AddProduct'])->middleware(['auth', 'verified'])->name('add.product');
Route::get('product/view/{id}', [ProductController::class, 'ProductView'])->middleware('auth', 'verified')->name('product.view');
Route::get('product/edit/{id}', [ProductController::class, 'ProductEdit'])->middleware('auth', 'verified')->name('product.edit');
Route::post('product/update/', [ProductController::class, 'ProductUpdate'])->middleware('auth', 'verified')->name('product.update');
Route::get('gallery/image/delete/{id}', [ProductController::class, 'GalleryImageDelete'])->middleware('auth', 'verified')->name('gallery.image.delete');
Route::get('/trash/product', [ProductController::class, 'TrashProduct'])->middleware(['auth', 'verified'])->name('trash.product');
Route::post('get/subcategory', [ProductController::class, 'GetSubcategory'])->middleware('auth', 'verified')->name('get.subcategory');
Route::post('store/product', [ProductController::class, 'ProductStore'])->middleware('auth', 'verified')->name('store.product');
Route::get('change/status/{id}', [ProductController::class, 'Changestatus'])->middleware('auth', 'verified')->name('product.status');
Route::get('product/delete/{id}', [ProductController::class, 'DeleteProduct'])->middleware('auth', 'verified')->name('delete.product');
Route::get('restore/product/{id}', [ProductController::class, 'RestoreProduct'])->middleware('auth', 'verified')->name('restore.product');
Route::get('product/force/delete/{id}', [ProductController::class, 'ProductForceDelete'])->middleware('auth', 'verified')->name('product.force.delete');

// Coupon
Route::get('add/coupon', [CouponController::class, 'AddCoupon'])->middleware('auth', 'verified')->name('add.coupon');
Route::get('all/coupon', [CouponController::class, 'AllCoupon'])->middleware('auth', 'verified')->name('all.coupon');
Route::post('store/coupon', [CouponController::class, 'StoreCoupon'])->middleware('auth', 'verified')->name('store.coupon');


// Customer
Route::get('customer/list', [CustomerAdminController::class, 'CustomerList'])->middleware('auth', 'verified')->name('customer.list');


// Order
Route::get('order/list', [OrderController::class, 'OrderList'])->middleware('auth', 'verified')->name('order.list');
Route::get('order/details/view/{id}', [OrderController::class, 'OrderDetailsView'])->middleware('auth', 'verified')->name('order.details.view');
Route::post('order/status/change/{id}', [OrderController::class, 'OrderStatusChange'])->middleware('auth', 'verified')->name('order.status.change');



// Inventory

// Color
Route::get('all/colors', [ColorController::class, 'AllColor'])->middleware(['auth', 'verified'])->name('all.color');
Route::get('add/color', [ColorController::class, 'AddColor'])->middleware(['auth', 'verified'])->name('add.color');
Route::get('trash/colors', [ColorController::class, 'TrashColor'])->middleware(['auth', 'verified'])->name('trash.color');
Route::post('store/color', [ColorController::class, 'ColorStore'])->middleware('auth', 'verified')->name('color.store');
Route::get('color/change/status/{id}', [ColorController::class, 'ColorChangeStatus'])->middleware('auth', 'verified')->name('color.change.status');
Route::get('color/delete/{id}', [ColorController::class, 'ColorDelete'])->middleware('auth', 'verified')->name('color.delete');
Route::get('color/restore/{id}', [ColorController::class, 'ColorRestore'])->middleware('auth', 'verified')->name('color.restore');
Route::get('color/force/delete/{id}', [ColorController::class, 'ColorForceDelete'])->middleware('auth', 'verified')->name('color.force.delete');

// Size
// Color
Route::get('all/sizes', [SizeController::class, 'AllSize'])->middleware(['auth', 'verified'])->name('all.size');
Route::get('add/size', [SizeController::class, 'AddSize'])->middleware(['auth', 'verified'])->name('add.size');
Route::get('trash/size', [SizeController::class, 'TrashSize'])->middleware(['auth', 'verified'])->name('trash.size');
Route::post('store/size', [SizeController::class, 'SizeStore'])->middleware('auth', 'verified')->name('size.store');
Route::get('size/change/status/{id}', [SizeController::class, 'SizeChangeStatus'])->middleware('auth', 'verified')->name('size.change.status');
Route::get('size/delete/{id}', [SizeController::class, 'SizeDelete'])->middleware('auth', 'verified')->name('size.delete');
Route::get('size/restore/{id}', [SizeController::class, 'SizeRestore'])->middleware('auth', 'verified')->name('size.restore');
Route::get('size/force/delete/{id}', [SizeController::class, 'SizeForceDelete'])->middleware('auth', 'verified')->name('size.force.delete');

// Inventory
Route::get('Inventory/{id}', [InventoryController::class, 'Inventory'])->middleware(['auth', 'verified'])->name('inventory');
Route::post('inventory/store/{id}', [InventoryController::class, 'InventoryStore'])->middleware('auth', 'verified')->name('inventory.store');
Route::get('delete/inventory/{id}', [InventoryController::class, 'InventoryDelete'])->middleware('auth', 'verified')->name('delete.inventory');


// SSLCOMMERZ Start
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


// Stripe
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('/stripe/json', 'stripeJson');
    Route::get('/stripe', 'stripe')->name('stripe.pay');
    Route::post('stripe/post', 'stripePost')->name('stripe.post');
});






require __DIR__.'/auth.php';
