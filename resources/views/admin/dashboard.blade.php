@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <section class="mb-4 mt-2">
        <div class="row">
            <div class="col-lg-3 mb-2">
                <div class="card border">
                    <div class="row p-3">
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-md-column flex-sm-row justify-content-between">
                            <div class="bg-success rounded-2 d-flex justify-content-center align-items-center text-white"
                                style="width: 45px; height: 45px; margin-top: -30px;">
                                <i class="fa-solid fa-box-open fa-bounce"></i>
                            </div>
                            <div class="text-success">
                                +30%
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-end">
                            <div class="card-title fw-semibold fs-5">
                                Sản phẩm
                            </div>
                            <div class="card-text">
                                Số lượng: <span class="badge rounded-pill text-bg-success">21</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-2">
                <div class="card border">
                    <div class="row p-3">
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-md-column flex-sm-row justify-content-between">
                            <div class="bg-secondary rounded-2 d-flex justify-content-center align-items-center text-white"
                                style="width: 45px; height: 45px; margin-top: -30px;">
                                <i class="fa-solid fa-users fa-bounce"></i>
                            </div>
                            <div class="text-secondary">
                                +30%
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-end">
                            <div class="card-title fw-semibold fs-5">
                                Tài khoản
                            </div>
                            <div class="card-text">
                                Số lượng: <span class="badge rounded-pill text-bg-secondary">31</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-2">
                <div class="card border">
                    <div class="row p-3">
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-md-column flex-sm-row justify-content-between">
                            <div class="bg-warning rounded-2 d-flex justify-content-center align-items-center text-white"
                                style="width: 45px; height: 45px; margin-top: -30px;">
                                <i class="fa-solid fa-comments fa-bounce"></i>
                            </div>
                            <div class="text-warning">
                                +30%
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-end">
                            <div class="card-title fw-semibold fs-5">
                                Bình luận
                            </div>
                            <div class="card-text">
                                Số lượng: <span class="badge rounded-pill text-bg-warning">41</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-2">
                <div class="card border">
                    <div class="row p-3">
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-md-column flex-sm-row justify-content-between">
                            <div class="bg-danger rounded-2 d-flex justify-content-center align-items-center text-white"
                                style="width: 45px; height: 45px; margin-top: -30px;">
                                <i class="fa-solid fa-cart-shopping fa-bounce"></i>
                            </div>
                            <div class="text-danger">
                                +30%
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 text-end">
                            <div class="card-title fw-semibold fs-5">
                                Đơn hàng
                            </div>
                            <div class="card-text">
                                Số lượng: <span class="badge rounded-pill text-bg-danger">51</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="bg-white p-2 rounded-3 border">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-white p-2 rounded-3 border">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </section>
    <section class="boder rounded-3">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </section>
</div>


@endsection
@section('css')
    <style>

    </style>
@endsection
@section('script')
    <script>
    const ctx = document.getElementById('myChart');
      
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    // ====================================================================
    // Dữ liệu mẫu cho biểu đồ
    const salesData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Sales',
            data: [1000, 1500, 1200, 1800, 2000, 1700],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Lấy thẻ canvas và vẽ biểu đồ doanh số
    const salesChartCanvas = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesChartCanvas, {
        type: 'line',
        data: salesData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
@endsection