@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Bài học</h3>
        <a href="{{route('admin.lesson.create')}}" class="btn btn-primary">Thêm bài học</a>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <table class="table align-middle m-0 table-responsive" style="table-layout: auto">
            <thead class="table-primary">
            <tr>
                <th class="text-start" scope="col">STT</th>
                <th class="text-start" scope="col">Tiêu đề</th>
                <th class="text-start" scope="col">Chương</th>
                <th class="text-start" scope="col">Khóa</th>
                <th class="text-center" scope="col">Thứ tự</th>
                <th class="text-center" scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach ($lesson_list as $item)
                  <tr>
                <th class="text-start" scope="row">{{$i++}}</th>
                <td class="text-truncate" style="max-width: 300px">{{$item->Title}}</td>
                <td class="text-start text-truncate">{{$item->chapter_title}}</td>
                <td class="text-start text-truncate">{{$item->course_title}}</td>
                <td class="text-center">{{$item->STT}}</td>
                <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="{{route('admin.lesson.edit',['id'=>$item->Id_Lesson])}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <button class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
              @endforeach
            </tbody>
        </table>
        <section class="mt-3">
          {{$lesson_list->links()}}
        </section>
    </div>
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('script')
    
@endsection