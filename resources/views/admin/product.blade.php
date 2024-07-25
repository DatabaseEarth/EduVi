@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Sản phẩm</h3>
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Thêm sản phẩm</a>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <table class="table align-middle m-0">
            <thead class="table-primary">
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-start" scope="col">Ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th class="text-center" scope="col">Loại</th>
                <th class="text-center" scope="col">Số lượng</th>
                <th class="text-end" scope="col">Giá</th>
                <th class="text-center" scope="col">Xem</th>
                <th class="text-center" scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $item)
                <tr>
                    <th class="text-center" scope="row">{{$i++}}</th>
                    <td><img class="overflow-hidden rounded-3" style="width: 40px; height: 40px" src="{{asset('uploads/products/'.$item->Image)}}" alt=""></td>
                    <td>{{$item->Name}}</td>
                    <td class="text-center">{{$item->category_name}}</td>
                    <td class="text-center">{{$item->Quantity}}</td>
                    <td class="text-end">{{(number_format($item->Price, 2, ',', '.'))}}đ</td>
                    <td class="text-center">{{$item->View}}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-warning" href="{{route('admin.product.edit',['id'=>$item->Id_Product])}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button onclick="deleteProduct({{$item->Id_Product}})" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <form id="delete-product-form-{{$item->Id_Product}}" action="{{route('admin.product.delete',['id'=>$item->Id_Product])}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <section class="my-3">
            {{ $products->links() }}
        </section>
    </div>
@endsection
@section('css')
    <style>
        
    </style>
@endsection
@section('script')
    <script>
        function deleteProduct(id) {
            var kq = confirm('Bạn có muốn xóa sản phẩm này không?');
            if (kq) {
                document.getElementById("delete-product-form-"+id).submit();
            }
        }
    </script>
@endsection