<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bill extends Model
{
    use HasFactory;
    protected $table = 'bill'; // khai báo tên bảng, nếu tên bảng trùng với tên file model thì có không cần
    public $primaryKey = 'Id_Bill'; // khai báo khóa chinh, nếu tên khóa là id thì sẽ là mặc định
    public $incrementing = true; // nếu không phải là số thì để false
    public $timestamps = true; // khai báo khi sử dụng created_at và updated_at
    protected  $attributes = [ // khai báo các giá trị mặc định
        'Name_Orderer'=>null,
        'Email_Orderer'=>null,
        'Phone_Orderer'=>null,
        'Address_Orderer'=>null,
        'Name_recipient'=>null,
        'Total'=>0,
        'Ship'=>0,
        'Voucher'=>null,
        'Total_Payment'=>0,
        'Status'=>'gio-hang',
    ];
    protected $fillable = [ // khai báo các trường mặc định cho table
        'Id_User',
        'Name_Orderer',
        'Email_Orderer',
        'Phone_Orderer',
        'Address_Orderer',
        'Name_recipient',
        'Total',
        'Ship',
        'Voucher',
        'Total_Payment',
        'Status',
    ];
    // protected $dates = ['ngay_gio']  // dùng để khai báo các trường có kiểu ngày giờ
    // ====================================================================================
    public function carts(){
        return $this->hasMany(cart::class,'Id_Bill');
    }
    public function user(){
        return $this->belongsTo(User::class,'Id_User');
    }
}
