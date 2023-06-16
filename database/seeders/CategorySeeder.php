<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //SQL: insert into catgories()
        for($i = 1 ; $i<= 10 ; $i++){
            DB::table('catecories')->insert([
                'name'=>'category' . $i ,
                'created_at' => now(),
            ]);

        }
    }
}
