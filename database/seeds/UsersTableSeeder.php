<?php
/**
 * User Table Seeder
 *
 * PHP version 7.3
 *
 * @category Seeders
 * @package  Wonenzoals
 * @author   Martijn Hanegraaf <mfghaneg@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
/**
 * User Table Seeder with one user of every type
 *
 * @category Class
 * @package  UserTableSeeder
 * @author   Martijn Hanegraaf <mfghaneg@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            ['id' => 1, 'name' => 'Beheerder', 'email' => 'beheerder@wza.nl', 'email_verified_at' => now(), 'password' => bcrypt('123456'), 'role' => 'Beheerder', 'birthday' => now(), 'remember_token' => Str::random(15)],
            ['id' => 2, 'name' => 'Bewoner', 'email' => 'bewoner@wza.nl', 'email_verified_at' => now(), 'password' => bcrypt('123456'), 'role' => 'Bewoner', 'birthday' => now(), 'remember_token' => Str::random(15)],
            ['id' => 3, 'name' => 'Vrijwilliger', 'email' => 'vrijwilliger@wza.nl', 'email_verified_at' => now(), 'password' => bcrypt('123456'), 'role' => 'Vrijwilliger', 'birthday' => now(), 'remember_token' => Str::random(15)],
            ['id' => 4, 'name' => 'Ouder', 'email' => 'ouder@wza.nl', 'email_verified_at' => now(), 'password' => bcrypt('123456'), 'role' => 'Ouder', 'birthday' => now(), 'remember_token' => Str::random(15)],
            ['id' => 5, 'name' => 'Pieter', 'email' => 'pieter@wza.nl', 'email_verified_at' => now(), 'password' => bcrypt('123456'), 'role' => 'Bewoner', 'birthday' => now(), 'remember_token' => Str::random(15)],
            ['id' => 6, 'name' => 'Truus', 'email' => 'truus@wza.nl', 'email_verified_at' => now(), 'password' => bcrypt('123456'), 'role' => 'Bewoner', 'birthday' => now(), 'remember_token' => Str::random(15)],
            ['id' => 7, 'name' => 'Jan', 'email' => 'jan@wza.nl', 'email_verified_at' => now(), 'password' => bcrypt('123456'), 'role' => 'Bewoner', 'birthday' => now(), 'remember_token' => Str::random(15)]
        ];

        foreach($users as $user){
            User::create($user);
        };
    }
}
