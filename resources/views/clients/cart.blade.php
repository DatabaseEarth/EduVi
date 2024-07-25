@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container-xxl">
    @if (!empty($cart_list))
    <div class="row my-4">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="p-3 rounded-2 bg-white shadow-sm">
                <div class="d-flex justify-content-between align-items-center pb-1 border-bottom mb-0">
                    <h4 class="fw-bold">Giỏ hàng của tôi</h4>
                    <form action="{{route('delete_bill')}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="Id_Bill" value="{{$Id_Bill}}">
                        <button class="btn btn-sm text-white" style="background-color: #F48C06;">Xóa tất cả</button>
                    </form>
                </div>
                @php
                    $Total_Payment = 0;
                @endphp
                @foreach ($cart_list as $item)
                    <div class="row align-items-center border-top pt-3">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 d-flex gap-3 pb-2">
                        <img src="{{asset('uploads/products/'.$item->Image_Product)}}" alt="" style="width: 70px; height: 70px;">
                        <div>
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="card-title mb-0 fw-bold fs-6 mb-3">{{$item->Name_Product}}</div>
                                    <a href="{{route('product_detail',['id'=>$item->Id_Product])}}" class="btn btn-sm"
                                        style="border: 1px solid #F48C06; color: #F48C06;">
                                        Xem sản phẩm
                                    </a>
                                    <form action="{{route('delete_product')}}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="Id_Bill" value="{{$Id_Bill}}">
                                        <input type="hidden" name="Id_Cart" value="{{$item->Id_Cart}}">
                                        <input type="hidden" name="Id_Product" value="{{$item->Id_Product}}">
                                        <button type="submit" class="btn btn-sm text-white"
                                        style="background-color: #F48C06;">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div
                            class="d-flex flex-lg-column flex-md-column flex-sm-column align-items-lg-end align-items-md-end align-items-sm-end justify-content-between pb-2">
                            {{-- <div class="d-flex mb-4">
                                <div  class="prev-quantity border-0 fs-6 fw-semibold d-flex justify-content-center align-items-center"
                                    style="height: 35px; width: 35px; background: #e5e5e5; cursor: pointer;">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <form class="quantity-form" action="" method="POST">
                                    @csrf 
                                    <input type="hidden" name="Id_Product" value="{{$item->Id_Product}}">
                                    <input  type="text" class="quantity-input text-center" name="SoLuong" min="1" value="{{$item->Quantity}}" max="{{$item->product_quantity}}"
                                        style="border: 0.5px solid #e5e5e5;height: 35px; width: 40px;">
                                </form>
                                <div  class="next-quantity border-0 fs-6 fw-semibold d-flex justify-content-center align-items-center"
                                    style="height: 35px; width: 35px; background: #e5e5e5; cursor: pointer;">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div> --}}
                            {{-- =========================================================================== --}}
                            <div class="d-flex mb-4">
                                <div onclick="prev_quantity({{$item->Id_Product}})" class=" border-0 fs-6 fw-semibold d-flex justify-content-center align-items-center"
                                    style="height: 35px; width: 35px; background: #e5e5e5; cursor: pointer;">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <form id="quantity-form-{{$item->Id_Product}}" class="" action="{{route('quantity_cart')}}" method="POST">
                                    @csrf 
                                    @method('put')
                                    <input type="hidden" name="Id_Product" value="{{$item->Id_Product}}">
                                    <input type="hidden" name="Id_Bill" value="{{$item->Id_Bill}}">
                                    <input  type="text" id="quantity-input-{{$item->Id_Product}}" class=" text-center" name="Quantity" min="1" value="{{$item->Quantity}}" max="{{$item->product_quantity}}"
                                        style="border: 0.5px solid #e5e5e5;height: 35px; width: 40px;">
                                </form>
                                <div onclick="next_quantity({{$item->Id_Product}})" class=" border-0 fs-6 fw-semibold d-flex justify-content-center align-items-center"
                                    style="height: 35px; width: 35px; background: #e5e5e5; cursor: pointer;">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>

                            {{-- =========================================================================== --}}
                            <div class="fs-6 fw-bold">
                                Giá: {{number_format($item->Total, 2, ',', '.')}}đ
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none">{{$Total_Payment+=$item->Total}}</div>
                @endforeach
                

            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-0 mt-3">
            <div class="p-3 rounded-2 bg-white shadow-sm">
                <h4 class="fw-bold border-bottom mt-1 pb-2 mb-0">Thông tin đơn hàng</h4>
                <div class="border-top py-2">
                    <div class="row text-secondary my-2">
                        <div class="col-lg-6 col-6">
                            Tạm tính ({{count($cart_list)}}):
                        </div>
                        <div class="col-lg-6 col-6 text-end">
                            {{number_format($Total_Payment, 2, ',', '.')}}đ
                        </div>
                    </div>
                    <div class="row text-secondary my-2">
                        <div class="col-lg-6 col-6">
                            Phí vận chuyển:
                        </div>
                        <div class="col-lg-6 col-6 text-end">
                            0đ
                        </div>
                    </div>
                    <div class="row text-dark fw-semibold fs-5 my-2">
                        <div class="col-lg-6 col-6">
                            Tổng cộng:
                        </div>
                        <div class="col-lg-6 col-6 text-end">
                            {{number_format($Total_Payment, 2, ',', '.')}}đ
                        </div>
                    </div>
                </div>
                <button class="btn w-100 fs-6 fw-semibold text-white" style="background-color: #F48C06;"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Xác nhận thanh toán
                </button>
            </div>
        </div>
    </div>
    @else
        <div class="my-3 d-flex justify-content-center align-items-center w-100 rounded-3 bg-body-tertiary" style="height: 500px">
            <div class="d-flex gap-3">
                <div class="fs-2 text-secondary">
                    <i class="fa-solid fa-cart-plus"></i>
                </div>
                <div class="fs-2 text-secondary">
                    Bạn chưa có sản phẩm nào!
                </div>
            </div>
        </div>
    @endif
</div>
<section class="container-xxl mb-4">
    <h4 class="fw-bolder mb-3">Sách bán theo khóa</h4>
    <div class="row"> 
        @foreach ($product_random as $item)
             <div class="col-lg-3 mb-3">
            <a href="{{route('product_detail',['id'=>$item->Id_Product])}}" class="d-block text-decoration-none text-dark product_hover">
                <div class="overflow-hidden rounded-3 mb-2">
                    <img class="w-100" src="{{asset('uploads/products/'.$item->Image)}}" alt="">
                </div>
                <div class="fw-semibold fs-5">
                    Web Basic
                </div>
                <div class="d-flex align-items-center gap-3">
                    <p class="text-secondary fs-6"><del>{{number_format($item->Price, 2, ',', '.')}}đ</del></p>
                    <p class="text-danger fs-6 fw-semibold">{{number_format($item->Price, 2, ',', '.')}}đ</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
{{-- =========================================================================== --}}
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  @if (!empty($cart_list))
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin đơn hàng</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="bill_form" action="{{route('bill_post')}}" method="post">
                @csrf
                <input type="hidden" name="Id_Bill" value="{{$Id_Bill}}">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="fw-semibold form-label">Tên người đặt</label>
                            <input type="text" name="Name_Orderer" class="form-control" placeholder="Tên người đặt" value="{{old('Name_Orderer')}}">
                            @error('Name_Orderer')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="fw-semibold form-label">Email người đặt</label>
                            <input type="email" name="Email_Orderer" class="form-control" placeholder="Email người đặt" value="{{old('Email_Orderer')}}">
                            @error('Email_Orderer')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="fw-semibold form-label">Số điện thoại người đặt</label>
                            <input type="number" name="Phone_Orderer" class="form-control" placeholder="Số điện thoại" value="{{old('Phone_Orderer')}}">
                            @error('Phone_Orderer')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="fw-semibold form-label">Địa chỉ giao hàng</label>
                            <input type="text" name="Address_Orderer" class="form-control" placeholder="Địa chỉ giao hàng" value="{{old('Address_Orderer')}}">
                            @error('Address_Orderer')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="fw-semibold form-label">Tên người nhận</label>
                            <input type="text" name="Name_recipient" class="form-control" placeholder="Tên người nhận" value="{{old('Name_recipient')}}">
                            @error('Name_recipient')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="fw-semibold form-label">Tiền vận chuyển</label>
                            <input type="number" name="Ship" class="form-control" placeholder="0" value="0" style="pointer-events: none;">
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="fw-semibold form-label">Hình thức thanh toán</label>
                            <select class="form-select" name="" aria-label="Default select example">
                                <option value="giao-hang" selected>Thanh toán khi nhận hàng</option>
                              </select>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="fw-semibold form-label fs-5">Tổng thành tiền : {{number_format($Total_Payment, 2, ',', '.')}}đ</label>
                            <input type="hidden" name="Total" value="{{$Total_Payment}}">
                          </div>
                    </div>
                </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" onclick="bill_form()" class="btn btn-primary">Xác nhận thanh toán</button>
        </div>
      </div>
    </div>
  </div>
  @endif
  
@endsection

@section('css')
    <style>
        body {
            font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
        }
    </style>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // ------------------------------- Sử dụng javascript thuần để code tăng giảm số lượng -------------------------------
        // document.addEventListener('DOMContentLoaded', function() {
        //     var prevQuantities = document.querySelectorAll('.prev-quantity');
        //     var nextQuantities = document.querySelectorAll('.next-quantity');

        //     prevQuantities.forEach(function(prevQuantity) {
        //         prevQuantity.addEventListener('click', function() {
        //             var quantityInput = prevQuantity.parentElement.querySelector('.quantity-input');
        //             var currentValue = parseInt(quantityInput.value);
        //             if (currentValue > 1) {
        //                 quantityInput.value = currentValue - 1;
        //                 submitForm(prevQuantity.parentElement.querySelector('.quantity-form'));
        //             }
        //         });
        //     });

        //     nextQuantities.forEach(function(nextQuantity) {
        //         nextQuantity.addEventListener('click', function() {
        //             var quantityInput = nextQuantity.parentElement.querySelector('.quantity-input');
        //             var currentValue = parseInt(quantityInput.value);
        //             var maxQuantity = parseInt(quantityInput.getAttribute('max'));
        //             if (currentValue < maxQuantity) {
        //                 quantityInput.value = currentValue + 1;
        //                 submitForm(nextQuantity.parentElement.querySelector('.quantity-form'));
        //             }
        //         });
        //     });
        //     function submitForm(form) {
        //         form.submit();
        //     }
        // });


        // ------------------------------- Sử dụng javascript kết hợp với php để code tăng giảm số lượng -------------------------------
        function prev_quantity(id){
            var soluong = document.getElementById('quantity-input-'+id);
            var max_soluong = soluong.getAttribute('max');
            var gia_tri = parseInt(soluong.value);
            if(gia_tri >1){
                soluong.value = gia_tri-1;
                submitForm(id);
            }
        }
        function next_quantity(id){
            var soluong = document.getElementById('quantity-input-'+id);
            var max_soluong = soluong.getAttribute('max');
            var gia_tri = parseInt(soluong.value);
            if(gia_tri < max_soluong){
                soluong.value = gia_tri+1;
                submitForm(id);
            }
        }
        function submitForm(id) {
            var form = document.getElementById('quantity-form-'+id);
            form.submit();
        }

        function bill_form(){
            // Gọi hàm loadSuccess() trước khi submit form
            loadSuccess();

            // Đợi 1,5 giây trước khi thực hiện submit form
            setTimeout(function() {
                document.getElementById('bill_form').submit();
            }, 1500);
        }
        function loadSuccess(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Xác nhận đơn hàng",
                showConfirmButton: false,
                timer: 1500
            });
        }
        ////////////////////////////////////////// sử dụng jquery /////////////////////////////////////////
        $(document).ready(function(){
            
        });
    </script>
@endsection
