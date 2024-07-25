<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class category extends Model
{
    use HasFactory;
    protected $table = 'category'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Category'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected  $attributes = [ // khai báo các giá trị mặc định
        'Hide'=>1
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Name',
        'Hide',
        'Describe',
        'Image',
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
    public function products()
    {
        return $this->hasMany(product::class, 'Id_Category');
    }
    // ====================================================================================
}
