<?php


namespace App\Http\Controllers\Backend\Authentication;
use App\Http\Controllers\Controller;
use App\Models\Social; //sử dụng model Social
use Laravel\Socialite\Facades\Socialite; //sử dụng Socialite
use App\Models\Login; //sử dụng model Login

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        session()->forget('email_resend');
        session()->forget('resent');
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credential = $request->only('email', 'password');

        $remember = $request->has('remember_me') ? true : false;
        if ($remember){
            Cookie::queue('email', $request->email, 1440);
            Cookie::queue('password', $request->password, 1440);
        }
        if (auth()->attempt($credential, $remember)) {

            if (auth()->user()->email_verified_at === null) {
                auth()->logout();
                return redirect()->back()->with('error', 'Vui lòng kích hoạt tài khoản trước khi tiếp tục');
            }
            return redirect()->route('home.page');

        } else {
            return redirect()->back()->with('error', 'Đăng nhập thất bại');
        }
    }

    public function destroy()
    {
        Auth::logout();
        return view('admin.auth.login');
    }

}
