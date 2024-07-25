@extends('clients.layout.layout_lesson')

@section('title')
    {{$title}}
@endsection
@section('video')
    <iframe width="100%" height="500px"
    src="{{$lesson_detail->Video_Lesson}}" title="YouTube video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <section class="p-4 bg-white">
        {!!$lesson_detail->Describe!!}
    </section>
@endsection

@section('lesson_count')
    @php
        $totalLessons = 0;
        foreach ($course->chapters as $chapter) {
            $totalLessons += $chapter->lessons->count();
        }
        echo $totalLessons;
    @endphp
@endsection
    
@section('navbar-menu')
    @foreach ($course->chapters as $chapters)
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-semibold overflow-hidden"
                style="height: 52px" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-{{$chapters->Id_Chapter}}" aria-expanded="false"
                aria-controls="panelsStayOpen-{{$chapters->Id_Chapter}}">
                {{$chapters->Title}} 
            </button>
        </h2>
        <div id="panelsStayOpen-{{$chapters->Id_Chapter}}" class="accordion-collapse collapse">
            <div class="border">
                <ul class="list-unstyled m-0">
                    
                    @foreach ($chapters->lessons as $lessons)
                    <li>
                        <a href="{{route('lesson',['course'=>$course->Id_Course,'lesson'=>$lessons->Id_Lesson])}}" 
                            class="py-2 px-4 border-top text-decoration-none text-secondary d-block text-truncate hover"
                            style="">
                            {{$lessons->Title}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('css')
    <style>
    
    </style>
@endsection
@section('script')
    <script>

    </script>
@endsection
