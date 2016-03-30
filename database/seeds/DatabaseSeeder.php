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
            'field_name' => 'Computer Engineering',
          //  'image_name' => 'web.jpg',
            //'description'=> 'you will recieve questions about everything related to web programming and development'
        ]);

        DB::table('interesting_fields')->insert([
            'field_name' => 'Medicine and Healthcare',
            //'image_name' => 'mobile.jpg',
          //  'description'=> 'you will recieve questions about everything related to mobiles'
        ]);

        DB::table('interesting_fields')->insert([
            'field_name' => 'Books and Writing',
          //  'image_name' => 'sw.jpg',
        //    'description'=> 'you will recieve questions about everything related to software'
        ]);

        DB::table('interesting_fields')->insert([
            'field_name' => 'Healthy Eating & Food',
          //  'image_name' => 'nw.jpg',
          //  'description'=> 'you will recieve questions about everything related to networks'
        ]);

        DB::table('interesting_fields')->insert([
            'field_name' => 'Electrical Engineering',
            //'image_name' => 'science.jpg',
            //'description'=> 'you will recieve questions about everything related to all types of science'
        ]);

         DB::table('interesting_fields')->insert([
            'field_name' => 'Economics',
          //  'image_name' => 'design.jpg',
          //  'description'=> 'you will recieve questions about everything related to designing process'
        ]);

         DB::table('interesting_fields')->insert([
            'field_name' => 'Movies',
          //  'image_name' => 'medical.jpg',
          //  'description'=> 'you will recieve questions about everything related to medical'
        ]);

         DB::table('interesting_fields')->insert([
            'field_name' => 'Fashion and Style',
          //  'image_name' => 'accounting.jpg',
        //    'description'=> 'you will recieve questions about everything related to accounting'
        ]);

         DB::table('interesting_fields')->insert([
            'field_name' => 'General Knowledge',
          //  'image_name' => 'maths.jpg',
          //  'description'=> 'you will recieve questions about everything related to maths'
        ]);

         DB::table('interesting_fields')->insert([
            'field_name' => 'Law',
          //  'image_name' => 'e&t.jpg',
          //  'description'=> 'you will recieve questions about everything related to english & translating'
        ]);

        DB::table('interesting_fields')->insert([
           'field_name' => 'Psychology',
          // 'image_name' => 'e&t.jpg',
          // 'description'=> 'you will recieve questions about everything related to english & translating'
       ]);

       DB::table('interesting_fields')->insert([
          'field_name' => 'Physics',
        //  'image_name' => 'e&t.jpg',
          //'description'=> 'you will recieve questions about everything related to english & translating'
      ]);

      DB::table('interesting_fields')->insert([
         'field_name' => 'Maths',
        // 'image_name' => 'e&t.jpg',
        // 'description'=> 'you will recieve questions about everything related to english & translating'
      ]);
      DB::table('interesting_fields')->insert([
         'field_name' => 'Education',
      //   'image_name' => 'e&t.jpg',
        // 'description'=> 'you will recieve questions about everything related to english & translating'
      ]);

      DB::table('interesting_fields')->insert([
         'field_name' => 'Visiting and Travel',
         //'image_name' => 'e&t.jpg',
         //'description'=> 'you will recieve questions about everything related to english & translating'
     ]);

     DB::table('interesting_fields')->insert([
        'field_name' => 'Business',
      //  'image_name' => 'e&t.jpg',
        //'description'=> 'you will recieve questions about everything related to english & translating'
    ]);










    }
}
