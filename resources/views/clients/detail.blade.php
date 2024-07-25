@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container-xxl">
    <div class="d-flex gap-4">
        <div class="flex-grow-1">
            <div class="row my-4">
                <div class="col-lg-6">
                    <div class="d-flex flex-column">
                        <div class="mb-3 rounded-3 overflow-hidden">
                            <img class="w-100" src="{{asset('uploads/products/'.$product_detail->Image)}}" alt="">
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <img class="w-100 rounded-3" src="{{asset('uploads/products/'.$product_detail->Image)}}" alt="">
                            </div>
                            <div class="col-3">
                                <img class="w-100 rounded-3" src="{{asset('uploads/products/'.$product_detail->Image)}}" alt="">
                            </div>
                            <div class="col-3">
                                <img class="w-100 rounded-3" src="{{asset('uploads/products/'.$product_detail->Image)}}" alt="">
                            </div>
                            <div class="col-3">
                                <img class="w-100 rounded-3" src="{{asset('uploads/products/'.$product_detail->Image)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <h3 class="fw-bold">{{$product_detail->Name}}</h3>
                        <div class="d-flex justify-content-between align-items-center fw-semibold mb-4">
                            <div class="d-flex align-items-center gap-1">
                                Đánh giá:
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div>
                                Xem: {{$product_detail->View}} <i class="fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <div class="fs-3 fw-bolder p-3 rounded-2"
                            style="background-color: rgba(244, 140, 6, 0.1);">
                            <span style="color: #F48C06;">Giá: {{number_format($product_detail->Price, 2, ',', '.')}}đ</span>
                        </div>
                        <div class="mt-4 mb-2 fs-5 fw-semibold">Số lượng:</div>
                        <div class="d-flex mb-4">
                            <div id="prev-quantity" class="border-0 fs-6 fw-semibold d-flex justify-content-center align-items-center"
                                style="height: 35px; width: 35px; background: #e5e5e5; cursor: pointer;">
                                <i class="fa-solid fa-minus"></i>
                            </div>
                            <form id="quantity-form" action="{{ route('add_to_cart') }}" method="POST">
                                @csrf 
                                <input type="hidden" name="Id_Product" value="{{$product_detail->Id_Product}}">
                                <input id="quantity-input" type="text-center" name="SoLuong" class="text-center" value="1" min="1" max="{{$product_detail->Quantity}}"
                                style="border: 0.5px solid #e5e5e5;height: 35px; width: 40px; pointer-events: none;">
                            </form>
                            <div id="next-quantity" class=" border-0 fs-6 fw-semibold d-flex justify-content-center align-items-center"
                                style="height: 35px; width: 35px; background: #e5e5e5; cursor: pointer;">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <button onclick="submitForm()" class="btn text-light fw-semibold fs-5 mt-3" style="background-color: #F48C06;">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
            <section class="mb-4">
                <div class="container-xxl">
                    <h3>Mô tả sản phẩm</h3>
                    <div class="lh-4">
                        {{$product_detail->Describe}}
                    </div>
                </div>
            </section>
        </div>
        <div class=" mb-4 d-lg-block d-md-none d-none" style="width: 150px">
            <div class="position-sticky bg-body-secondary w-100" style="top:99px; ">
                <img class="rounded-2" style="width: 150px" src="{{asset('assets/images/banner-qc-detail.png')}}" alt="">
            </div>
        </div>
    </div>
    <section class="container-xxl mb-4">
        <h4 class="fw-bolder mb-3">Sách bán theo khóa</h4>
        <div class="row">
            @foreach ($product_random as $sp)
                <div class="col-lg-3 mb-3">
                <a href="{{route('product_detail',['id'=>$sp->Id_Product])}}" class="d-block text-decoration-none text-dark product_hover">
                    <div class="overflow-hidden rounded-3 mb-2">
                        <img class="w-100" src="{{asset('uploads/products/'.$sp->Image)}}" alt="">
                    </div>
                    <div class="fw-semibold fs-5">
                        {{$sp->Name}}
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <p class="text-secondary fs-6"><del>{{number_format($sp->Price, 2, ',', '.')}}đ</del></p>
                        <p class="text-danger fs-6 fw-semibold">{{number_format($sp->Price, 2, ',', '.')}}đ</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <section>
        <h3 class="mb-3 fs-4">Bình luận & đánh giá sản phẩm</h3>
        <div class="mb-4">
            <form action="{{route('comment_product',['id'=>$product_detail->Id_Product])}}" method="post" class="mb-2">
                @csrf
                <div class="input-group">
                    <input type="text" name="comment" class="form-control" id="">
                    <button type="submit" class="btn text-white" style="background-color: #F48C06">Bình luận</button>
                </div>
            </form>
            <div class="row">
                @foreach ($product_comment as $item)
                <div class="col-lg-12 border-top">
                    <div class="d-flex gap-2 mt-2">
                        <div class="rounded-circle overflow-hidden border" style="height: 50px; width: 50px">
                            <img class="w-100" src="{{asset('uploads/users/'.$item->user->Avatar)}}" alt="">
                        </div>
                        <div class="" >
                            <div class="fs-6 fw-semibold">{{$item->user->FullName}}</div>
                            <div class="text-secondary" style="font-size: 14px">Ngày bình luận: {{$item->created_at}}</div>
                        </div>
                    </div>
                    <div class="p-2">
                        {{$item->Content}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

{{-- ================================================================================= --}}
@endsection

@section('css')
    <style>

    </style>
@endsection
@section('script')
    <script>
        // giảm số lượng
        document.getElementById('prev-quantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity-input');
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        // tăng số lượng
        document.getElementById('next-quantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity-input');
            var currentValue = parseInt(quantityInput.value);
            var maxValue = parseInt(quantityInput.getAttribute('max'));
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        });
        // Khi giá trị của input số lượng thay đổi, cập nhật giá trị của trường SoLuong
        document.getElementById('quantity-input').addEventListener('change', function() {
            document.getElementById('so-luong-input').value = this.value;
        });
        // gửi form add to cart
        function submitForm() {
            document.getElementById('quantity-form').submit();
        }
    </script>
@endsection
