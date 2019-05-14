<?php
/**
 * Main Seeder
 *
 * PHP version 7.3
 *
 * @category Seeders
 * @package  Wonenzoals
 * @author   Martijn Hanegraaf <mfghaneg@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
use Illuminate\Database\Seeder;
/**
 * User Table Seeder with one user of every type
 *
 * @category Class
 * @package  DatabaseSeeder
 * @author   Martijn Hanegraaf <mfghaneg@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(MealsSeeder::class);
        $this->call(authorizationLookupsSeeder::class);
        $this->call(AuthorizationSeeder::class);
        $this->call(NewsletterSeeder::class);
        $this->call(SectionsSeeder::class);
        $this->call(FrontEndSeeder::class);
        
        
    }
}
