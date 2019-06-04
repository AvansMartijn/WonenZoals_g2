<?php

use Illuminate\Database\Seeder;
use App\Topic;
use App\ForumPost;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->delete();
        DB::table('forum_posts')->delete();

        $topics = [
            ['id' => 1,'user_id' => 3,'title' => "Zorgverzekering",'message' => "wat is de beste zorgverzekering?" ],
            ['id' => 2,'user_id' => 6,'title' => "Toekomst Wonenzoals",'message' => "Leuke ideen voor de toekomst van Wonenzoals" ],
           
        ];
        
        foreach($topics as $topic){
            Topic::create($topic);
        };
        
        $forum_posts = [
            ['id' => 1,'topic_id' => 1,'user_id' => 7,'message' => "Naar mijn mening is Besurd de beste zorgverzekering is.", ],
            ['id' => 2,'topic_id' => 1,'user_id' => 6,'message' => "Ik vind dat OHRA de beste is.", ],
            ['id' => 3,'topic_id' => 2,'user_id' => 3,'message' => "Ik denk dat het belangerijk is als wonenzoals toekomst proof is door middel van een prachtige website.", ],

        ];


        foreach($forum_posts as $forum_post){
            ForumPost::create($forum_post);
        };
    }
}
