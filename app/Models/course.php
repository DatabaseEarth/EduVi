<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $table = 'course'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Course'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected  $attributes = [ // khai báo các giá trị mặc định
        'Price'=>0,
        // 'Image',
        'Hide'=>1,
        'View'=>1,
        'Request'=>null,
        'Achievement'=>null,
        'Pro'=>0,
        'Video_Intro'=>null,
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Title',
        'Describe',
        'Price',
        'Image',
        'Hide',
        'View',
        'Request',
        'Achievement',
        'Pro',
        'Video_Intro',
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
    public function chapters(){
        return $this->hasMany(chapter::class,'Id_Course');
    }
    public function bill_learning(){
        return $this->hasMany(bill_learning::class,'Id_Course');
    }
}
