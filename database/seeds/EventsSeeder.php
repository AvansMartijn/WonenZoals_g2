<?php

use Illuminate\Database\Seeder;
use App\AgendaEvent;
use App\UsersAgendaEvents;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('agenda_events')->delete();
        DB::table('users_agenda_events')->delete();

        $events = [
            ['id' => 1, 'eventname' => 'Lunch', 'description' => 'Brood met omelet', 'date' => now()],
            ['id' => 2, 'eventname' => 'diner', 'description' => 'Groentensoep, wortelstamp met stoofvlees, vla', 'date' => now()],
            ['id' => 3, 'eventname' => 'karaoke avond', 'description' => 'Kom gezellig meezingen tijdens de karaoke avond', 'date' => now()],
            ['id' => 4, 'eventname' => 'Filmavond', 'description' => 'The fast en the furious 6', 'date' => now()]
        ];
        
        foreach($events as $event){
            AgendaEvent::create($event);
        };
        
        $users_events = [
            ['id' => 1, 'user_id' => 2, 'event_id' => 1],
            ['id' => 2, 'user_id' => 2, 'event_id' => 2],
            ['id' => 3, 'user_id' => 2, 'event_id' => 3],
            ['id' => 4, 'user_id' => 2, 'event_id' => 4]
        ];


        foreach($users_events as $user_event){
            UsersAgendaEvents::create($user_event);
        };
    }
}
