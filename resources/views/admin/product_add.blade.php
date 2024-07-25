@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Thêm sản phẩm</h3>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <form action="{{route('admin.product.create_post')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Tên sản phẩm</label>
                            <input type="text" name="Name" class="form-control" id="" placeholder="Tên sản phẩm" value="{{old('Name')}}">
                            @error('Name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Giá sản phẩm</label>
                            <input type="number" name="Price" class="form-control" id="" placeholder="Giá sản phẩm" value="{{old('Price')}}">
                            @error('Price')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Số lượng</label>
                            <input type="number" name="Quantity" class="form-control" id="" placeholder="Số lượng sản phấm" value="{{old('Quantity')}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Danh mục</label>
                            <select class="form-select" name="Id_Category" aria-label="Default select example">
                                <option value="" selected>Chọn danh mục</option>
                                @foreach ($category_list as $dm)
                                    <option value="{{$dm->Id_Category}}">{{$dm->Name}}</option>
                                @endforeach
                            </select>
                            @error('Id_Category')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Ảnh sản phẩm</label>
                            <input type="file" name="Image" class="form-control" id="">
                            @error('Image')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Hot</label>
                            <select class="form-select" name="Hot" aria-label="Default select example">
                                <option value="0" selected>Không Hot</option>
                                <option value="1">Hot</option>
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Trạng thái</label>
                            <select class="form-select" name="Hide" aria-label="Default select example">
                                <option value="1" selected>Hiện</option>
                                <option value="0">Ẩn</option>
                              </select>
                        </div>
                        <button class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Mô tả sản phẩm</label>
                            @error('Describe')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                            <textarea id="mota" class="form-control" name="Describe" id="" cols="30" rows="3">
                                {{ old('Describe') ?? '' }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
            max-height: 450px;
        }
    </style>
@endsection
@section('script')

<script src="{{asset('assets/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#mota' ),{language: 'vi'} )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection