<?php

namespace App\Service;

use App\Models\course;
use Illuminate\Support\Facades\Auth;

class courseService
{
    public function Course_GetById($id){
        $query_builder = course::with('bill_learning','chapters','chapters.lessons')
        ->where('Id_Course','=',$id)->first();
        return $query_builder;
    }
    public function deleteOldImage($imageName)
    {
        if (file_exists(public_path('uploads/courses') . '/' . $imageName)) {
            unlink(public_path('uploads/courses') . '/' . $imageName);
        }
    }
    public function saveImage($request)
    {
        $image = $request->file('Image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/courses'), $imageName);
        return $imageName;
    }
    public function Course_Create($Title,$Describe,$Price,$Image,$Hide,$Request,$Achievement,$Pro,$Video_Intro){
        $query_builder = course::create([
            'Title'=>$Title,
            'Describe'=>$Describe,
            'Price'=>$Price,
            'Image'=>$Image,
            'Hide'=>$Hide,
            'Request'=>$Request,
            'Achievement'=>$Achievement,
            'Pro'=>$Pro,
            'Video_Intro'=>$Video_Intro,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Course_Update($Title,$Describe,$Price,$Image,$Hide,$Request,$Achievement,$Pro,$Video_Intro,$id){
        $query_builder = course::where('Id_Course','=',$id)
        ->update([
            'Title'=>$Title,
            'Describe'=>$Describe,
            'Price'=>$Price,
            'Image'=>$Image,
            'Hide'=>$Hide,
            'Request'=>$Request,
            'Achievement'=>$Achievement,
            'Pro'=>$Pro,
            'Video_Intro'=>$Video_Intro,
            'updated_at'=>now(),
        ]);
        return $query_builder;
    }
    public function Course_Delete($id){
        $query_builder = course::where('Id_Course', $id)
        ->delete();
        return $query_builder;
    }
    public function Course_GetAll($desc_asc,$page){
        $query_builder = course::orderBy('Id_Course',$desc_asc)
        ->with('chapters')
        ->paginate($page);
        return $query_builder;
    }
    public function Course_Get($desc_asc){
        $query_builder = course::orderBy('Id_Course',$desc_asc)
        ->get();
        return $query_builder;
    }
    public function Course_GetPro($user,$desc_asc,$page){
        $query_builder = course::where('pro', '=', 1)
        ->orderBy('Id_Course', $desc_asc);
        
        if ($user > 0 && Auth::check()) {
            $query_builder->with('bill_learning');
        }

        $course_pro = $query_builder->limit($page)->get();
        return $course_pro;
    }
}
