<?php

use Illuminate\Database\Seeder;
use \App\Section;
use \App\SectionType;
use \App\DefaultSection;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('default_sections')->delete();
        DB::table('sections')->delete();
        DB::table('section_types')->delete();

        $section_types = [
            ['id' => 1, 'type' => 'leaf'],
            ['id' => 2, 'type' => 'seperator'],
            ['id' => 3, 'type' => 'text'],
            ['id' => 4, 'type' => 'residents'],
            ['id' => 5, 'type' => 'news'],
            ['id' => 6, 'type' => 'contact'],
            ['id' => 7, 'type' => 'sponsors']
            
        ];

        foreach($section_types as $type){
            SectionType::create($type);
        };

        $sections = [
            ['id' => 1, 'order' => 1, 'name' => 'leaf', 'content' => '', 'type_id' => 1, 'default_section' => 1],
            ['id' => 2, 'order' => 2, 'name' => 'stichting zoals', 'content' => '', 'type_id' => 3, 'default_section' => 1],
            ['id' => 3, 'order' => 3, 'name' => 'scheiding', 'content' => '', 'type_id' => 2, 'default_section' => 1],
            ['id' => 4, 'order' => 4, 'name' => 'bewoners', 'content' => '', 'type_id' => 4, 'default_section' => 1],
            ['id' => 5, 'order' => 5, 'name' => 'ondersteuning', 'content' => '', 'type_id' => 3, 'default_section' => 1],
            ['id' => 6, 'order' => 6, 'name' => 'scheiding', 'content' => '', 'type_id' => 2, 'default_section' => 1],
            ['id' => 7, 'order' => 7, 'name' => 'nieuws', 'content' => '', 'type_id' => 5, 'default_section' => 1],
            ['id' => 8, 'order' => 8, 'name' => 'contact', 'content' => '', 'type_id' => 6, 'default_section' => 1],
            ['id' => 9, 'order' => 9, 'name' => 'sponsors', 'content' => '', 'type_id' => 7, 'default_section' => 1]
            
        ];

        foreach($sections as $section){
            Section::create($section);
            DefaultSection::create($section);
        };
    }
}
