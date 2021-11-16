<?php

namespace App\Http\Controllers\Site\CheckOut;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\PaymentCategory;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index(Request $request){
        //Seo
        $meta_desc = "Thanh toán";
        $meta_keywords = "Thanh toán giỏ hàng";
        $meta_title = "Thanh toán";
        $meta_canonical = $request->url();
        //End Seo
        $products = Cart::content();
        $product = Product::all();
        $product_categories = ProductCategory::all();
        $post = Post::all();
        $post_categories = PostCategory::orderBy('id', 'DESC')->get();
        $id = \session()->get('customer_id');
        $customer = Customer::find($id);

        return view('site.checkout.index', compact('products','product',
             'customer', 'meta_canonical', 'meta_title', 'meta_desc', 'meta_keywords'
            ,'product_categories', 'post', 'post_categories'));
    }



    public function save_checkout(Request $request){
        $shipping = new Shipping();
        $shipping->shipping_name = $request->input('shipping_name');
        $shipping->shipping_email = $request->input('shipping_email');
        $shipping->shipping_phone = $request->input('shipping_phone');
        $shipping->shipping_notes = $request->input('shipping_notes');
        $shipping->shipping_cname = $request->input('shipping_cname');
        $shipping->shipping_city = $request->input('calc_shipping_provinces');
        $shipping->shipping_district = $request->input('calc_shipping_district');
        $shipping->shipping_wards = $request->input('shipping_country');
        $shipping->save();
        Session::put('id', $shipping->id);
        if ($shipping){
            return Redirect::route('payment')->with('success','Đặt hàng thành công');
        }else{
            return back()->with('error','Thất bại');
        }
    }

    public function payment(Request $request){
        //Seo
        $meta_desc = "Thanh toán";
        $meta_keywords = "Thanh toán giỏ hàng";
        $meta_title = "Thanh toán";
        $meta_canonical = $request->url();
        //End Seo
        $products = Product::all();
        $payment_categories = PaymentCategory::all();
        $post = Post::all();
        $post_categories = PostCategory::orderBy('id', 'DESC')->get();
        $product_categories = ProductCategory::all();
        return view('site.checkout.payment.payment',compact( 'meta_canonical', 'meta_title', 'meta_desc', 'meta_keywords',
            'products', 'post_categories', 'post', 'product_categories',
            'payment_categories'));
    }

    public function store(Request $request){

        //insert payment(tbl_payment)

        $payment = new Payment();
        $payment->payment_method = $request->input('payment_option');
        $payment->payment_status = 'Chờ xử lý';
        $payment_id = $payment->save();

        //insert order
        $orderItem = new Order();
        $orderItem->customer_id = \session()->get('customer_id');
        $orderItem->shipping_id = \session()->get('id');
        $orderItem->payment_id = $payment->id;
        $orderItem->order_total = Cart::total();
        $orderItem->order_status = 'Chờ xử lý';
        $order_id = $orderItem->save();

        //insert order_dertail
        $order_d = new OrderDetail();
        $content = Cart::content();
        foreach ($content as $value){
            $order_d->order_id = $order_id;
            $order_d->product_id = $value->id;
            $order_d->product_name = $value->name;
            $order_d->product_price = $value->price;
            $order_d->product_sales_quantity = $value->qty;
        }
        $order_d->save();

        if ($payment->payment_method == 1){
            echo 'Thanh toán bằng thẻ ATM';
            Cart::destroy();
            return back()->with('success', 'Thành công');
        }elseif ($payment->payment_method == 2){
            $post = Post::all();
            $post_categories = PostCategory::orderBy('id', 'DESC')->get();
            $product_categories = ProductCategory::all();
            $products = Cart::content();
            $product = Product::all();
            Cart::destroy();
            return view('site.checkout.payment.spotcash', compact('product_categories', 'product','products', 'post', 'post_categories'))
                ->with('Mua hàng thành công, chờ xử lí');
        }else{
            echo 'ghi nợ';
        }

    }
    public function order_place(){
        $product_categories = ProductCategory::all();
        return back()->with(['product_categories' => $product_categories,
        ]);
    }







}
