<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert([
            'name' => 'huda',
            'email' => 'huda@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
         DB::table('users')->insert([
            'name' => 'suad',
            'email' => 'suad@gmail.com',
            'password' => bcrypt('secret1'),
        ]);
        
        
        DB::table('interesting_fields')->insert([
            'field_name' => 'web',
            'image_name' => 'web.jpg',
            'description'=> 'you will recieve questions about everything related to web programming and development'
        ]);
        
        DB::table('interesting_fields')->insert([
            'field_name' => 'mobile',
            'image_name' => 'mobile.jpg',
            'description'=> 'you will recieve questions about everything related to mobiles'
        ]);
        /*
        DB::table('interesting_fields')->insert([
            'field_name' => 'software development',
            'image_name' => 'sw.jpg',
            'description'=> 'you will recieve questions about everything related to software'
        ]);
        */
        DB::table('interesting_fields')->insert([
            'field_name' => 'network',
            'image_name' => 'nw.jpg',
            'description'=> 'you will recieve questions about everything related to networks'
        ]);
        
        DB::table('interesting_fields')->insert([
            'field_name' => 'science',
            'image_name' => 'science.jpg',
            'description'=> 'you will recieve questions about everything related to all types of science'
        ]);
        
         DB::table('interesting_fields')->insert([
            'field_name' => 'design',
            'image_name' => 'design.jpg',
            'description'=> 'you will recieve questions about everything related to designing process'
        ]);
        
         DB::table('interesting_fields')->insert([
            'field_name' => 'medical',
            'image_name' => 'medical.jpg',
            'description'=> 'you will recieve questions about everything related to medical'
        ]);
        
         DB::table('interesting_fields')->insert([
            'field_name' => 'accounting',
            'image_name' => 'accounting.jpg',
            'description'=> 'you will recieve questions about everything related to accounting'
        ]);
        
         DB::table('interesting_fields')->insert([
            'field_name' => 'maths',
            'image_name' => 'maths.jpg',
            'description'=> 'you will recieve questions about everything related to maths'
        ]);
        
         DB::table('interesting_fields')->insert([
            'field_name' => 'english & translating',
            'image_name' => 'e&t.jpg',
            'description'=> 'you will recieve questions about everything related to english & translating'
        ]);
        
        
        
        
        
        
        
    }
}
