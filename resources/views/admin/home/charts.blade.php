<!-- date-picker -->
<div class="container-fluid" style="padding: 0 15px 15px">
    <form action="" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">

            </div>

            <div class="col-md-4">
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

            </div>
            <div class="col-md-4">
                <p>Lọc theo:
                    <select class="dashboard-filter form-control" name="" id="">
                        <option selected disabled>Chọn: </option>
                        <option value="7days">7 ngày qua</option>
                        <option value="last_month">Tháng trước</option>
                        <option value="this_month">Tháng này</option>
                        <option value="365_days_ago">365 ngày qua</option>
                    </select></p>
            </div>
        </div>
    </form>
</div>
<!-- /.date-picker -->
<!-- Custom tabs (Charts with tabs)-->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Biểu đồ thống kê
        </h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                </li>
            </ul>
        </div>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart"
                 style="position: relative; height: 300px;">
                <div id="myfirstChart" height="300" style="height: 300px;"></div>
            </div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <canvas width="500" id="myChart"></canvas>
            </div>
        </div>
    </div><!-- /.card-body -->

</div>
<!-- /.card -->
@section('footer_script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        chart365daysorder();
        //----------------******-------------------//
        var chart = new Morris.Area({
            element: 'myfirstChart',
            //option chart
            lineColors: ['rgb(37, 119, 181)', 'rgb(167, 179, 188)', 'rgb(124, 180, 124)'],
            parseTime: false,
            hideHover: 'auto',
            xkey: 'period',
            ykeys: ['order','sales','profit','quantity'],
            labels: ['đơn hàng','doanh số','lợi nhuận','số lượng']


        });
        //----------------******-------------------//
        $('.dashboard-filter').change(function(){
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();
            // alert(dashboard_value);
            $.ajax({
                url:"{{url('/admin/dashboard-filter')}}",
                method:"POST",
                dataType:"JSON",
                data:{
                    'dashboard_value':dashboard_value,
                    '_token':_token
                },

                success:function(data)
                {
                    chart.setData(data);
                }
            });

        });
        //----------------******-------------------//
        $('#btn-dashboard-filter').click(function () {
            var _token = $('input[name="_token"]').val();

            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();

            $.ajax({
                url: "{{ url('/admin/filter-by-date') }}",
                method: 'POST',
                dataType: 'JSON',
                data: {
                    'from_date': from_date,
                    'to_date': to_date,
                    '_token': _token
                },

                success:function(data)
                {
                    chart.setData(data);
                }
            })
        });
        //----------------******-------------------//
        function chart365daysorder(){
           var _token = $('input[name="_token"]').val();
           $.ajax({
                url:"{{url('/admin/days-order')}}",
                method:"POST",
                dataType:"JSON",
                data:{
                   _token:_token
                },

                success:function(data)
                {
                    chart.setData(data);
                }
            });
        }
        //----------------Donut Chart-------------------//
        var ctx = document.getElementById("myChart").getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Sản phẩm",	"Bài viết",	"Đơn hàng",	"Video", "Khách hàng"],
                datasets: [{
                    data: [
                    @php
                        echo \App\Models\Product::count();
                    @endphp,
                    @php
                        echo \App\Models\Post::count();
                    @endphp,
                    @php
                        echo \App\Models\Order::count();
                    @endphp,
                    @php
                        echo \App\Models\Customer::count();
                    @endphp
                    ], // Giá trị dữ liệu

                    borderColor: ['#2196f38c', '#f443368c', '#3f51b570', '#00968896'], // Add custom color border
                    backgroundColor: ['#2196f38c', '#f443368c', '#3f51b570', '#00968896'], // Add custom color background (Points and Fill)
                    borderWidth: 1 // Specify bar border width
                }]},
            options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
            }
        });
        /////



    </script>
    @endsection
