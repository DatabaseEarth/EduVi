@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Sửa danh mục</h3>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <form action="{{route('admin.category.update',['id'=>$data_category->Id_Category])}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Tên danh mục</label>
                            <input type="text" name="Name" class="form-control" id="" value="{{$data_category->Name}}" placeholder="Tên danh mục">
                            @error('Name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Trạng thái</label>
                            <select class="form-select" name="Hide" aria-label="Default select example">
                                <option value="1" {{($data_category->Hide==1)?'selected':''}}>Hiện</option>
                                <option value="0" {{($data_category->Hide==0)?'selected':''}}>Ẩn</option>
                              </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Ảnh danh mục</label>
                            <input type="file" name="Image" value="{{$data_category->Image}}" class="form-control" id="">
                            @error('Image')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Sửa danh mục</button>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Mô tả sản phẩm</label>
                            @error('Describe')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            <textarea id="mota" class="form-control" name="Describe" id="" cols="30" rows="3">
                                {{$data_category->Describe}}
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