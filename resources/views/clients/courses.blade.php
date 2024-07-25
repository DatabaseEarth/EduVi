@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
<div class="container-xxl">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="fw-bold">{{$course->Title}}</h2>
            <div class="mb-4" style="font-size: 14px;">
                {!!$course->Describe!!}
            </div>
            <div class="mb-3">
                <div class="fw-bold fs-5 mb-3">
                    Bạn sẽ học được gì?
                </div>
                {{-- <div class="row">
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="d-flex gap-1 mb-2">
                                <div class="text-danger me-2"><i class="fa-solid fa-check"></i></div>
                                <div class="" style="font-size: 14px;">
                                    Được học kiến thức miễn phí với nội
                                    dung chất lượng hơn mất phí
                                </div>
                            </li>
                            <li class="d-flex gap-1 mb-2">
                                <div class="text-danger me-2"><i class="fa-solid fa-check"></i></div>
                                <div class="" style="font-size: 14px;">
                                    Hiểu được cách tư duy nâng cao của các lập trình viên có kinh nghiệm
                                </div>
                            </li>
                            <li class="d-flex gap-1 mb-2">
                                <div class="text-danger me-2"><i class="fa-solid fa-check"></i></div>
                                <div class="" style="font-size: 14px;">
                                    Có nền tảng Javascript vững chắc để làm việc với mọi thư viện, framework
                                    viết bởi Javascript
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="d-flex gap-1 mb-2">
                                <div class="text-danger me-2"><i class="fa-solid fa-check"></i></div>
                                <div class="" style="font-size: 14px;">
                                    Được học kiến thức miễn phí với nội
                                    dung chất lượng hơn mất phí
                                </div>
                            </li>
                            <li class="d-flex gap-1 mb-2">
                                <div class="text-danger me-2"><i class="fa-solid fa-check"></i></div>
                                <div class="" style="font-size: 14px;">
                                    Hiểu được cách tư duy nâng cao của các lập trình viên có kinh nghiệm
                                </div>
                            </li>
                            <li class="d-flex gap-1 mb-2">
                                <div class="text-danger me-2"><i class="fa-solid fa-check"></i></div>
                                <div class="" style="font-size: 14px;">
                                    Có nền tảng Javascript vững chắc để làm việc với mọi thư viện, framework
                                    viết bởi Javascript
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                {{-- ============================= --}}
                <div>
                    {!!$course->Achievement!!}
                </div>
                {{-- ============================= --}}
            </div>
            <div class="position-sticky" style="top: 115px;">
                <div class="fw-bold fs-5 mb-3">
                    Nội dung khóa học
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <ul class="list-unstyled d-flex gap-2 mb-0">
                        <li>
                            <span class="fw-semibold">{{$chapter->count()}}</span> chương
                        </li>
                        <li>
                            &bull;
                            <span class="fw-semibold">{{$lesson->count()}}</span> bài học
                        </li>
                        {{-- <li>
                            &bull;
                            Thời lượng <span class="fw-semibold">08 giờ 47 phút</span>
                        </li> --}}
                    </ul>
                    <a href="#" class="text-danger text-decoration-none fw-semibold">Mở rộng tất cả</a>
                </div>
                <div>
                    <div class="accordion accordion-flush border" id="accordionPanelsStayOpenExample">
                        @php
                            $index=0;
                        @endphp
                        @foreach ($chapter as $chapter_item)
                            <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-{{$chapter_item->Id_Chapter}}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="panelsStayOpen-{{$chapter_item->Id_Chapter}}">
                                    {{$chapter_item->Title}}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-{{$chapter_item->Id_Chapter}}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}">
                                <div class="border">
                                    <ul class="list-unstyled m-0">
                                        @foreach ($lesson as $lesson_item)
                                        @if ($chapter_item->Id_Chapter == $lesson_item->Id_Chapter)
                                        <li class="py-2 px-4 border-top text-secondary">
                                            {{$lesson_item->Title}}
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="d-none">{{$index++}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="mb-3 position-sticky" style="top: 115px;">
                <iframe class="w-100 rounded-4" style="min-height: 240px;"
                    src="{{$course->Video_Intro}}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h2 class="text-danger fw-normal text-center mb-3">
                        @if ($course->bill_learning->first() && $course->bill_learning->first()->Status == 'dang-hoc')
                            @if ($course->Pro == 1)
                            {{number_format($course->Price,2,',','.')}}đ
                            @else
                                Khóa học miễn phí
                            @endif
                        @endif
                    
                    </h2>
                    
                    @if ($course->Pro == 1)
                    <a href="{{route('lesson',['course'=>$course->Id_Course])}}" class="btn btn-danger rounded-5 px-4 py-2 mb-3">Đăng ký ngay</a>
                    @else
                    <a class="btn btn-danger rounded-5 px-4 py-2 mb-3">Đăng ký ngay</a>
                    @endif

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fa-solid fa-gauge-high"></i>
                            <span class="ms-2" style="font-size: 14px;">Trình độ trung bình</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-film"></i>
                            <span class="ms-2" style="font-size: 14px;">Tổng số {{$lesson->count()}} bài học</span>
                        </li>
                        {{-- <li class="mb-2">
                            <i class="fa-solid fa-clock"></i>
                            <span class="ms-2" style="font-size: 14px;">Thời lượng 08 giờ 47 phút</span>
                        </li> --}}
                        <li class="mb-2">
                            <i class="fa-solid fa-battery-full"></i>
                            <span class="ms-2" style="font-size: 14px;">Học mọi lúc, mọi nơi</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>

    </style>
@endsection
@section('script')
    <script>

    </script>
@endsection
