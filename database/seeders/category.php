<?php

namespace Database\Seeders;

// use Faker\Factory as Faker;

// use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // khai báo để theo tác với csdl

// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;

class category extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
    
        // $faker = Faker::create();
        // for ($i=1; $i < 5; $i++) { 
        //     DB::table('category')->insert([
        //         'Name'=>'front-end '.$i,
        //         'Hide'=>1,
        //         'Describe'=>'Chu cha nhiều sách quá dị sách loại '.$i,
        //         'Image'=>'khoa-'.rand(1,4).'.png',
        //         'created_at'=>now(),
        //         'updated_at'=>now()
        //     ]);
        // }
    }
}
