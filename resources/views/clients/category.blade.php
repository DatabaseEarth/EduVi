@extends('clients.layout.layout')

@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="container">
        <div class="my-4">

            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="accordion border accordion-flush z-0 position-sticky start-0 end-0" id="accordionPanelsStayOpenExample" style="top: 100px">
                        <div class="accordion-item z-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed z-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                    Các khóa học web basic
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body p-2">
                                    <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                                        <li>
                                            <a href="#" class="d-flex gap-2 text-decoration-none text-dark">
                                                <div class="overflow-hidden rounded-3" style="width: 100px;">
                                                    <img class="w-100 rounded-3" src="{{asset('assets/images/khoa-1.png')}}"
                                                        alt="">
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold overflow-hidden" style="height: 24px;">
                                                        HTML & CSS từ cơ bản đến nâng cao
                                                    </div>
                                                    <div class="fw-semibold text-danger overflow-hidden"
                                                        style="height: 24px; font-size: 14px;">
                                                        1.222.000đ
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex gap-2 text-decoration-none text-dark">
                                                <div class="overflow-hidden rounded-3" style="width: 100px;">
                                                    <img class="w-100 rounded-3" src="{{asset('assets/images/khoa-1.png')}}"
                                                        alt="">
                                                </div>
                                                <div class="">
                                                    <div class="fw-semibold overflow-hidden" style="height: 24px;">
                                                        HTML & CSS từ cơ bản đến nâng cao
                                                    </div>
                                                    <div class="fw-semibold text-danger overflow-hidden"
                                                        style="height: 24px; font-size: 14px;">
                                                        1.222.000đ
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item z-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed z-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is
                                    intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                    second item's accordion body. Let's imagine this being filled with some actual
                                    content.</div>
                            </div>
                        </div>
                        <div class="accordion-item z-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed z-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is
                                    intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                    third item's accordion body. Nothing more exciting happening here in terms of
                                    content, but just filling up the space to make it look, at least at first
                                    glance, a bit more representative of how this would look in a real-world
                                    application.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Các bộ sách lập trình</h3>
                        <form action="{{ route('category_detail', ['id' => $Id_Category]) }}" method="GET" class="z-0">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm...">
                                <select class="form-control" name="filter" id="sort">
                                    <option value="1">Giá giảm dần</option>
                                    <option value="2">Giá tăng dần</option>
                                </select>
                                <button class="btn text-end text-white" style="background-color: #F48C06" type="submit">Lọc</button>
                            </div>
                        </form>
                    </div>
                    <section class="container-xxl mb-4">
                        <div class="row">
                            @foreach ($product_ByDM as $item)
                                <div class="col-lg-3 mb-3">
                                <a href="#" class="d-block text-decoration-none text-dark product_hover">
                                    <div class="overflow-hidden rounded-3 mb-2">
                                        <img class="w-100" src="{{asset('assets/images/'.$item->Image)}}" alt="">
                                    </div>
                                    <div class="fw-semibold fs-5">
                                        {{$item->Name}}
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="text-secondary fs-6">{{number_format($item->Price,2,',','.')}}đ</p>
                                        <p class="text-danger fs-6 fw-semibold">{{number_format($item->Price,2,',','.')}}đ</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div>
                            {{ $product_ByDM->links() }}
                        </div>
                    </section>
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
