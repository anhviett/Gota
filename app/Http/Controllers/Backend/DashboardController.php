<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Statistic;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        // get ip address
        $uer_ip = $request->ip();
        // đầu tháng trước
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        // cuối tháng trước
        $end_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        // đầu tháng này
        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        // lấy 365 ngày trước
        $one_year = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        // hiện tại
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        // tổng tháng trước
        $visitor_of_lasthmonth = Visitor::whereBetween('date_visitor', [$early_this_month, $end_last_month])->get();
        $visitor_lasthmont_count = $visitor_of_lasthmonth->count();
        // tổng tháng này
        $visitor_of_thismonth = Visitor::whereBetween('date_visitor', [$early_this_month, $now])->get();
        $visitor_thismonth_count = $visitor_of_thismonth->count();
        // tổng 1 năm
        $visitor_of_oneyear = Visitor::whereBetween('date_visitor', [$one_year, $now])->get();
        $visitor_year_count = $visitor_of_oneyear->count();
        // current online
        $visitors = Visitor::where('ip_address', $uer_ip)->get();
        $visitor_count = $visitors->count();
        if($visitor_count < 1){
            $visitor = new Visitor();
            $visitor->ip_address = $uer_ip;
            $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
        //Đếm số lượng
        $product_views = Product::orderBy('product_views', 'DESC')->take(5)->get();
        $post_views = Post::orderBy('post_views', 'DESC')->take(5)->get();
        return view('admin.home.dashboard', compact('users', 'visitors', 'visitor_count', 'visitor_lasthmont_count', 'visitor_thismonth_count',
            'visitor_year_count', 'product_views', 'post_views'));
    }

    public function filter_by_date(Request $request){
        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();


        foreach($get as $key => $val){

            $chart_data[] = array(

                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }

    public function dashboard_filter(Request $request){
        $data = $request->all();

        $this_first_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $before_first_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $last_first_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();



        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7days'){

            $get = Statistic::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_value']=='last_month'){

            $get = Statistic::whereBetween('order_date',[$before_first_month,$last_first_month])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_value']=='this_month'){

            $get = Statistic::whereBetween('order_date',[$this_first_month,$now])->orderBy('order_date','ASC')->get();

        }else{
            $get = Statistic::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }


        foreach($get as $key => $val){

            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }
    // Số lượng đơn hàng trong 365 ngày
    public function days_order(){
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();

        foreach ($get as $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
}
