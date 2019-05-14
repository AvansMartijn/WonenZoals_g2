<?php
/**
 * Authorizations Table Seeder
 *
 * PHP version 7.3
 *
 * @category Seeders
 * @package  Wonenzoals
 * @author   Xandor janssen <xpjhjans@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
use Illuminate\Database\Seeder;
use App\Role;

/**
 * User Table Seeder with one user of every type
 *
 * @category Class
 * @package  NewsletterSeeder
 * @author   Xandor janssen <xpjhjans@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [

            ['id' => 1, 'role_name' => "Beheerder"],
            ['id' => 2, 'role_name' => "Vrijwilliger"],
            ['id' => 3, 'role_name' => "Ouder"],
            ['id' => 4, 'role_name' => "Bewoner"],
     
        ];

        foreach($roles as $role){
            Role::create($role);
        };
    }
}
