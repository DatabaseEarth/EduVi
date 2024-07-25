@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Sửa khóa học</h3>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <form action="{{route('admin.course.update',['id'=>$course->Id_Course])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Tên khóa học</label>
                            <input type="text" name="Title" value="{{$course->Title}}" class="form-control" id="" placeholder="Tên khóa học">
                            @error('Title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Giá Khóa học</label>
                            <input type="number" name="Price" value="{{$course->Price}}" class="form-control" id="" placeholder="Giá khóa học">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Yêu cầu</label>
                            <input type="text" name="Request" value="{{$course->Request}}" class="form-control" id="" placeholder="Yêu cầu của khóa học">
                            @error('Request')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Thành tích</label>
                            <input type="text" name="Achievement" value="{{$course->Achievement}}" class="form-control" id="" placeholder="Yêu cầu của khóa học">
                            @error('Achievement')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Pro</label>
                            <select class="form-select" name="Pro" aria-label="Default select example">
                                <option value="1" {{($course->Pro==1)?'selected':''}}>Có trả phí</option>
                                <option value="0" {{($course->Pro==0)?'selected':''}}>Miễn phí</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Ảnh khóa học</label>
                            <input type="file" name="Image" value="{{$course->Image}}" class="form-control" id="">
                            @error('Image')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Video giới thiệu</label>
                            <input type="text" name="Video_Intro" value="{{$course->Video_Intro}}" class="form-control" id="" placeholder="Link nhúng iframe :))">
                            @error('Video_Intro')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Trạng thái</label>
                            <select class="form-select" name="Hide" aria-label="Default select example">
                                <option value="1" {{($course->Hide==1)?'selected':''}}>Hiện</option>
                                <option value="0" {{($course->Hide==0)?'selected':''}}>Ẩn</option>
                              </select>
                        </div>
                        <button class="btn btn-primary">Sửa khóa học</button>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            @error('Describe')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label for="" class="form-label fw-semibold">Mô tả khóa học</label>
                            <textarea id="mota" class="form-control" name="Describe" id="" cols="30" rows="3">
                                {{$course->Describe}}
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