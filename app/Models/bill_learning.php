<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_learning extends Model
{
    use HasFactory;
    protected $table = 'bill_learning'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Learning'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected $attributes = [ // khai báo các giá trị mặc định
        'Status'=>'dang-hoc',
        'Total'=>0
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Id_User',
        'Id_course',
        'Status',
        'Total'
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
    public function course(){
        return $this->belongsTo(course::class,'Id_Course');
    }
    public function user(){
        return $this->belongsTo(User::class,'Id_User');
    }
}
