<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Mail\verifyEmailCustomer;
use App\Models\Customer;
use App\Models\VerifyCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register_customer(Request $request){
       /* $request->validate([
            'CustomerName' => 'required:tbl_customers',
            'email' =>'required|email|unique:tbl_customers',
            'password' => 'required|min:6|required_with:CustomerConfirmPassword|same:CustomerConfirmPassword:tbl_customers',
            'CustomerConfirmPassword' => 'required:tbl_customers'
        ]);*/
        $customers = new Customer();
        $customers->customer_name = $request->input('CustomerName');
        $customers->email = $request->input('CustomerEmail');
        $customers->password = Hash::make($request->input('CustomerPassword'));
        $customers->customer_phone = $request->input('CustomerPhone');

        $customers->save();
        /* -------------***_--------------*/
        $verified_customer = new VerifyCustomer();
        $verified_customer->token = Str::random(60);
        $verified_customer->customer_id = $customers->id;
        $verified_customer->save();
        Mail::to($customers->email)->send(new verifyEmailCustomer($customers));
        session()->put('email_resend', $customers->email);
        return redirect()->route('resend.customer');

    }
}
