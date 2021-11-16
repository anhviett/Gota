<?php


namespace App\Services;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicy(){
        $this->defineGateUser();
        $this->defineGateRole();
        $this->defineGateProduct();
        $this->defineGateProductCategory();
        $this->defineGateProductTag();
        $this->defineGatePost();
        $this->defineGatePostCategory();
        $this->defineGateReview();
        $this->defineGateReviewTag();
        $this->defineGatePermission();
        $this->defineGateOrder();
        $this->defineGateCustomer();
        $this->defineGateSize();
        $this->defineGateColor();
        $this->defineGateShipping();
        $this->defineGatePayment();
        $this->defineGateBanner();
    }
    public function defineGateUser(){
        Gate::define('users_view', 'App\Policies\UserPolicy@view');
        Gate::define('users_create', 'App\Policies\UserPolicy@create');
        Gate::define('users_edit', 'App\Policies\UserPolicy@update');
        Gate::define('users_delete', 'App\Policies\UserPolicy@delete');
    }

    public function defineGateRole(){
        Gate::define('roles_view', 'App\Policies\RolePolicy@view');
        Gate::define('roles_create', 'App\Policies\RolePolicy@create');
        Gate::define('roles_edit', 'App\Policies\RolePolicy@update');
        Gate::define('roles_delete', 'App\Policies\RolePolicy@delete');
    }

    public function defineGateProduct(){
        Gate::define('products_view', 'App\Policies\ProductPolicy@view');
        Gate::define('products_create', 'App\Policies\ProductPolicy@create');
        Gate::define('products_edit', 'App\Policies\ProductPolicy@update');
        Gate::define('products_delete', 'App\Policies\ProductPolicy@delete');
    }

    public function defineGateProductCategory(){
        Gate::define('product_categories_view', 'App\Policies\ProductCategoryPolicy@view');
        Gate::define('product_categories_create', 'App\Policies\ProductCategoryPolicy@create');
        Gate::define('product_categories_edit', 'App\Policies\ProductCategoryPolicy@update');
        Gate::define('product_categories_delete', 'App\Policies\ProductCategoryPolicy@delete');
    }

    public function defineGateProductTag(){
        Gate::define('product_tags_view', 'App\Policies\ProductTagPolicy@view');
        Gate::define('product_tags_create', 'App\Policies\ProductTagPolicy@create');
        Gate::define('product_tags_edit', 'App\Policies\ProductTagPolicy@update');
        Gate::define('product_tags_delete', 'App\Policies\ProductTagPolicy@delete');
    }

    public function defineGatePost(){
        Gate::define('posts_view', 'App\Policies\PostPolicy@view');
        Gate::define('posts_create', 'App\Policies\PostPolicy@create');
        Gate::define('posts_edit', 'App\Policies\PostPolicy@update');
        Gate::define('posts_delete', 'App\Policies\PostPolicy@delete');
    }

    public function defineGatePostCategory(){
        Gate::define('post_categories_view', 'App\Policies\PostCategoryPolicy@view');
        Gate::define('post_categories_create', 'App\Policies\PostCategoryPolicy@create');
        Gate::define('post_categories_edit', 'App\Policies\PostCategoryPolicy@update');
        Gate::define('post_categories_delete', 'App\Policies\PostCategoryPolicy@delete');
    }

    public function defineGateReview(){
        Gate::define('reviews_view', 'App\Policies\ReviewPolicy@view');
        Gate::define('reviews_create', 'App\Policies\ReviewPolicy@create');
        Gate::define('reviews_edit', 'App\Policies\ReviewPolicy@update');
        Gate::define('reviews_delete', 'App\Policies\ReviewPolicy@delete');
    }

    public function defineGateReviewTag(){
        Gate::define('review_tag_view', 'App\Policies\ReviewTagPolicy@view');
        Gate::define('review_tag_create', 'App\Policies\ReviewTagPolicy@create');
        Gate::define('review_tag_edit', 'App\Policies\ReviewTagPolicy@update');
        Gate::define('review_tag_delete', 'App\Policies\ReviewTagPolicy@delete');
    }

    public function defineGatePermission(){
        Gate::define('permissions_view', 'App\Policies\PermissionPolicy@view');
        Gate::define('permissions_create', 'App\Policies\PermissionPolicy@create');
        Gate::define('permissions_edit', 'App\Policies\PermissionPolicy@update');
        Gate::define('permissions_delete', 'App\Policies\PermissionPolicy@delete');
    }

    public function defineGateSize(){
        Gate::define('sizes_view', 'App\Policies\SizePolicy@view');
        Gate::define('sizes_create', 'App\Policies\SizePolicy@create');
        Gate::define('sizes_edit', 'App\Policies\SizePolicy@update');
        Gate::define('sizes_delete', 'App\Policies\SizePolicy@delete');
    }

    public function defineGateColor(){
        Gate::define('colors_view', 'App\Policies\ColorPolicy@view');
        Gate::define('colors_create', 'App\Policies\ColorPolicy@create');
        Gate::define('colors_edit', 'App\Policies\ColorPolicy@update');
        Gate::define('colors_delete', 'App\Policies\ColorPolicy@delete');
    }


    public function defineGateCustomer(){
        Gate::define('customers_view', 'App\Policies\CustomerPolicy@view');
        Gate::define('customers_create', 'App\Policies\CustomerPolicy@create');
        Gate::define('customers_edit', 'App\Policies\CustomerPolicy@update');
        Gate::define('customers_delete', 'App\Policies\CustomerPolicy@delete');
    }

    public function defineGateOrder(){
        Gate::define('orders_view', 'App\Policies\OrderPolicy@view');
        Gate::define('orders_create', 'App\Policies\OrderPolicy@create');
        Gate::define('orders_edit', 'App\Policies\OrderPolicy@update');
        Gate::define('orders_delete', 'App\Policies\OrderPolicy@delete');
    }

    public function defineGateShipping(){
        Gate::define('shipping_view', 'App\Policies\ShippingPolicy@view');
        Gate::define('shipping_create', 'App\Policies\ShippingPolicy@create');
        Gate::define('shipping_edit', 'App\Policies\ShippingPolicy@update');
        Gate::define('shipping_delete', 'App\Policies\ShippingPolicy@delete');
    }

    public function defineGatePayment(){
        Gate::define('payment_view', 'App\Policies\PaymentPolicy@view');
        Gate::define('payment_create', 'App\Policies\PaymentPolicy@create');
        Gate::define('payment_edit', 'App\Policies\PaymentPolicy@update');
        Gate::define('payment_delete', 'App\Policies\PaymentPolicy@delete');
    }

    public function defineGateBanner(){
        Gate::define('banner_view', 'App\Policies\BannerPolicy@view');
        Gate::define('banner_create', 'App\Policies\BannerPolicy@create');
        Gate::define('banner_edit', 'App\Policies\BannerPolicy@update');
        Gate::define('banner_delete', 'App\Policies\BannerPolicy@delete');
    }

    public function defineGateCoupon(){
        Gate::define('coupon_view', 'App\Policies\CouponPolicy@view');
        Gate::define('coupon_create', 'App\Policies\CouponPolicy@create');
        Gate::define('coupon_edit', 'App\Policies\CouponPolicy@update');
        Gate::define('coupon_delete', 'App\Policies\CouponPolicy@delete');
    }
}
