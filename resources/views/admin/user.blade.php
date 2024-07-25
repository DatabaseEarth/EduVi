@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Tài khoản</h3>
        <a href="{{route('admin.user.create')}}" class="btn btn-primary">Thêm tài khoản</a>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <table class="table align-middle m-0">
            <thead class="table-primary">
            <tr>
                <th class="text-center" scope="col">STT</th>
                <th class="text-start" scope="col">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th class="text-center" scope="col">Quyền</th>
                <th class="text-center" scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($user_list as $user)
                    <tr>
                        <th class="text-center" scope="row">{{$i++}}</th>
                        <td class="text-start"><img class="overflow-hidden rounded-3" style="width: 40px; height: 40px" src="{{asset('uploads/users/'.$user->Avatar)}}" alt=""></td>
                        <td>{{$user->FullName}}</td>
                        <td>{{$user->Email}}</td>
                        <td>{{$user->Phone}}</td>
                        <td class="text-center">
                            @switch($user->Role)
                                @case(0)
                                    <span class="badge text-bg-secondary">Khách hàng</span>
                                    @break
                                @case(1)
                                    <span class="badge text-bg-primary">Quản lý</span>
                                    @break
                                @default
                            @endswitch
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="{{route('admin.user.edit',['id'=>$user->Id_User])}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <section class="mt-3">
            {{$user_list->links()}}
        </section>
    </div>
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('script')
    
@endsection