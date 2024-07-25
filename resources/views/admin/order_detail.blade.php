@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="p-4 rounded-3 bg-white">
    {{-- <input type="hidden" name="Id_Bill" value="{{$Id_Bill}}"> --}}
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="fw-semibold form-label">Tên người đặt</label>
                <input type="text" name="Name_Orderer" disabled class="form-control" placeholder="Tên người đặt" value="{{$cart_detail->Name_Orderer}}">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="fw-semibold form-label">Email người đặt</label>
                <input type="email" name="Email_Orderer" disabled class="form-control" placeholder="Email người đặt" value="{{$cart_detail->Email_Orderer}}">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="fw-semibold form-label">Số điện thoại người đặt</label>
                <input type="number" name="Phone_Orderer" disabled class="form-control" placeholder="Số điện thoại" value="{{$cart_detail->Phone_Orderer}}">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <table class="table">
            <thead>
              <tr class="table-primary">
                <th class="text-start" scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th class="text-end" scope="col">Giá sản phẩm</th>
                <th class="text-center" scope="col">Số lượng</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($cart_detail->carts as $item)
                <tr>
                    <th class="text-start" scope="row">{{$i++}}</th>
                    <td>{{$item->Name_Product}}</td>
                    <td class="text-end">{{number_format($item->Price_Product,2,',','.')}}đ</td>
                    <td class="text-center">{{$item->Quantity}}</td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="fw-semibold form-label">Địa chỉ giao hàng</label>
                <input type="text" name="Address_Orderer" disabled class="form-control" placeholder="Địa chỉ giao hàng" value="{{$cart_detail->Address_Orderer}}">
                </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="fw-semibold form-label">Tên người nhận</label>
                <input type="text" name="Name_recipient" disabled class="form-control" placeholder="Tên người nhận" value="{{$cart_detail->Name_recipient}}">
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="fw-semibold form-label">Tiền vận chuyển</label>
                <input type="number" name="Ship" disabled value="{{$cart_detail->Ship}}" class="form-control" placeholder="0" value="0" style="pointer-events: none;">
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="fw-semibold form-label">Hình thức thanh toán</label>
                <select class="form-select" name="" disabled aria-label="Default select example">
                    <option value="giao-hang" selected>Thanh toán khi nhận hàng</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <label class="fw-semibold form-label fs-5">Tổng thành tiền : {{number_format($cart_detail->Total_Payment, 2, ',', '.')}}đ</label>
                {{-- <input type="hidden" name="Total" value="{{$Total_Payment}}"> --}}
            </div>
        </div>
    </div>
</div>

@endsection
@section('css')
    <style>

    </style>
@endsection
@section('script')
    
@endsection