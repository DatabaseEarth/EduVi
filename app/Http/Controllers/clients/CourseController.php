<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\courseService;
use App\Service\chapterService;
use App\Service\lessonService;

class CourseController extends Controller
{
    public $courseService;
    public $chapterService;
    public $lessonService;
    public function __construct()
    {
        $this->courseService = new courseService;
        $this->chapterService = new chapterService;
        $this->lessonService = new lessonService;
    }
    public function course($id)
    {
        $title = 'Khóa học';
        $course = $this->courseService->Course_GetById($id);
        $chapter = $this->chapterService->Chapter_GetByCourse($id);
        $lesson = $this->lessonService->Lesson_GetShow('desc');
        return view('clients.courses', compact('title','course','chapter','lesson'));
    }
    public function lesson($course,$lesson=null)
    {
        $course = $this->courseService->Course_GetById($course);
        if ($lesson) {
            $lesson_detail = $this->lessonService->Lesson_GetById($lesson);
        } else {
            $lesson_detail = $course->chapters->first()->lessons->first();
        }
        
        $title = $course->Title;
        // dd($course);
        return view('clients.lessons', compact('title','course','lesson_detail'));
    }
    public function my_course(){
        $title = 'Khóa học của tôi';
        return view('clients.my_course',compact('title'));
    }
}
