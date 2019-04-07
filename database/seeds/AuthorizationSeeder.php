<?php
/**
 * Authorizations Table Seeder
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
use App\authorization;
/**
 * User Table Seeder with one user of every type
 *
 * @category Class
 * @package  UserTableSeeder
 * @author   Martijn Hanegraaf <mfghaneg@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class AuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authorizations')->delete();

        $authorizations = [
            ['id' => 1, 'user_id' => 1, 'authorization' => "Agenda"],
            ['id' => 2, 'user_id' => 2, 'authorization' => "Agenda"]
        ];

        foreach($authorizations as $authorization){
            authorization::create($authorization);
        };
    }
}
