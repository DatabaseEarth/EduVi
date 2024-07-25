<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 20; $i++) { 
            DB::table('product')->insert([
                'Name'=>'front-end '.$i,
                'Price'=>1234563,
                'Image'=>'sach-khoa-1 ('.rand(1,4).').jpg',
                'Describe'=>'Mô tả sách sản phẩm thứ '.$i,
                'Hide'=>1,
                'View'=>rand(0,1000),
                'Hot'=>rand(0,1),
                'Quantity'=>rand(1,300),
                'Id_Category'=>rand(5,8),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
