<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\course_post;
use App\Http\Requests\course_put;
use Illuminate\Http\Request;

use App\Service\courseService;

class CourseController extends Controller
{
    public $courseService;
    public function __construct()
    {
        $this->courseService = new courseService;
    }
    public function course(){
        $title = 'Khóa học';
        $course_list = $this->courseService->Course_GetAll('desc',4);
        return view('admin.course',compact('title','course_list'));
    }
    public function course_chapter($id){
        $title = 'Khóa học | chương';
        $course_chapter = $this->courseService->Course_GetById($id);
        return view('admin.course_chapter',compact('title','course_chapter'));
    }
    public function course_add(){
        $title = 'Tạo khóa học';
        return view('admin.course_add',compact('title'));
    }
    public function course_create(course_post $request){

        // Xử lý lưu file ảnh
        $imageName = $this->courseService->saveImage($request);
        $kq = $this->courseService->Course_Create($request->Title,$request->Describe,$request->Price,$imageName,$request->Hide,$request->Request,$request->Achievement,$request->Pro,$request->Video_Intro);
        if ($kq) {
            return redirect()->route('admin.course.read');
        }else{
            echo 'Bug tới Bug tới!';
        }
    }
    public function course_edit($id){
        $title = 'Sửa khóa học';
        $course = $this->courseService->Course_GetById($id);

        // dd($course);
        return view('admin.course_edit',compact('title','course'));
    }
    public function course_update(course_put $request,$id){
        $course_detail = $this->courseService->Course_GetById($id);
        $imageName = $course_detail->Image;
        // Kiểm tra và xóa file ảnh cũ
        if ($request->hasFile('Image') && $imageName) {
            $this->courseService->deleteOldImage($imageName);
        }
        // Xử lý lưu file ảnh
        if ($request->hasFile('Image')){
            $imageName = $this->courseService->saveImage($request);
        }
        $kq = $this->courseService->course_update($request->Title,$request->Describe,$request->Price,$imageName,$request->Hide,$request->Request,$request->Achievement,$request->Pro,$request->Video_Intro,$id);
        if ($kq) {
            return redirect()->route('admin.course.read');
        }else{
            echo 'Bug tới Bug tới!';
        }
    }
    public function course_delete($id){
        $course_detail = $this->courseService->Course_GetById($id);
        $imageName = $course_detail->Image;
        // Kiểm tra và xóa file ảnh cũ
        if ($imageName) {
            $this->courseService->deleteOldImage($imageName);
        }
        $this->courseService->Course_Delete($id);
        return redirect()->route('admin.course.read');
    }
}
