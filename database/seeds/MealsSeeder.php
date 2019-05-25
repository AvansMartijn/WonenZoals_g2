<?php

use Illuminate\Database\Seeder;
use App\Meal;
use App\EventsMeals;

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
            ['id' => 1, 'type' => 'voorgerecht', 'name' => 'Groentensoep', 'description' => 'Groentesoep met verse groenten'],
            ['id' => 2, 'type' => 'hoofdgerecht', 'name' => 'Wortelstamp met rookworst', 'description' => 'Wortelstamp van verse wortelen met een Unox rookworst'],
            ['id' => 3, 'type' => 'nagerecht', 'name' => 'Mona toetje', 'description' => 'Een dessert van een mini Mona toetje'],
            ['id' => 4, 'type' => 'hoofdgerecht', 'name' => 'Tosti', 'description' => 'Een tosti met ham en kaas'],
            ['id' => 5, 'type' => 'hoofdgerecht', 'name' => 'Hete bliksem', 'description' => 'Stamppot met appels'],
        ];
        
        foreach($meals as $meal){
            Meal::create($meal);
        };
        
        $events_meals = [
            ['id' => 1, 'meal_id' => 1, 'event_id' => 5],
            ['id' => 2, 'meal_id' => 2, 'event_id' => 5],
            ['id' => 3, 'meal_id' => 3, 'event_id' => 5],
            ['id' => 4, 'meal_id' => 4, 'event_id' => 1],
            ['id' => 5, 'meal_id' => 1, 'event_id' => 2],
            ['id' => 6, 'meal_id' => 5, 'event_id' => 2],
            ['id' => 7, 'meal_id' => 3, 'event_id' => 2],
        ];


        foreach($events_meals as $events_meal){
            EventsMeals::create($events_meal);
        };
    }
}
