@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Khóa học</h3>
        <a href="{{route('admin.course.create')}}" class="btn btn-primary">Tạo khóa học</a>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <table class="table align-middle m-0">
            <thead class="table-primary">
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-start" scope="col">Ảnh</th>
                <th scope="col">Tên Khóa học</th>
                <th scope="col">Chương</th>
                <th class="text-end" scope="col">Giá</th>
                <th class="text-center" scope="col">Xem</th>
                <th class="text-start" scope="col">Trạng thái</th>
                <th class="text-center" scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($course_list as $item)
                    <tr>
                        <th class="text-center" scope="row">{{$i++}}</th>
                        <td>
                            <div class="overflow-hidden rounded-3 d-flex justify-content-center align-items-center" style="width: 40px; height: 40px">
                                <img class="w-100" src="{{asset('uploads/courses/'.$item->Image)}}" alt="">
                            </div>
                        </td>
                        <td class="text-truncate">{{$item->Title}}</td>
                        <td class="text-truncate ">
                            <a href="{{route('admin.course.course_chapter',['id'=>$item->Id_Course])}}" class="text-decoration-none">Xem chương</a>
                        </td>
                        <td class="text-end">{{number_format($item->Price,2,',','.')}}đ</td>
                        <td class="text-center">{{$item->View}}</td>
                        <td class="text-start">
                            {{$item->created_at}}
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="{{route('admin.course.edit',['id'=>$item->Id_Course])}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button onclick="deleteCourse({{$item->Id_Course}})" class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <form id="delete-product-course-{{$item->Id_Course}}" action="{{route('admin.course.delete',['id'=>$item->Id_Course])}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>
        <section class="mt-3">
            {{$course_list->links()}}
        </section>
    </div>
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('script')
    <script>
        function deleteCourse(id) {
            var kq = confirm('Bạn có muốn xóa khóa học này không?');
            if (kq) {
                document.getElementById("delete-product-course-"+id).submit();
            }
        }
    </script>
@endsection