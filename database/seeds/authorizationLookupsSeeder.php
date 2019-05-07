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
use App\authorizationLookup;
/**
 * User Table Seeder with one user of every type
 *
 * @category Class
 * @package  UserTableSeeder
 * @author   Martijn Hanegraaf <mfghaneg@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class authorizationLookupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authorization_lookups')->delete();

        $authorizationLookups = [
            ['id' => 1, 'name' => 'Agenda'],
            ['id' => 2, 'name' => 'Nieuwsbriefarchief'],
            ['id' => 3, 'name' => 'Maaltijden'],
            ['id' => 4, 'name' => 'Forum'],
            ['id' => 5, 'name' => 'Activiteit']
        ];

        foreach($authorizationLookups as $authorizationLookup){
            authorizationLookup::create($authorizationLookup);
        };
    }
}
