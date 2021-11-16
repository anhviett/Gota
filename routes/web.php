<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function (){
    //Dashboard
    Route::post('/filter-by-date','App\Http\Controllers\Backend\DashboardController@filter_by_date')->name('filter_by_date');
    Route::post('/dashboard-filter','App\Http\Controllers\Backend\DashboardController@dashboard_filter')->name('dashboard.filter');
    Route::post('/days-order','App\Http\Controllers\Backend\DashboardController@days_order')->name('days.order');

    //Login
    Route::get('/login','App\Http\Controllers\Backend\Authentication\LoginController@index')
        ->name('login');
    Route::post('/check-login','App\Http\Controllers\Backend\Authentication\LoginController@store')
        ->name('loginCheck');


    //Register
    Route::get('/register','App\Http\Controllers\Backend\Authentication\RegisterController@create')
        ->name('register');
    Route::post('/check-register','App\Http\Controllers\Backend\Authentication\RegisterController@store')
        ->name('register.check');

    //Logout
    Route::post('/login', 'App\Http\Controllers\Backend\Authentication\LoginController@destroy')
        ->name('exit');

    //Forgot Password
    Route::get('/forgot-password', 'App\Http\Controllers\Backend\Authentication\Password\ForgotPasswordController@create')
        ->name('forgot.create');
    Route::post('/forgot-password', 'App\Http\Controllers\Backend\Authentication\Password\ForgotPasswordController@store')
        ->name('forgot.store');

    //Reset Password
    Route::get('/reset-password/{email}/{token}', 'App\Http\Controllers\Backend\Authentication\Password\ResetPasswordController@index')
        ->name('reset.index');
    Route::post('/reset-password/{email}/{token}', 'App\Http\Controllers\Backend\Authentication\Password\ResetPasswordController@reset')
        ->name('reset.update');

    //Resend
    Route::get('resend', 'App\Http\Controllers\Backend\Email\VerificationController@create')->name('resend');
    Route::post('resend', 'App\Http\Controllers\Backend\Email\VerificationController@resend');
    Route::get('/verifyEmailUser/{token}', 'App\Http\Controllers\Backend\Authentication\VerificationController@verifyEmailUser')
        ->name('verify');


});



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/home', 'App\Http\Controllers\Backend\DashboardController@index')->name('home.page');
    /*--/Users--*/
    Route::prefix('')->group(function (){
        Route::get('/users',[
            'as' =>'user.index',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@index',
            'middleware' => 'can:users_view'
        ]);
        Route::get('/user-create',[
            'as' =>'user.create',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@create',
            'middleware' => 'can:users_create'
        ]);
        Route::post('/user-store',[
            'as' =>'user.store',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@store'
        ]);
        Route::get('/user-edit/{user}',[
            'as' =>'user.edit',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@edit',
           'middleware' => 'can:users_edit'
        ]);
        Route::post('/user-update/{user}',[
            'as' =>'user.update',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@update'
        ]);
        Route::get('/user-delete/{user}',[
            'as' =>'user.delete',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@delete',
            'middleware' => 'can:users_delete'
        ]);
        Route::get('userChangeStatus','App\Http\Controllers\Backend\Users\UserController@userChangeStatus')
            ->name('userChangeStatus');
    });
    /*----------*/
    /*--User Profile--*/
    Route::prefix('')->group(function (){
        Route::get('/userProfile/{userProfile}',[
            'as' =>'userProfile.info',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@info',

        ]);

        Route::post('/userProfile-update/{User}',[
            'as' =>'userProfile.update',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@update'
        ]);
        Route::get('/userProfile-delete/{User}',[
            'as' =>'userProfile.delete',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@delete',

        ]);

    });
    /*----------*/

    /*--Colors--*/
    Route::prefix('')->group(function (){
        Route::get('/colors',[
            'as' =>'color.index',
            'uses' => 'App\Http\Controllers\Backend\Products\ColorController@index',
            'middleware' => 'can:colors_view'
        ]);
        Route::get('/color-create',[
            'as' =>'color.create',
            'uses' => 'App\Http\Controllers\Backend\Products\ColorController@create',
            'middleware' => 'can:colors_create'
        ]);
        Route::post('/color-store',[
            'as' =>'color.store',
            'uses' => 'App\Http\Controllers\Backend\Products\ColorController@store'
        ]);
        Route::get('/color-edit/{color}',[
            'as' =>'color.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\ColorController@edit',
            'middleware' => 'can:colors_edit'
        ]);
        Route::post('/color-update/{color}',[
            'as' =>'color.update',
            'uses' => 'App\Http\Controllers\Backend\Products\ColorController@update'
        ]);
        Route::get('/color-delete/{color}',[
            'as' =>'color.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\ColorController@delete',
           'middleware' => 'can:colors_delete'
        ]);

    });

    /*--Colors--*/
    Route::prefix('')->group(function (){
        Route::get('/sizes',[
            'as' =>'size.index',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@index',
            'middleware' => 'can:sizes_view'
        ]);
        Route::get('/size-create',[
            'as' =>'size.create',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@create',
        'middleware' => 'can:sizes_create'
        ]);
        Route::post('/size-store',[
            'as' =>'size.store',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@store'
        ]);
        Route::get('/size-edit/{size}',[
            'as' =>'size.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@edit',
       'middleware' => 'can:sizes_edit'
        ]);
        Route::post('/size-update/{size}',[
            'as' =>'size.update',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@update'
        ]);
        Route::get('/size-delete/{size}',[
            'as' =>'size.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@delete',
       'middleware' => 'can:sizes_delete'
        ]);

    });

    /*--ProductTags--*/
    Route::prefix('')->group(function (){
        Route::get('/product_tags',[
            'as' =>'product_tag.index',
            'uses' => 'App\Http\Controllers\Backend\Products\TagController@index',
       'middleware' => 'can:product_tags_view'
        ]);
        Route::get('/product_tag-create',[
            'as' =>'product_tag.create',
            'uses' => 'App\Http\Controllers\Backend\Products\TagController@create',
         'middleware' => 'can:product_tags_create'
        ]);
        Route::post('/product_tag-store',[
            'as' =>'product_tag.store',
            'uses' => 'App\Http\Controllers\Backend\Products\TagController@store'
        ]);
        Route::get('/product_tag-edit/{tag}',[
            'as' =>'product_tag.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\TagController@edit',
        'middleware' => 'can:product_tags_editt'
        ]);
        Route::post('/product_tag-update/{tag}',[
            'as' =>'product_tag.update',
            'uses' => 'App\Http\Controllers\Backend\Products\TagController@update'
        ]);
        Route::get('/product_tag-delete/{tag}',[
            'as' =>'product_tag.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\TagController@delete',
            'middleware' => 'can:product_tags_delete'
        ]);

    });
    /*Products*/
    Route::prefix('')->group(function (){
        Route::get('/products',[
            'as' =>'product.index',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@index',
            'middleware' => 'can:products_view'
        ]);
        Route::get('/product-create',[
            'as' =>'product.create',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@create',
           'middleware' => 'can:products_create'
        ]);
        Route::post('/product-store',[
            'as' =>'product.store',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@store'
        ]);
        Route::get('/product-edit/{products}',[
            'as' =>'product.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@edit',
            'middleware' => 'can:products_edit'
        ]);
        Route::post('/product-update/{products}',[
            'as' =>'product.update',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@update'
        ]);
        Route::get('/product-delete/{products}',[
            'as' =>'product.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@delete',
           'middleware' => 'can:products_delete'
        ]);
        Route::get('productChangeStatus','App\Http\Controllers\Backend\Products\ProductController@productChangeStatus')
            ->name('productChangeStatus');

    });
    /*-------*/
    /*ProductCategory*/
    Route::prefix('')->group(function (){
        Route::get('/product_categories',[
            'as' =>'product_categories.index',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@index',
          'middleware' => 'can:product_categories_view'
        ]);
        Route::get('/product_category-create',[
            'as' =>'product_categories.create',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@create',
         'middleware' => 'can:product_categories_create'
        ]);
        Route::post('/product_category-store',[
            'as' =>'product_categories.store',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@store'
        ]);
        Route::get('/product_category-edit/{product_categories}',[
            'as' =>'product_categories.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@edit',
          'middleware' => 'can:product_categories_edit'
        ]);
        Route::post('/product_category-update/{product_categories}',[
            'as' =>'product_categories.update',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@update'
        ]);
        Route::get('/product_category-delete/{product_categories}',[
            'as' =>'product_categories.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@delete',
         'middleware' => 'can:product_categories_delete'
        ]);
    });
    /*-------*/

    /*--/posts--*/
    Route::prefix('')->group(function (){
        Route::get('/posts',[
            'as' =>'post.index',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@index',
            'middleware' => 'can:posts_view'
        ]);
        Route::get('/post-create',[
            'as' =>'post.create',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@create',
            'middleware' => 'can:posts_create'
        ]);
        Route::post('/post-store',[
            'as' =>'post.store',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@store'
        ]);
        Route::get('/post-edit/{post}',[
            'as' =>'post.edit',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@edit',
            'middleware' => 'can:posts_edit'
        ]);
        Route::post('/post-update/{post}',[
            'as' =>'post.update',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@update'
        ]);
        Route::get('/post-delete/{post}',[
            'as' =>'post.delete',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@delete',
            'middleware' => 'can:posts_delete'
        ]);
        Route::get('postChangeStatus','App\Http\Controllers\Backend\Blog\PostController@postChangeStatus')
            ->name('postChangeStatus');
    });
    /*----------*/

    /*--/post category--*/
    Route::prefix('')->group(function (){
        Route::get('/post_categories',[
            'as' =>'post_category.index',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@index',
           'middleware' => 'can:post_categories_view'
        ]);
        Route::get('/post_category-create',[
            'as' =>'post_category.create',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@create',
            'middleware' => 'can:post_categories_create'
        ]);
        Route::post('/post_category-store',[
            'as' =>'post_category.store',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@store'
        ]);
        Route::get('/post_category-edit/{post_category}',[
            'as' =>'post_category.edit',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@edit',
            'middleware' => 'can:post_categories_edit'
        ]);
        Route::post('/post_category-update/{post_category}',[
            'as' =>'post_category.update',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@update'
        ]);
        Route::get('/post_category-delete/{post_category}',[
            'as' =>'post_category.delete',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@delete',
            'middleware' => 'can:post_categories_delete'
        ]);

    });
    /*----------*/

    /*Payments*/
    Route::prefix('')->group(function (){
        Route::get('/payments',[
            'as' =>'payment.index',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@index',
            'middleware' => 'can:payment_view'
        ]);
        Route::get('/payment-create',[
            'as' =>'payment.create',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@create',
            'middleware' => 'can:payment_create'
        ]);
        Route::post('/payment-store',[
            'as' =>'payment.store',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@store'
        ]);
        Route::get('/payment-edit/{payment}',[
            'as' =>'payment.edit',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@edit',
             'middleware' => 'can:payment_edit'
        ]);
        Route::post('/payment-update/{payment}',[
            'as' =>'payment.update',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@update'
        ]);
        Route::get('/payment-delete/{payment}',[
            'as' =>'payment.delete',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@delete',
             'middleware' => 'can:payment_delete'
        ]);
        Route::get('paymentChangeStatus','App\Http\Controllers\Backend\Payments\PaymentController@paymentChangeStatus')
            ->name('paymentChangeStatus');

    });
    /*-------*/

    /*Payment Categories*/
    Route::prefix('')->group(function (){
        Route::get('/payment_categories',[
            'as' =>'payment_category.index',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@index',
            /*'middleware' => 'can:payment_view'*/
        ]);
        Route::get('/payment_category-create',[
            'as' =>'payment_category.create',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@create',
            /*'middleware' => 'can:payment_create'*/
        ]);
        Route::post('/payment_category-store',[
            'as' =>'payment_category.store',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@store'
        ]);
        Route::get('/payment_category-edit/{payment_category}',[
            'as' =>'payment_category.edit',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@edit',
            /* 'middleware' => 'can:payment_edit'*/
        ]);
        Route::post('/payment_category-update/{payment}',[
            'as' =>'payment_category.update',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@update'
        ]);
        Route::get('/payment_category-delete/{payment_category}',[
            'as' =>'payment_category.delete',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@delete',
            /* 'middleware' => 'can:payment_delete'*/
        ]);
        Route::get('payment_categoryChangeStatus','App\Http\Controllers\Backend\Payments\PaymentCategoryController@payment_categoryChangeStatus')
            ->name('payment_categoryChangeStatus');

    });
    /*-------*/



    /*Banner*/
    Route::prefix('')->group(function (){
        Route::get('/banars',[
            'as' =>'banar.index',
            'uses' => 'App\Http\Controllers\Backend\Banner\BanarController@index',
            'middleware' => 'can:banner_view'
        ]);
        Route::get('/banar-create',[
            'as' =>'banar.create',
            'uses' => 'App\Http\Controllers\Backend\Banner\BanarController@create',
            'middleware' => 'can:banner_create'
        ]);
        Route::post('/banar-store',[
            'as' =>'banar.store',
            'uses' => 'App\Http\Controllers\Backend\Banner\BanarController@store'
        ]);
        Route::get('/banar-edit/{banar}',[
            'as' =>'banar.edit',
            'uses' => 'App\Http\Controllers\Backend\Banner\BanarController@edit',
             'middleware' => 'can:banner_edit'
        ]);
        Route::post('/banar-update/{banar}',[
            'as' =>'banar.update',
            'uses' => 'App\Http\Controllers\Backend\Banner\BanarController@update'
        ]);
        Route::get('/banar-delete/{banar}',[
            'as' =>'banar.delete',
            'uses' => 'App\Http\Controllers\Backend\Banner\BanarController@delete',
             'middleware' => 'can:banner_delete'
        ]);

    });
    /*-------*/

    /*Slider*/
    Route::prefix('')->group(function (){
        Route::get('/sliders',[
            'as' =>'slider.index',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@index',
            'middleware' => 'can:sliders_view'
        ]);
        Route::get('/slider-create',[
            'as' =>'slider.create',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@create',
            'middleware' => 'can:sliders_create'
        ]);
        Route::post('/slider-store',[
            'as' =>'slider.store',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@store'
        ]);
        Route::get('/slider-edit/{slider}',[
            'as' =>'slider.edit',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@edit',
             'middleware' => 'can:sliders_edit'
        ]);
        Route::post('/slider-update/{slider}',[
            'as' =>'slider.update',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@update'
        ]);
        Route::get('/slider-delete/{slider}',[
            'as' =>'slider.delete',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@delete',
            'middleware' => 'can:sliders_delete'
        ]);


    });
    /*-------*/

    /*Customers*/
    Route::prefix('admin')->group(function (){
        Route::get('/customers',[
            'as' =>'customer.index',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@index',
            'middleware' => 'can:customers_view'
        ]);
        Route::get('/customer-create',[
            'as' =>'customer.create',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@create',
            'middleware' => 'can:customers_create'
        ]);
        Route::post('/customer-store',[
            'as' =>'customer.store',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@store'
        ]);
        Route::get('/customer-edit/{customer}',[
            'as' =>'customer.edit',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@edit',
             'middleware' => 'can:customers_edit'
        ]);
        Route::post('/customer-update/{customer}',[
            'as' =>'customer.update',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@update'
        ]);
        Route::get('/customer-delete/{customer}',[
            'as' =>'customer.delete',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@delete',
             'middleware' => 'can:customers_delete'
        ]);
        Route::get('customerChangeStatus','App\Http\Controllers\Backend\Orders\CustomerController@customerChangeStatus')
            ->name('customerChangeStatus');

    });
    /*-------*/

    /*Reviews*/
    Route::prefix('')->group(function (){
        Route::get('/reviews',[
            'as' =>'review.index',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@index',
            'middleware' => 'can:review_view'
        ]);
        Route::get('/review-create',[
            'as' =>'review.create',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@create',
            'middleware' => 'can:review_create'
        ]);
        Route::post('/review-store',[
            'as' =>'review.store',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@store'
        ]);
        Route::get('/review-edit/{review}',[
            'as' =>'review.edit',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@edit',
            'middleware' => 'can:review_edit'
        ]);
        Route::post('/review-update/{review}',[
            'as' =>'review.update',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@update'
        ]);
        Route::get('/review-delete/{review}',[
            'as' =>'review.delete',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@delete',
            'middleware' => 'can:review_delete'
        ]);
        Route::get('reviewChangeStatus','App\Http\Controllers\Backend\Reviews\ReviewController@reviewChangeStatus')
            ->name('reviewChangeStatus');

    });
    /*-------*/

    /*--/Coupon--*/
    Route::prefix('')->group(function (){
        Route::get('/coupons',[
            'as' =>'coupon.index',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@index',
            'middleware' => 'can:coupon_view'
        ]);
        Route::get('/coupon-create',[
            'as' =>'coupon.create',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@create',
            'middleware' => 'can:coupon_create'
        ]);
        Route::post('/coupon-store',[
            'as' =>'coupon.store',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@store'
        ]);
        Route::get('/coupon-edit/{coupon}',[
            'as' =>'coupon.edit',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@edit',
           'middleware' => 'can:coupon_edit'
        ]);
        Route::post('/coupon-update/{coupon}',[
            'as' =>'coupon.update',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@update'
        ]);
        Route::get('/coupon-delete/{coupon}',[
            'as' =>'coupon.delete',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@delete',
            'middleware' => 'can:coupon_delete'
        ]);
        Route::get('couponChangeStatus','App\Http\Controllers\Backend\Coupons\CouponController@couponChangeStatus')
            ->name('couponChangeStatus');
    });
    /*----------*/

    /*Order Detail*/
    Route::prefix('')->group(function (){
        Route::get('/order_detail',[
            'as' =>'order_detail.index',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/order_detail-create',[
            'as' =>'order_detail.create',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/order_detail-store',[
            'as' =>'order_detail.store',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@store'
        ]);
        Route::get('/order_detail-edit/{order_detail}',[
            'as' =>'order_detail.edit',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/order_detail-update/{order_detail}',[
            'as' =>'order_detail.update',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@update'
        ]);
        Route::get('/order_detail-delete/{order_detail}',[
            'as' =>'order_detail.delete',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('order_detailChangeStatus','App\Http\Controllers\Backend\Orders\OrderDetailController@order_detailChangeStatus')
            ->name('order_detailChangeStatus');

    });
    /*-------*/

    /*Delivery*/
    Route::prefix('')->group(function (){
        Route::get('/deliveries',[
            'as' =>'delivery.index',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@index',
            'middleware' => 'can:deliveries_view'
        ]);
        Route::get('/delivery-create',[
            'as' =>'delivery.create',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@create',
            'middleware' => 'can:deliveries_create'
        ]);
        Route::post('/delivery-store',[
            'as' =>'delivery.store',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@store'
        ]);
        Route::post('/delivery-store',[
            'as' =>'delivery.store',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@store'
        ]);

        Route::get('/delivery-edit/{delivery}',[
            'as' =>'delivery.edit',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@edit',
             'middleware' => 'can:deliveries_edit'
        ]);
        Route::post('/delivery-update/{delivery}',[
            'as' =>'delivery.update',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@update'
        ]);
        Route::get('/delivery-delete/{delivery}',[
            'as' =>'delivery.delete',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@delete',
             'middleware' => 'can:deliveries_delete'
        ]);
        Route::get('deliveryChangeStatus','App\Http\Controllers\Backend\Deliveries\DeliveryController@deliveryChangeStatus')
            ->name('deliveryChangeStatus');

    });
    /*-------*/

    /*Feeship*/
    Route::post('/select-feeship',[
        'as' =>'select.feeship',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@select_feeship'
    ]);
    Route::post('/update-feeship',[
        'as' =>'update.feeship',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@update_feeship'
    ]);
    Route::post('/delivery-insert',[
        'as' =>'delivery.insert',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@insert'
    ]);
    Route::post('/delivery-index',[
        'as' =>'delivery.insert',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@insert'
    ]);
    /*-------*/

    /*Roles*/
    Route::prefix('')->group(function (){
        Route::get('/roles',[
            'as' =>'role.index',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@index',
            'middleware' => 'can:roles_view'
        ]);
        Route::get('/role-create',[
            'as' =>'role.create',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@create',
            'middleware' => 'can:roles_create'
        ]);
        Route::post('/role-store',[
            'as' =>'role.store',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@store'
        ]);
        Route::get('/role-edit/{Role}',[
            'as' =>'role.edit',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@edit',
            'middleware' => 'can:roles_edit'
        ]);
        Route::post('/role-update/{Role}',[
            'as' =>'role.update',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@update'
        ]);
        Route::get('/role-delete/{Role}',[
            'as' =>'role.delete',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@delete',
            'middleware' => 'can:roles_delete'
        ]);
        Route::get('roleChangeStatus','App\Http\Controllers\Backend\PermissionRole\RoleController@roleChangeStatus')
            ->name('roleChangeStatus');
    });
    /*-------*/
    /*Permissions*/
    Route::prefix('')->group(function (){
        Route::get('/permissions',[
            'as' =>'permission.index',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@index',
            /*'middleware' => 'can:permissions_index'*/
        ]);
        Route::get('/permission-create',[
            'as' =>'permission.create',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@create',
            /*'middleware' => 'can:permissions_create'*/
        ]);
        Route::post('/permission-store',[
            'as' =>'permission.store',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@store'
        ]);

        Route::get('/permission-delete/{Permission}',[
            'as' =>'permission.delete',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@delete',
            /*'middleware' => 'can:permissions_delete'*/
        ]);
    });
    /*-------*/

    //Login facebook
    Route::get('/login-facebook','App\Http\Controllers\Backend\Authentication\LoginController@login_facebook')->name('login.facebook');
    Route::get('/admin/callback','App\Http\Controllers\Backend\Authentication\LoginController@callback_facebook');


});







/*-----Frontend-----*/
Route::prefix('site')->group(function (){
    Route::get('/home','App\Http\Controllers\Site\HomeController@index')
        ->name('home.index');

    //---------------------Start Shop---------------------------
    Route::get('/shop','App\Http\Controllers\Site\Shop\ShopController@index')
        ->name('shop.index');
    Route::get('/shop/{slug}','App\Http\Controllers\Site\Shop\ShopController@show')
        ->name('shop.show');
    Route::get('/shop_category/{slug}','App\Http\Controllers\Site\Shop\ShopController@show_category')
        ->name('shop.show_category');
    Route::get('/shop_tag/{slug}','App\Http\Controllers\Site\Shop\ShopController@show_tag')
        ->name('shop.show_tag');
    Route::get('/shop_category/{slug}/{id}','App\Http\Controllers\Site\Shop\ShopController@show_category_detail')
        ->name('shop.show_category_detail');

    //---------------------End Shop---------------------------

    //---------------------Start About---------------------------
    Route::get('/about','App\Http\Controllers\Site\Pages\About\AboutController@index')
        ->name('about.index');
    //---------------------End About---------------------------

    //---------------------Start Questions---------------------------
    Route::get('/questions','App\Http\Controllers\Site\Pages\Question\QuestionController@index')
        ->name('question.index');
    //---------------------End Questions---------------------------

    //---------------------Start Service---------------------------
    Route::get('/services','App\Http\Controllers\Site\Services\ServiceController@index')
        ->name('service.index');
    //---------------------End Service---------------------------


    //---------------------Start Blog---------------------------
    Route::get('/danh-sach-bai-viet/{slug}','App\Http\Controllers\Site\Pages\Blog\BlogController@index')
        ->name('blog_list.index');

    Route::get('/bai-viet/{slug}','App\Http\Controllers\Site\Pages\Blog\BlogController@show')
        ->name('blog_details.index');

    //---------------------End Blog---------------------------

    //-------------------Contact--------------------
    Route::get('/lien-he', 'App\Http\Controllers\Site\Contact\ContactController@index')
        ->name('contact.index');
    //-------------------End Contact----------------

    //---------------------Start Search---------------------------
    Route::post('/tim-kiem-san-pham','App\Http\Controllers\Site\SearchController@search')
        ->name('search.index');
    Route::post('/tim-kiem-bai-viet','App\Http\Controllers\Site\SearchController@post_search')
        ->name('search_post.index');
    Route::post('/autocomplete','App\Http\Controllers\Site\SearchController@autocomplete')
        ->name('autocomplete');
    //---------------------Start Search---------------------------

    //---------------------Start Checkout---------------------------
    Route::get('/checkout','App\Http\Controllers\Site\CheckOut\CheckOutController@index')
        ->name('checkout.index');

    Route::post('/save_checkout','App\Http\Controllers\Site\CheckOut\CheckOutController@save_checkout')
        ->name('save_checkout');

    Route::post('/login-customer','App\Http\Controllers\Site\CheckOut\CheckOutController@login_customer')
        ->name('login_customer');

    Route::post('/add-customer','App\Http\Controllers\Site\CheckOut\CheckOutController@store')
        ->name('add_customer.store');

    //-------------------End Checkout---------------------------------

    //-------------------Start Payment---------------------------------
    Route::get('/payment','App\Http\Controllers\Site\CheckOut\CheckOutController@payment')
        ->name('payment');
    Route::post('/order-place/store','App\Http\Controllers\Site\CheckOut\CheckOutController@store')
        ->name('order_place.store');
    Route::post('/order-place','App\Http\Controllers\Site\CheckOut\CheckOutController@order_place')
        ->name('order_place');
    //-------------------End Payment---------------------------------

    //-------------------Start Cart---------------------------------

    Route::get('/cart','App\Http\Controllers\Site\Pages\Cart\CartController@cart')
        ->name('cart.index');
    Route::get('/update-to-cart','App\Http\Controllers\Site\Pages\Cart\CartController@updateCart')
        ->name('cart.update');
    Route::get('/add-to-cart/{id}','App\Http\Controllers\Site\Pages\Cart\CartController@add')
        ->name('cart.add');

    Route::get('/delete-to-cart/{id}','App\Http\Controllers\Site\Pages\Cart\CartController@deleteCart')
        ->name('cart.delete');
    Route::get('/delete-all-cart','App\Http\Controllers\Site\Pages\Cart\CartController@deleteAllCart')
        ->name('cart.deleteAll');
    Route::get('/unset-coupon','App\Http\Controllers\Site\Pages\Cart\CartController@unsetCoupon')
        ->name('unset.coupon');
    //-------------------End Cart---------------------------------

    //-------------------Start Coupon---------------------------------
    Route::post('/check-coupon','App\Http\Controllers\Site\Pages\Cart\CartController@check_coupon')
        ->name('check.coupon');
    //-------------------End Coupon---------------------------------

    //---------------Start Product Detail---------------------------------
    Route::get('/product-details','App\Http\Controllers\Site\Pages\ProductDetails\ProductDetailController@index')
        ->name('product_detail.index');
    Route::get('/product-details/{id}','App\Http\Controllers\Site\Pages\ProductDetails\ProductDetailController@show')
        ->name('product_detail.show');
    //-------------------End Product Detail---------------------------------

    //----------------Authentication Customer---------------------------------
    Route::get('/login-register','App\Http\Controllers\Site\Auth\AuthenticationController@login_register')
        ->name('login_register');

    Route::post('/check-login', 'App\Http\Controllers\Site\Auth\LoginController@login_customer')
        ->name('login_customer');

    Route::post('/check-register','App\Http\Controllers\Site\Auth\RegisterController@register_customer')
        ->name('register_customer');

    Route::get('/logout','App\Http\Controllers\Site\Auth\AuthenticationController@logout')
        ->name('logout');

    //Resend
    Route::get('resend-customer', 'App\Http\Controllers\Site\Auth\AuthenticationController@create')->name('resend.customer');
    Route::post('resend-customer', 'App\Http\Controllers\Site\Auth\AuthenticationController@resend');
    Route::get('/verifyEmailCustomer/{token}', 'App\Http\Controllers\Site\Auth\AuthenticationController@verifyEmailCustomer')->name('verify.customer');

    //----------------End Authentication Customer---------------------------------
    //-------------------Reviews--------------------
    Route::get('customer/review/{order_item_id}', 'App\Http\Controllers\Site\CustomerReviewController@index')
        ->name('customer.review');
    Route::post('customer/review/addReview/{id}', 'App\Http\Livewire\Customer\CustomerReviewComponent@addReview')
        ->name('addReview');

    //-------------------End Reviews---------------
    //-------------------Errors--------------------
    Route::get('/error/404', 'App\Http\Controllers\ErrorController@index')
        ->name('404.index');
    //-------------------End Errors----------------


});
