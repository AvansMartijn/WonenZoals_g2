<?php

use Illuminate\Database\Seeder;

class MealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('meals')->delete();
        DB::table('events_meals')->delete();

        $meals = [
            ['id' => 1, 'type' => 'Voorgerecht', 'name' => 'Groentensoep', 'description' => 'Groentesoep met verse groenten'],
            ['id' => 2, 'type' => 'Hoofdgerecht', 'name' => 'Wortelstamp met rookworst', 'description' => 'Wortelstamp van verse wortelen met een Unox rookworst'],
            ['id' => 3, 'type' => 'Nagerecht', 'name' => 'Mona toetje', 'description' => 'Een dessert van een mini Mona toetje'],
        ];
        
        foreach($meals as $meal){
            Meal::create($meal);
        };
        
        $events_meals = [
            ['id' => 1, 'meal_id' => 2, 'event_id' => 5],
            ['id' => 2, 'meal_id' => 2, 'event_id' => 5],
            ['id' => 3, 'meal_id' => 2, 'event_id' => 5],
        ];


        foreach($events_meals as $events_meal){
            UsersAgendaEvents::create($events_meal);
        };
    }
}
