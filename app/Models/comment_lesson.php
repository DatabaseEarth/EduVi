<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_lesson extends Model
{
    use HasFactory;
    protected $table = 'comment_lesson'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Comment_lesson'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected $attributes = [ // khai báo các giá trị mặc định
        
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Content',
        'Id_User',
        'Id_Lesson',
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
}
