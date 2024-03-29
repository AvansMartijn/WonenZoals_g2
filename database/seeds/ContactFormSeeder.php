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
use App\ContactUS;
/**
 * User Table Seeder with one user of every type
 *
 * @category Class
 * @package  NewsletterSeeder
 * @author   Xandor janssen <xpjhjans@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactus')->delete();

        $contactuss = [
            ['id' => 1, 'name' => "Jan Janssen", 'email' => "jan.janssen@gmail.nl", 'subject' => "Aanmelden woningzoekende", 'message' => "Beste wonenzoals, graag zou ik meer informatie willen ontvangen over de woongroep. Mvg Jan Janssen"],
            ['id' => 2, 'name' => "Gerrit verbeek", 'email' => "gekke.gerrit@hotmail.com", 'subject' => "Afmelden nieuwsbrief", 'message' => "Beste wonenzoals, ik wil me graag afmelden voor de nieuwsbrief. Mvg Gerrit Verbeek"]
        ];

        foreach($contactuss as $contactus){
            ContactUS::create($contactus);
        };
    }
}
