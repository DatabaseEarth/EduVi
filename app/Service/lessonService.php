<?php

namespace App\Service;

use App\Models\lesson;

class lessonService
{
    public function Lesson_GetById($id){
        $query_builder = lesson::where('Id_Lesson','=',$id)->first();
        return $query_builder;
    }
    public function Lesson_Get($desc_asc, $page){
        $query_builder = lesson::join('chapter', 'lesson.Id_Chapter', '=', 'chapter.Id_Chapter')
            ->join('course', 'chapter.Id_Course', '=', 'course.Id_Course')
            ->where('lesson.Hide', '=', 1)
            ->select('lesson.*', 'chapter.Title as chapter_title', 'course.Title as course_title')
            ->orderBy('lesson.Id_Lesson', $desc_asc)
            ->paginate($page);
        return $query_builder;
    }
    public function Lesson_GetShow($desc_asc){
        $query_builder = lesson::where('Hide','=',1)
        ->orderBy('Id_Lesson',$desc_asc)
        ->get();
        return $query_builder;
    }
    public function Lesson_Create($Title,$Id_Chapter,$Describe,$Video_Lesson,$STT,$Hide){
        $query_builder = lesson::create([
            'Title'=>$Title,
            'Id_Chapter'=>$Id_Chapter,
            'Describe'=>$Describe,
            'Video_Lesson'=>$Video_Lesson,
            'STT'=>$STT,
            'Hide'=>$Hide,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Lesson_Update($Title,$Id_Chapter,$Describe,$Video_Lesson,$STT,$Hide,$id){
        $query_builder = lesson::where('Id_Lesson','=',$id)
        ->update([
            'Title'=>$Title,
            'Id_Chapter'=>$Id_Chapter,
            'Describe'=>$Describe,
            'Video_Lesson'=>$Video_Lesson,
            'STT'=>$STT,
            'Hide'=>$Hide,
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
}
