<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'チーム開発会って？',
            'body' => 'チームで協力して一つの成果物を作るイベントです！メンバー全員で助け合いましょう！',
            'translation' => 'This is an event where teams work together to create a single deliverable! All members are encouraged to help each other!',
            'category_id' => 1,
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('posts')->insert([
            'title' => '役割分担',
            'body' => 'これはborderという、cssでつけることができる枠線です！'.PHP_EOL.'太さの指定や形など色々指定できるので、気になった方はコードを覗いてみたり、調べてみたりしましょう！'.PHP_EOL.'また、このプロジェクト内ではインラインCSSという、HTML内に書く簡易的なCSSを使用しています！こちらも気になった方は見てみてください！',
            'translation' => 'This is a border, which can be added with css!'.PHP_EOL.'You can specify the thickness, shape, and many other things, so if you are interested, take a peek at the code and check it out!'.PHP_EOL.'We also use inline CSS within this project, which is simple CSS that is written within HTML! Please take a look at this as well if you are interested!',
            'category_id' => 2,
            'user_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('posts')->insert([
            'title' => 'この枠線みたいなやつって何？',
            'body' => '開発を進める際は、役割分担をすると効率的に開発をすることができます！'.PHP_EOL.'具',
            'translation' => 'When proceeding with development, dividing the roles among them allows for more efficient development!'.PHP_EOL.'ingredients',
            'category_id' => 2,
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
