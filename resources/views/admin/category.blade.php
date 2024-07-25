@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h3>Danh mục</h3>
    <a href="{{route('admin.category.create')}}" class="btn btn-primary">Thêm danh mục</a>
</div>
<div class="mt-3 rounded-2">
    <div class="row">
        @foreach ($categories as $item)
        <div class="col-lg-3 mb-4">
            <div class="position-relative">
                <div class="bg-white d-block text-decoration-none text-primary p-2 rounded-3 border">
                    <img class="w-100 mb-2 rounded-3" src="{{asset('uploads/categories/'.$item->Image)}}" alt="">
                    <div class="fs-5 fw-semibold">{{$item->Name}}</div>
                </div>
                <div class="position-absolute start-0 top-0 end-0 bottom-0 bg-dark bg-opacity-50 rounded-3 category-hover">
                    <div class="d-flex justify-content-center gap-2 align-items-center h-100  w-100">
                        <a href="{{route('admin.category.edit',['id'=>$item->Id_Category])}}" class="btn btn-warning">Sửa</a>
                        <button onclick="deleteCategory({{$item->Id_Category}})" class="btn btn-danger">Xóa</button>
                        <form id="delete-category-form-{{$item->Id_Category}}" action="{{route('admin.category.delete',['id'=>$item->Id_Category])}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <section class="my-3">
        {{$categories->links()}}
    </section>
</div>
@endsection
@section('css')
    <style>
        
    </style>
@endsection
@section('script')
    <script>
        function deleteCategory(id) {
            var kq = confirm('Bạn có muốn xóa danh mục này không?');
            if (kq) {
                document.getElementById("delete-category-form-"+id).submit();
            }
        }
    </script>
@endsection