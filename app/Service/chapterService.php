<?php

namespace App\Service;

use App\Models\chapter;

class chapterService
{
    public function Chapter_GetById($id){
        $query_builder = chapter::where('Id_Chapter','=',$id)->first();
        return $query_builder;
    }
    public function Chapter_Create($Title,$STT,$Hide,$Id_Course){
        $query_builder = chapter::create([
            'Title'=>$Title,
            'Id_Course'=>$Id_Course,
            'STT'=>$STT,
            'Hide'=>$Hide,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Chapter_Update($Title,$STT,$Hide,$Id_Course,$id){
        $query_builder = chapter::where('Id_Chapter','=',$id)
        ->update([
            'Title'=>$Title,
            'Id_Course'=>$Id_Course,
            'STT'=>$STT,
            'Hide'=>$Hide,
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Chapter_Delete($id){
        $query_builder = chapter::where('Id_Chapter','=',$id)
        ->delete();
        return $query_builder;
    }
    public function Chapter_Get(){
        $query_builder = chapter::join('course', 'chapter.Id_Course', '=', 'course.Id_Course')
        ->select('chapter.*', 'course.Title as course_title')
        ->where('chapter.Hide','=',1)
        ->orderBy('course.Title') // Sắp xếp theo khóa học để dễ nhìn
        ->orderBy('Id_Chapter','desc')
        ->paginate(10);
        return $query_builder;
    }
    public function Chapter_GetAll(){
        $query_builder = chapter::select('*')
        ->orderBy('Id_Chapter','desc')
        ->get();
        return $query_builder;
    }
    public function Chapter_GetByCourse($id){
        $query_builder = chapter::where('Id_Course','=',$id)
        ->get();
        return $query_builder;
    }
}
