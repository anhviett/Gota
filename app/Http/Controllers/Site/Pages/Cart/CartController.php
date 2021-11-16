<?php

namespace App\Http\Controllers\Site\Pages\Cart;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart(Request $request){
        //Seo
        $meta_desc = "Giỏ hàng";
        $meta_keywords = "Giỏ hàng của bạn";
        $meta_title = "Giỏ hàng";
        $meta_canonical = $request->url();
        //End Seo
        $products = Product::all();
        $post = Post::all();
        $post_categories = PostCategory::orderBy('id', 'DESC')->get();
        $product_categories = ProductCategory::all();

        $customer = \session()->get('id');
        return view('site.pages.cart.index', compact('meta_desc', 'meta_keywords', 'meta_title', 'meta_canonical',
            'products', 'customer', 'post_categories', 'post', 'product_categories'));
    }
    public function updateCart(Request $request){

        Cart::update($request->rowId, $request->qty);

        return back();
    }
    public function add(Request $request, $id){
        $products = Product::find($id);
        Cart::add([
                'id' => $id,
                'name' => $products->name,
                'qty' => 1,
                'price' => $products->discount_price,
                'weight' => 0
            ]
        );
        Cart::setGlobalTax(2);
        return redirect()->back();

    }
    public function deleteCart($id){
        $products = Cart::content();
        foreach ($products as $product){
            if ($product->id == $id){
                $rowId = $product->rowId;
            }
        }
        Cart::remove($rowId);
        return back()->with('success', 'Xóa sản phẩm thành công');

    }

    public function deleteAllCart(){
        $products = Cart::content();
        if($products == true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('Success', 'Xóa giỏ hàng thành công');
        }
    }

    public function unsetCoupon(){
        $coupon = Session::get('Coupon');
        if($coupon == true){
            Session::forget('Coupon');
            return back()->with('success', 'Xóa mã khuyến mãi thành công');
        }
    }

    public function check_coupon(Request $request){
        $data = $request->all();

        $coupon = Coupon::where('coupon_code', $data['Coupon'])->first();

        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('Coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $coupon = [
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        ];

                        Session::put('Coupon', $coupon);


                    }

                }else{
                    $coupon = [
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,

                    ];

                    Session::put('Coupon', $coupon);

                }
                Session::save();
                return redirect()->back()->with('success', 'Thêm mã giảm giá thành công');
            }
        }else{
            return redirect()->back()->with('error', 'Thêm mã giảm giá thất bại');
        }
    }
}
