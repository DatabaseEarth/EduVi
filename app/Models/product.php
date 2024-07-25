<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    use HasFactory;
    protected $table = 'product'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Product'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected  $attributes = [ // khai báo các giá trị mặc định
        'Hide'=>1,
        'Hot'=>0
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Name',
        'Price',
        'Image',
        'Describe',
        'Hide',
        'View',
        'Hot',
        'Quantity',
        'Id_Category'
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
    // ====================================================================================
    public function category()
    {
        return $this->belongsTo(Category::class, 'Id_Category');
    }
    public function carts(){
        return $this->hasMany(cart::class,'Id_Product');
    }
    public function comments(){
        return $this->hasMany(comment::class,'Id_Comment');
    }
    
}
