@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Chương</h3>
        <a href="{{route('admin.chapter.create')}}" class="btn btn-primary">Thêm chương</a>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <table class="table align-middle m-0">
            <thead class="table-primary">
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-start" scope="col">Tiêu đề</th>
                <th class="text-start" scope="col">Khóa học</th>
                <th class="text-center" scope="col">Số thứ tự</th>
                <th class="text-start" scope="col">Ngày tạo</th>
                <th class="text-center" scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
              @php
                  $i =1;
              @endphp
              @foreach ($chapter_list as $item)
                <tr>
                  <th class="text-center" scope="row">{{$i++}}</th>
                  <td class="text-start text-truncate">{{$item->Title}}</td>
                  <td class="text-start text-truncate">{{$item->course_title}}</td>
                  <td class="text-center">{{$item->STT}}</td>
                  <td class="text-start">{{$item->created_at}}</td>
                  <td class="text-center">
                      <a class="btn btn-sm btn-warning" href="{{route('admin.chapter.edit',['id'=>$item->Id_Chapter])}}">
                          <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <button onclick="deleteChapter({{$item->Id_Chapter}})" class="btn btn-sm btn-danger">
                          <i class="fa-solid fa-trash"></i>
                      </button>
                      <form id="delete-chapter-form-{{$item->Id_Chapter}}" action="{{route('admin.chapter.delete',['id'=>$item->Id_Chapter])}}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <section>
          {{$chapter_list->links()}}
        </section>
    </div>
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('script')
    <script>
      function deleteChapter(id) {
            var kq = confirm('Bạn có muốn xóa chương này không?');
            if (kq) {
                document.getElementById("delete-chapter-form-"+id).submit();
            }
        }
    </script>
@endsection