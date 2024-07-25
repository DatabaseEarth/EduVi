@extends('clients.layout.layout')

@section('title')
{{$title}}
@endsection
@section('content')
@if (!empty($cart_list))
    <div class="container-xxl">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mt-3">Đơn hàng</h3>
    </div>
    <div>
        <section>
            {{$cart_list->links()}}
        </section>
        <div class="row mt-4">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-center" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">STT</th>
                        <th class="text-start" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Tên người
                            đặt</th>
                        <th class="text-start" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Email
                            người nhận</th>
                        <th class="text-start" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Số điện
                            thoại</th>
                        <th class="text-start" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Tên người
                            nhận</th>
                        <th class="text-end" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Tổng tiền
                        </th>
                        <th class="text-center" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Xem chi
                            tiết</th>
                        <th class="text-center" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Trạng
                            thái</th>
                        <th class="text-center" scope="col" style="background-color: rgba(244, 140, 6, 0.1);">Hành
                            động</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($cart_list as $item)
                    <tr>
                        <td class=" text-center">{{$i++}}</td>
                        <td class="text-start">{{$item->Name_Orderer}}</td>
                        <td class="text-start">{{$item->Email_Orderer}}</td>
                        <td class="text-end">{{$item->Phone_Orderer}}</td>
                        <td class="text-start">{{$item->Name_recipient}}</td>
                        <td class="text-end">{{number_format($item->Total_Payment,2,',','.')}}đ</td>
                        <td class="text-center">
                            <a href="{{route('admin.cart.order_detail',['id'=>$item->Id_Bill])}}"
                                class="btn btn-sm btn-info text-white">Xem chi tiết</button>
                        </td>
                        <td class="text-center">
                            @switch($item->Status)
                            @case('gio-hang')
                            <span class="badge text-bg-primary">Giỏ hàng</span>
                            @break
                            @case('thanh-toan')
                            <span class="badge text-bg-secondary">Thanh toán</span>
                            @break
                            @case('chuan-bi')
                            <span class="badge text-bg-warning">Chuẩn bị</span>
                            @break
                            @case('thanh-toan')
                            <span class="badge text-bg-info">Thanh toán</span>
                            @break
                            @case('thanh-toan')
                            <span class="badge text-bg-primary">Đang giao</span>
                            @break
                            @case('thanh-toan')
                            <span class="badge text-bg-success">Thành công</span>
                            @break
                            @case('huy-don')
                            <span class="badge text-bg-danger">Hủy đơn</span>
                            @break
                            @endswitch
                        </td>
                        <td class="text-center">
                            <form action="" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-sm btn-danger">Hủy đơn</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Chi tiết đơn hàng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div ng-repeat="sp in dsSpCt.sanPham" class="col-3 position-relative">
                        <a href="" class="card text-decoration-none">
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                            <img src="public/images/" class="card-img-top" alt="ảnh sản phẩm">
                            <div class="card-body">
                                <h5 class="card-title overflow-hidden" style="width: 100%; height: 28px;">
                                    Tên sản phẩm
                                </h5>
                                <div class="row">
                                    <p class="card-text fs-8 fw-semibold text-secondary mb-0">
                                        <del>0đ</del>
                                    </p>
                                    <p class="card-text fs-8 fw-bold text-danger">0đ</p>
                                </div>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
@else
    <div class="container-xxl">
        <h3 class="my-3">Bạn chưa có đơn hàng nào</h3>
    </div>
@endif


@endsection

@section('css')
<style>

</style>
@endsection
@section('script')
<script>
    function previewAvatar(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var avatarPreview = document.getElementById('avatarPreview');
            avatarPreview.src = reader.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection