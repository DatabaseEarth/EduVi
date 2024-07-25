<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    use HasFactory;
    protected $table = 'lesson'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Lesson'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected $attributes = [ // khai báo các giá trị mặc định
        'STT'=>1,
        'Hide'=>1,
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Title',
        'Id_Chapter',
        'Describe',
        'Video_Lesson',
        'STT',
        'Hide', 
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
    public function chapter(){
        return $this->belongsTo(chapter::class,'Id_Chapter');
    }
}
