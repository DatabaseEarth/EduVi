@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Sửa tài khoản</h3>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <form action="{{route('admin.user.update',['id'=>$user->Id_User])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Họ và tên</label>
                            <input type="text" name="FullName" disabled value="{{$user->FullName}}" class="form-control" id="" placeholder="Tên và họ">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Email</label>
                            <input type="email" name="Email" disabled value="{{$user->Email}}" disabled class="form-control" id="" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Số điện thoại</label>
                            <input type="number" name="Phone" disabled value="{{$user->Phone}}" class="form-control" id="" placeholder="Số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Địa chỉ</label>
                            <input type="text" name="Address" disabled value="{{$user->Address}}" class="form-control" id="" placeholder="Địa chỉ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Ảnh đại diện</label>
                            <input type="file" name="Avatar" disabled value="{{$user->Avatar}}" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Quyền</label>
                            <select class="form-select" name="Role" aria-label="Default select example">
                                <option value="0" {{($user->Role)?'selected':''}}>Khách hàng</option>
                                <option value="1" {{($user->Role)?'selected':''}}>Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa tài khoản</button>
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