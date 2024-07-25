@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Thêm Chương</h3>
    </div>
    <div class="mt-3 rounded-2 overflow-hidden">
        <form action="{{route('admin.chapter.create_post')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="bg-white p-3 rounded-3">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Tiêu đề</label>
                            <input type="text" name="Title" value="{{old('Title')}}" class="form-control" id="" placeholder="Tiêu đề chương">
                            @error('Title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Khóa học</label>
                            <select class="form-select" name="Id_Course" aria-label="Default select example">
                                <option value="">Chọn khóa học</option>
                                @foreach ($course_list as $item)
                                <option value="{{$item->Id_Course}}">{{$item->Title}}</option>
                                @endforeach
                            </select>
                            @error('Id_Course')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Số thứ tự</label>
                            <input type="number" name="STT" value="{{old('STT')}}" class="form-control" id="" placeholder="STT">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Trạng thái</label>
                            <select class="form-select" name="Hide" aria-label="Default select example">
                                <option value="1" {{(old('Hide')==1)?'selected':''}}>Hiện</option>
                                <option value="0" {{(old('Hide')==0)?'selected':''}}>Ẩn</option>
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm chương</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <style>
        /* .ck-editor__editable_inline {
            min-height: 200px;
            max-height: 450px;
        } */
    </style>
@endsection
@section('script')

<script src="{{asset('assets/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"></script>
    <script>
        /*
        ClassicEditor
            .create( document.querySelector( '#mota' ),{language: 'vi'} )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        */
    </script>
@endsection