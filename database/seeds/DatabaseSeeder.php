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
      'name' => 'Ruba',
      'email' => 'ruba@gmail.com',
      'password' => bcrypt('123456'),
      'setup_count' => 3,
      'is_admin' => 1
    ]);

    DB::table('profiles_info')->insert([
      'first_name' => 'Ruba',
      'last_name' => 'Jumaa',
      'sex' => 'female',
      'date_of_birth' => '29-3-1994',
      'country' => 'Palestine',
      'city' => 'Jenin',
      'address' => 'Rama',
      'birth_place' => 'Jenin',
      'user_id' => 1
    ]);
    //
    DB::table('users')->insert([
      'name' => 'Marwan',
      'email' => 'marwan@gmail.com',
      'password' => bcrypt('123456'),
      'setup_count' => 3,
      'is_admin' => 0
    ]);

    DB::table('profiles_info')->insert([
      'first_name' => 'Marwan',
      'last_name' => 'Jumaa',
      'sex' => 'male',
      'date_of_birth' => '21-5-1996',
      'country' => 'Palestine',
      'city' => 'Jenin',
      'address' => 'Rama',
      'birth_place' => 'Jenin',
      'user_id' => 2
    ]);
    //
    DB::table('users')->insert([
      'name' => 'Feras',
      'email' => 'Feras@gmail.com',
      'password' => bcrypt('123456'),
      'setup_count' => 3,
      'is_admin' => 0
    ]);

    DB::table('profiles_info')->insert([
      'first_name' => 'Feras',
      'last_name' => 'Khanfar',
      'sex' => 'male',
      'date_of_birth' => '19-6-1974',
      'country' => 'Palestine',
      'city' => 'Jenin',
      'address' => 'Kufr Ra\'i',
      'birth_place' => 'Jenin',
      'user_id' => 3
    ]);
    //
    DB::table('users')->insert([
      'name' => 'Ahmad',
      'email' => 'ahmad@gmail.com',
      'password' => bcrypt('123456'),
      'setup_count' => 3,
      'is_admin' => 0
    ]);

    DB::table('profiles_info')->insert([
      'first_name' => 'Ahmad',
      'last_name' => 'Humeydi',
      'sex' => 'male',
      'date_of_birth' => '14-3-1984',
      'country' => 'Kuwait',
      'city' => 'Kuwait',
      'address' => 'Nedat st.',
      'birth_place' => 'Kuwait',
      'user_id' => 4
    ]);

    DB::table('topics')->insert([
      ['topic_name' => 'Computer Engineering'],
      ['topic_name' => 'Medicine and Healthcare'],
      ['topic_name' => 'Books and Writing'],
      ['topic_name' => 'Healthy Eating & Food'],
      ['topic_name' => 'Electrical Engineering'],
      ['topic_name' => 'Economics'],
      ['topic_name' => 'Movies'],
      ['topic_name' => 'Fashion and Style'],
      ['topic_name' => 'General Knowledge'],
      ['topic_name' => 'Law'],
      ['topic_name' => 'Psychology'],
      ['topic_name' => 'Physics'],
      ['topic_name' => 'Maths'],
      ['topic_name' => 'Education'],
      ['topic_name' => 'Visiting and Travel'],
      ['topic_name' => 'Business']
    ]);

    DB::table('users_topics')->insert([
      ['user_id' => 1, 'topic_id' => 1, 'added' => 1],
      ['user_id' => 1, 'topic_id' => 2, 'added' => 1],
      ['user_id' => 1, 'topic_id' => 3, 'added' => 1],
      ['user_id' => 1, 'topic_id' => 4, 'added' => 1],
      ['user_id' => 1, 'topic_id' => 5, 'added' => 1],
      ['user_id' => 2, 'topic_id' => 6, 'added' => 1],
      ['user_id' => 2, 'topic_id' => 7, 'added' => 1],
      ['user_id' => 2, 'topic_id' => 1, 'added' => 1],
      ['user_id' => 2, 'topic_id' => 2, 'added' => 1],
      ['user_id' => 3, 'topic_id' => 10, 'added' => 1],
      ['user_id' => 3, 'topic_id' => 2, 'added' => 1],
      ['user_id' => 3, 'topic_id' => 1, 'added' => 1],
      ['user_id' => 3, 'topic_id' => 3, 'added' => 1],
      ['user_id' => 3, 'topic_id' => 11, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 1, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 2, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 3, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 4, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 5, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 6, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 7, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 8, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 9, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 10, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 11, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 12, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 13, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 14, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 15, 'added' => 1],
      ['user_id' => 4, 'topic_id' => 16, 'added' => 1],
    ]);

    DB::table('questions')->insert([
      ['user_id' => 1, 'topic_id' => 1, 'title' => 'Quotes and highlights','question_body' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><blockquote><p>It&#39;s a great to use common proverbs</p></blockquote><p><span class="marker">PS: Things aren&#39;t normally OK, you need to take an action</span></p>'],
      ['user_id' => 1, 'topic_id' => 2, 'title' => 'Images and lists','question_body' => '<h1>Wondering</h1><h2>Where does Lorem Ipsum come from?</h2><p><img alt="" src="http://localhost:8000/images/demo1.png" style="height:200px; width:200px" /></p><p><em><strong>As you can see, the compass is great. For these reasons:</strong></em></p><ol><li><strong><em>reason 1</em></strong></li><li><strong><em>reason 2</em></strong></li><li><strong><em>reason 3</em></strong></li></ol>'],
      ['user_id' => 1, 'topic_id' => 3, 'title' => 'Graphs, equations, tables & codes','question_body' => '<h1>&nbsp;</h1><h1>Graphs,&nbsp;equations &amp; codes..</h1><pre><code class="language-javascript">var obj = { foo: \'hello\', bar: \'hi\' };var name = \'Ruba\';console.log(obj.foo + \' \' + name);</code></pre><div class="chartjs" data-chart="doughnut" data-chart-height="100" data-chart-value="[{&quot;value&quot;:10,&quot;label&quot;:&quot;A&quot;},{&quot;value&quot;:20,&quot;label&quot;:&quot;B&quot;},{&quot;value&quot;:30,&quot;label&quot;:&quot;C&quot;},{&quot;value&quot;:40,&quot;label&quot;:&quot;D&quot;}]"></div><p>Figure 1.1: statistics about A, B, C &amp; D</p><p><img alt="\alpha \sum \gamma * 2\sinh^{\alpha } + \Delta \beta * \int \left ( x + y^{x+y} \right )" src="http://latex.codecogs.com/gif.latex?%5Calpha%20%5Csum%20%5Cgamma%20*%202%5Csinh%5E%7B%5Calpha%20%7D%20&amp;plus;%20%5CDelta%20%5Cbeta%20*%20%5Cint%20%5Cleft%20%28%20x%20&amp;plus;%20y%5E%7Bx&amp;plus;y%7D%20%5Cright%20%29" /></p><p>where:</p><ul><li><img alt="\alpha" src="http://latex.codecogs.com/gif.latex?%5Calpha" />: is the Alpha factor.</li><li>&szlig;: is the Beta factor</li><li><img alt="\gamma" src="http://latex.codecogs.com/gif.latex?%5Cgamma" />: is the Gamma factor<table align="left" border="1" cellpadding="1" cellspacing="1" style="width:200px"><caption>Summary</caption><thead><tr><th scope="col">&nbsp;</th><th scope="col">X</th><th scope="col">Y</th></tr></thead><tbody><tr><td>v</td><td>4</td><td>5</td></tr></tbody></table><p>&nbsp;</p></li></ul>'],
      ['user_id' => 2, 'topic_id' => 4, 'title' => 'What is Lorem Ipsum?','question_body' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><blockquote><p>It&#39;s a great to use common proverbs</p></blockquote><p><span class="marker">PS: Things aren&#39;t normally OK, you need to take an action</span></p>'],
      ['user_id' => 3, 'topic_id' => 5, 'title' => 'Where can i find the moon?','question_body' => '<h1>Wondering</h1><h2>Where does Lorem Ipsum come from?</h2><p><img alt="" src="http://localhost:8000/images/demo1.png" style="height:200px; width:200px" /></p><p><em><strong>As you can see, the compass is great. For these reasons:</strong></em></p><ol><li><strong><em>reason 1</em></strong></li><li><strong><em>reason 2</em></strong></li><li><strong><em>reason 3</em></strong></li></ol>'],
      ['user_id' => 4, 'topic_id' => 6, 'title' => 'What best recipes are there?','question_body' => '<h1>&nbsp;</h1><h1>Graphs,&nbsp;equations &amp; codes..</h1><pre><code class="language-javascript">var obj = { foo: \'hello\', bar: \'hi\' };var name = \'Ruba\';console.log(obj.foo + \' \' + name);</code></pre><div class="chartjs" data-chart="doughnut" data-chart-height="100" data-chart-value="[{&quot;value&quot;:10,&quot;label&quot;:&quot;A&quot;},{&quot;value&quot;:20,&quot;label&quot;:&quot;B&quot;},{&quot;value&quot;:30,&quot;label&quot;:&quot;C&quot;},{&quot;value&quot;:40,&quot;label&quot;:&quot;D&quot;}]"></div><p>Figure 1.1: statistics about A, B, C &amp; D</p><p><img alt="\alpha \sum \gamma * 2\sinh^{\alpha } + \Delta \beta * \int \left ( x + y^{x+y} \right )" src="http://latex.codecogs.com/gif.latex?%5Calpha%20%5Csum%20%5Cgamma%20*%202%5Csinh%5E%7B%5Calpha%20%7D%20&amp;plus;%20%5CDelta%20%5Cbeta%20*%20%5Cint%20%5Cleft%20%28%20x%20&amp;plus;%20y%5E%7Bx&amp;plus;y%7D%20%5Cright%20%29" /></p><p>where:</p><ul><li><img alt="\alpha" src="http://latex.codecogs.com/gif.latex?%5Calpha" />: is the Alpha factor.</li><li>&szlig;: is the Beta factor</li><li><img alt="\gamma" src="http://latex.codecogs.com/gif.latex?%5Cgamma" />: is the Gamma factor<table align="left" border="1" cellpadding="1" cellspacing="1" style="width:200px"><caption>Summary</caption><thead><tr><th scope="col">&nbsp;</th><th scope="col">X</th><th scope="col">Y</th></tr></thead><tbody><tr><td>v</td><td>4</td><td>5</td></tr></tbody></table><p>&nbsp;</p></li></ul>'],
      ['user_id' => 4, 'topic_id' => 7, 'title' => 'What programming languages are used with AI?','question_body' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><blockquote><p>It&#39;s a great to use common proverbs</p></blockquote><p><span class="marker">PS: Things aren&#39;t normally OK, you need to take an action</span></p>'],
      ['user_id' => 2, 'topic_id' => 8, 'title' => 'How can i learn game development?','question_body' => '<h1>Wondering</h1><h2>Where does Lorem Ipsum come from?</h2><p><img alt="" src="http://localhost:8000/images/demo1.png" style="height:200px; width:200px" /></p><p><em><strong>As you can see, the compass is great. For these reasons:</strong></em></p><ol><li><strong><em>reason 1</em></strong></li><li><strong><em>reason 2</em></strong></li><li><strong><em>reason 3</em></strong></li></ol>'],
      ['user_id' => 3, 'topic_id' => 9, 'title' => 'How may i know if i\'m successful?','question_body' => '<h1>&nbsp;</h1><h1>Graphs,&nbsp;equations &amp; codes..</h1><pre><code class="language-javascript">var obj = { foo: \'hello\', bar: \'hi\' };var name = \'Ruba\';console.log(obj.foo + \' \' + name);</code></pre><div class="chartjs" data-chart="doughnut" data-chart-height="100" data-chart-value="[{&quot;value&quot;:10,&quot;label&quot;:&quot;A&quot;},{&quot;value&quot;:20,&quot;label&quot;:&quot;B&quot;},{&quot;value&quot;:30,&quot;label&quot;:&quot;C&quot;},{&quot;value&quot;:40,&quot;label&quot;:&quot;D&quot;}]"></div><p>Figure 1.1: statistics about A, B, C &amp; D</p><p><img alt="\alpha \sum \gamma * 2\sinh^{\alpha } + \Delta \beta * \int \left ( x + y^{x+y} \right )" src="http://latex.codecogs.com/gif.latex?%5Calpha%20%5Csum%20%5Cgamma%20*%202%5Csinh%5E%7B%5Calpha%20%7D%20&amp;plus;%20%5CDelta%20%5Cbeta%20*%20%5Cint%20%5Cleft%20%28%20x%20&amp;plus;%20y%5E%7Bx&amp;plus;y%7D%20%5Cright%20%29" /></p><p>where:</p><ul><li><img alt="\alpha" src="http://latex.codecogs.com/gif.latex?%5Calpha" />: is the Alpha factor.</li><li>&szlig;: is the Beta factor</li><li><img alt="\gamma" src="http://latex.codecogs.com/gif.latex?%5Cgamma" />: is the Gamma factor<table align="left" border="1" cellpadding="1" cellspacing="1" style="width:200px"><caption>Summary</caption><thead><tr><th scope="col">&nbsp;</th><th scope="col">X</th><th scope="col">Y</th></tr></thead><tbody><tr><td>v</td><td>4</td><td>5</td></tr></tbody></table><p>&nbsp;</p></li></ul>'],
      ['user_id' => 3, 'topic_id' => 10, 'title' => 'Is Psychology study good for me?','question_body' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><blockquote><p>It&#39;s a great to use common proverbs</p></blockquote><p><span class="marker">PS: Things aren&#39;t normally OK, you need to take an action</span></p>'],
      ['user_id' => 4, 'topic_id' => 11, 'title' => 'Are there any foods good for my pets?','question_body' => '<h1>Wondering</h1><h2>Where does Lorem Ipsum come from?</h2><p><img alt="" src="http://localhost:8000/images/demo1.png" style="height:200px; width:200px" /></p><p><em><strong>As you can see, the compass is great. For these reasons:</strong></em></p><ol><li><strong><em>reason 1</em></strong></li><li><strong><em>reason 2</em></strong></li><li><strong><em>reason 3</em></strong></li></ol>'],
      ['user_id' => 2, 'topic_id' => 12, 'title' => 'My bike has been broken, how can i fix it?','question_body' => '<h1>&nbsp;</h1><h1>Graphs,&nbsp;equations &amp; codes..</h1><pre><code class="language-javascript">var obj = { foo: \'hello\', bar: \'hi\' };var name = \'Ruba\';console.log(obj.foo + \' \' + name);</code></pre><div class="chartjs" data-chart="doughnut" data-chart-height="100" data-chart-value="[{&quot;value&quot;:10,&quot;label&quot;:&quot;A&quot;},{&quot;value&quot;:20,&quot;label&quot;:&quot;B&quot;},{&quot;value&quot;:30,&quot;label&quot;:&quot;C&quot;},{&quot;value&quot;:40,&quot;label&quot;:&quot;D&quot;}]"></div><p>Figure 1.1: statistics about A, B, C &amp; D</p><p><img alt="\alpha \sum \gamma * 2\sinh^{\alpha } + \Delta \beta * \int \left ( x + y^{x+y} \right )" src="http://latex.codecogs.com/gif.latex?%5Calpha%20%5Csum%20%5Cgamma%20*%202%5Csinh%5E%7B%5Calpha%20%7D%20&amp;plus;%20%5CDelta%20%5Cbeta%20*%20%5Cint%20%5Cleft%20%28%20x%20&amp;plus;%20y%5E%7Bx&amp;plus;y%7D%20%5Cright%20%29" /></p><p>where:</p><ul><li><img alt="\alpha" src="http://latex.codecogs.com/gif.latex?%5Calpha" />: is the Alpha factor.</li><li>&szlig;: is the Beta factor</li><li><img alt="\gamma" src="http://latex.codecogs.com/gif.latex?%5Cgamma" />: is the Gamma factor<table align="left" border="1" cellpadding="1" cellspacing="1" style="width:200px"><caption>Summary</caption><thead><tr><th scope="col">&nbsp;</th><th scope="col">X</th><th scope="col">Y</th></tr></thead><tbody><tr><td>v</td><td>4</td><td>5</td></tr></tbody></table><p>&nbsp;</p></li></ul>'],
    ]);

    DB::table('answers')->insert([
      ['user_id' => 2, 'question_id' => 1, 'answer' => 'I really appreciate your attitude towards the fact, 1 + 1 = 2.'],
      ['user_id' => 3, 'question_id' => 1, 'answer' => 'Lorem Ipsum is just like saying "O\' Lorem, Ob9um".'],
      ['user_id' => 4, 'question_id' => 1, 'answer' => 'Lotem Ipsum is a latin word.'],
      ['user_id' => 3, 'question_id' => 2, 'answer' => 'Answers like AAAAAAAAAAAAAAAAAAAAAA'],
      ['user_id' => 4, 'question_id' => 2, 'answer' => 'Such a neat question!'],
      ['user_id' => 2, 'question_id' => 2, 'answer' => 'Hooray! A clean question is out there!'],
      ['user_id' => 4, 'question_id' => 3, 'answer' => 'Javascript is a great scripting language, now it\'s a complete language.'],
      ['user_id' => 3, 'question_id' => 3, 'answer' => 'You can do a lot with js, webapps, mobapps or even desktop apps'],
      ['user_id' => 2, 'question_id' => 3, 'answer' => 'I recommend using Meteor JS. It\'s the latest perfect Javascript framework.']
    ]);

    DB::table('groups')->insert([
      'question_id' => 1
    ]);

    DB::table('members')->insert([
      ['user_id' => 1, 'group_id' => 1, 'is_group_admin' => 1],
      ['user_id' => 2, 'group_id' => 1, 'is_group_admin' => 0],
      ['user_id' => 3, 'group_id' => 1, 'is_group_admin' => 0],
      ['user_id' => 4, 'group_id' => 1, 'is_group_admin' => 0],
    ]);

    DB::table('articles')->insert([
      'group_id' => 1,
      'topic_id' => 1,
      'title' => 'Quotes and highlights'
    ]);

  }
}
