<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cart extends Model
{
    use HasFactory;
    protected $table = 'cart'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Cart'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected  $attributes = [ // khai báo các giá trị mặc định
        'Quantity'=>1,
        'Total'=>0
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Id_Product',
        'Id_Bill',
        'Price_Product',
        'Name_Product',
        'Image_Product',
        'Quantity',
        'Total',
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
    // ====================================================================================
    public function product(){
        return $this->belongsTo(product::class,'Id_Product');
    }
    public function bill(){
        return $this->belongsTo(bill::class,'Id_Bill');
    }
    
    
}