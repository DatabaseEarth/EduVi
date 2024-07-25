@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Sản phẩm được bình luận</h3>
    </div>
    <div class="mt-3 rounded-2">
        <div class="row">
            @foreach ($comment_product as $item)
                <div class="col-lg-2 mb-4">
                <a href="{{route('admin.comment.feedback',['id'=>$item->Id_Product])}}" class="bg-white d-block text-decoration-none text- p-2 rounded-3 border position-relative">
                    <img class="w-100 mb-2 rounded-3" src="{{asset('assets/images/'.$item->Image)}}" alt="">
                    <div class="fs-6 fw-semibold overflow-hidden" style="height: 24px">{{$item->Name}}</div>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{$item->so_luong}}
                    <span class="visually-hidden">unread messages</span>
                </a>
            </div>

            @endforeach
            
        </div>
        <section class="mt-3">
            {{-- {{$comment_product->links()}} --}}
        </section>
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