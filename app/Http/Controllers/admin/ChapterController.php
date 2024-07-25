<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\chapter_post;
use Illuminate\Http\Request;

use App\Service\courseService;
use App\Service\chapterService;

class ChapterController extends Controller
{
    public $courseService;
    public $chapterService;
    public function __construct()
    {
        $this->courseService = new courseService;
        $this->chapterService = new chapterService;
    }
    public function chapter(){
        $title = 'Chương';
        $chapter_list = $this->chapterService->Chapter_Get();
        return view('admin.chapter',compact('title','chapter_list'));
    }
    public function chapter_add(){
        $title = 'Thêm chương';
        $course_list = $this->courseService->Course_Get('desc');
        // dd($course_list);
        return view('admin.chapter_add',compact('title','course_list'));
    }
    public function chapter_create(chapter_post $request){
        $this->chapterService->Chapter_Create($request->Title,$request->STT,$request->Hide,$request->Id_Course);
        return redirect()->route('admin.chapter.read');
    }
    public function chapter_edit($id){
        $title = 'Thêm chương';
        $chapter = $this->chapterService->Chapter_GetById($id);
        $course_list = $this->courseService->Course_Get('desc');
        return view('admin.chapter_edit',compact('title','course_list','chapter'));
    }
    public function chapter_update(chapter_post $request,$id){
        $this->chapterService->Chapter_Update($request->Title,$request->STT,$request->Hide,$request->Id_Course,$id);
        return redirect()->route('admin.chapter.read');
    }
    public function chapter_delete($id){
        $this->chapterService->Chapter_Delete($id);
        return redirect()->route('admin.chapter.read');
    }
}
