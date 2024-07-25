@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Đơn hàng</h3>
</div>
<div>
    <div>
        {{$order_list->links()}}
    </div>
    <div class="row mt-4">
        <table class="table table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th class="table-primary text-center" scope="col">STT</th>
                    <th class="table-primary text-start" scope="col">Tên người đặt</th>
                    <th class="table-primary text-start" scope="col">Email người đặt</th>
                    <th class="table-primary text-end" scope="col">Số điện thoại</th>
                    <th class="table-primary text-start" scope="col">Tên người nhận</th>
                    <th class="table-primary text-end" scope="col">Tổng tiền</th>
                    <th class="table-primary text-center" scope="col">Xem chi tiết</th>
                    <th class="table-primary text-center" scope="col">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($order_list as $item)
                    <tr>
                        <td class=" text-center">{{$i++}}</td>
                        <td class="text-start">{{$item->Name_Orderer}}</td>
                        <td class="text-start">{{$item->Email_Orderer}}</td>
                        <td class="text-end">{{$item->Phone_Orderer}}</td>
                        <td class="text-start">{{$item->Name_recipient}}</td>
                        <td class="text-end">{{number_format($item->Total_Payment,2,',','.')}}đ</td>
                        <td class="text-center">
                            <a href="{{route('admin.cart.order_detail',['id'=>$item->Id_Bill])}}" class="btn btn-info text-white">Xem chi tiết</button>
                        </td>
                        <td class="text-center">
                            <form action="{{route('admin.cart.bill_update')}}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="Id_Bill" value="{{$item->Id_Bill}}">
                                <div class="input-group">
                                    <select name="Status" class="form-select">
                                        <option value="gio-hang" {{($item->Status=='gio-hang')?'selected':''}}>Giỏ hàng</option>
                                        <option value="thanh-toan" {{($item->Status=='thanh-toan')?'selected':''}}>Thanh toán</option>
                                        <option value="chuan-bi" {{($item->Status=='chuan-bi')?'selected':''}}>chuẩn bị</option>
                                        <option value="dang-giao" {{($item->Status=='dang-giao')?'selected':''}}>Đang giao</option>
                                        <option value="thanh-cong" {{($item->Status=='thanh-cong')?'selected':''}}>Thành công</option>
                                        <option value="huy-don" {{($item->Status=='huy-don')?'selected':''}}>Hủy đơn</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">
                                        Cập nhật
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>


@endsection
@section('css')
    <style>

    </style>
@endsection
@section('script')
    
@endsection