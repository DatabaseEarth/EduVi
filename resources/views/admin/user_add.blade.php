@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Thêm tài khoản</h3>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <form action="{{route('admin.user.create_post')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Họ và tên</label>
                            <input type="text" name="FullName" value="{{old('FullName')}}" class="form-control" id="" placeholder="Tên và họ">
                            @error('FullName')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Email</label>
                            <input type="email" name="Email" value="{{old('Email')}}" class="form-control" id="" placeholder="email">
                            @error('Email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Số điện thoại</label>
                            <input type="number" name="Phone" value="{{old('Phone')}}" class="form-control" id="" placeholder="Số điện thoại">
                            @error('Phone')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Địa chỉ</label>
                            <input type="text" name="Address" value="{{old('Address')}}" class="form-control" id="" placeholder="Địa chỉ">
                            @error('Address')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Ảnh đại diện</label>
                            <input type="file" name="Avatar" value="{{old('Avatar')}}" class="form-control" id="">
                            @error('Avatar')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Mật khẩu</label>
                            <input type="password" name="Password" value="{{old('Password')}}" class="form-control" id="" placeholder="Mật khẩu">
                            @error('Password')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Quyền</label>
                            <select class="form-select" name="Role" aria-label="Default select example">
                                <option value="0" {{(old('Role')==0)?'selected':''}}>Khách hàng</option>
                                <option value="1" {{(old('Role')==1)?'selected':''}}>Admin</option>
                            </select>
                            @error('Role')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <style>
        
    </style>
@endsection
@section('script')

    <script src="{{asset('assets/ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"></script>
    <script>
        
    </script>
@endsection