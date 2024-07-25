@extends('admin.layout.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="border">
        <div class="p-3 d-flex justify-content-between align-items-center bg-white">
            <div class="d-flex gap-2">
                <div class="overflow-hidden" style="height: 50px; width: 50px">
                    <img class="w-100" src="{{asset('uploads/products/'.$product->Image)}}" alt="">
                </div>  
                <div>
                    <div class="fw-semibold">{{$product->Name}}</div>
                    <div class="fs-6 text-danger">{{number_format($product->Price,2,',','.')}}đ</div>
                </div>
            </div>
        </div>
        <div class="p-4 overflow-y-auto" style="background-color: #d5d5d5; height: 400px">
            @foreach ($data_product_comment as $item)
            {{-- Từng dòng chat --}}
            <div class="d-flex mb-3 {{($item->user_role == 1)?'justify-content-end':''}}">
                <div class="d-flex gap-2 {{($item->user_role == 1)?'flex-row-reverse':''}}">
                    <div class="overflow-hidden rounded-circle bg-white border" style="height: 45px; width: 45px">
                        <img class="w-100" src="{{asset('uploads/users/'.$item->user_avatar)}}" alt="">
                    </div>
                    <div class="h-auto" style="max-width: 350px">
                        <p class="p-1 px-2 bg-white rounded-3 m-0">{{$item->Content}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="bg-white">
            <form class="d-flex gap-2 align-items-center p-2" action="{{route('comment_product',['id'=>$product->Id_Product])}}" method="post">
                @csrf
                <input type="text" name="comment" class="form-control flex-grow-1" placeholder="Phản hồi...">
                <button class="btn btn-primary" type="submit">Gửi</button>
            </form>
        </div>
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