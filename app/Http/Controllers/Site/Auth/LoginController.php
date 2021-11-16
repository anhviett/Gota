<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){

        return view('site.auth.login', compact('categoriesLimit', 'menu_items', 'post', 'post_categories'));
    }


    public function login_customer(Request $request){

        //validate
      /*  $request->validate([
            'AccountEmail' =>'required',
            'AccountPassword' => 'required|min:6|max:15'
        ],
            [
                'AccountEmail.required' => 'Không được để trống',
                'AccountEmail.email' => 'Email không đúng định dạng',
                'AccountPassword' => 'Không được để trống'
            ]);*/
        //lay gia tri

//        $credential = $request->only('email', 'password');
        $customer = Customer::where('email', '=', $request->email)->first();

        if (!$customer){
            return redirect()->route('login_register')->with('error', 'Đăng nhập thất bại !');
        }else{
            // check password
            if (Hash::check($request->password, $customer->password)){
                if ($customer->email_verified_at === null){
                    return redirect()->back()->with('error','Vui lòng kích hoạt tài khoản trước khi tiếp tục');
                }
                $customer_id = $customer->id;
                \session()->put('customer_id', $customer_id);
                return redirect()->back();
            }
        }
        /*if (auth('customer')->attempt($credential, false)) {
            if (auth('customer')->user()->email_verified_at === null) {
                return redirect()->back()->with('error','Vui lòng kích hoạt tài khoản trước khi tiếp tục');
            }

            $customer_id = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : null;
            Session::put('customer_id', $customer_id);

            return redirect()->back();
        }else{
            return redirect()->route('login_register')->with('error', 'Đăng nhập thất bại !');
        }*/
    }

}
