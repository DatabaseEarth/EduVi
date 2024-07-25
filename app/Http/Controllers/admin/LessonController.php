<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\lesson_post;
use Illuminate\Http\Request;

use App\Service\chapterService;
use App\Service\lessonService;

class LessonController extends Controller
{
    public $chapterService;
    public $lessonService;
    public function __construct()
    {
        $this->chapterService = new chapterService;
        $this->lessonService = new lessonService;
    }
    
    public function lesson(){
        $title = 'Bài học';
        $lesson_list = $this->lessonService->Lesson_Get('desc',10);
        return view('admin.lesson',compact('title','lesson_list'));
    }
    public function lesson_add(){
        $title = 'Thêm bài học';
        $chapter_list = $this->chapterService->Chapter_GetAll();
        return view('admin.lesson_add',compact('title','chapter_list'));
    }
    public function lesson_create(lesson_post $request){
        $this->lessonService->Lesson_Create($request->Title,$request->Id_Chapter,$request->Describe,$request->Video_Lesson,$request->STT,$request->Hide);
        return redirect()->route('admin.lesson.read');
    }
    public function lesson_edit($id){
        $title = 'Thêm bài học';
        $chapter_list = $this->chapterService->Chapter_GetAll();
        $lesson = $this->lessonService->Lesson_GetById($id);
        return view('admin.lesson_edit',compact('title','lesson','chapter_list'));
    }
    public function lesson_update(lesson_post $request,$id){
        $this->lessonService->Lesson_Update($request->Title,$request->Id_Chapter,$request->Describe,$request->Video_Lesson,$request->STT,$request->Hide,$id);
        return redirect()->route('admin.lesson.read');
    }
}
