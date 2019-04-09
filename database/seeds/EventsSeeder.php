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
            ['id' => 1, 'eventname' => 'Lunch', 'description' => 'Brood met omelet', 'date' => '2019-04-11 11:30:00', 'enddate' => '2019-04-11 12:30:00'],
            ['id' => 2, 'eventname' => 'diner', 'description' => 'Vanavond is er een lekker diner geplanned. Kom gezellig mee eten, het menu is als volgt:<br><br>Groentensoep,<br>wortelstamp met stoofvlees,<br>vla<br>', 'date' => '2019-04-08 18:30:00', 'enddate' => '2019-04-08 20:00:00'],
            ['id' => 3, 'eventname' => 'karaoke avond', 'description' => 'Kom gezellig meezingen tijdens de karaoke avond', 'date' => '2019-04-15 20:00:00', 'enddate' => '2019-04-15 22:00:00'],
            ['id' => 4, 'eventname' => 'Filmavond', 'description' => 'The fast en the furious 6', 'date' => '2019-04-10 20:00:00', 'enddate' => '2019-04-10 23:00:00']
        ];
        
        foreach($events as $event){
            AgendaEvent::create($event);
        };
        
        $users_events = [
            ['id' => 1, 'user_id' => 2, 'event_id' => 2, 'applied' => 1],
            ['id' => 2, 'user_id' => 2, 'event_id' => 3],
            ['id' => 3, 'user_id' => 2, 'event_id' => 4],
            ['id' => 4, 'user_id' => 5, 'event_id' => 1],
            ['id' => 5, 'user_id' => 6, 'event_id' => 1],
            ['id' => 6, 'user_id' => 7, 'event_id' => 1]
        ];


        foreach($users_events as $user_event){
            UsersAgendaEvents::create($user_event);
        };
    }
}
