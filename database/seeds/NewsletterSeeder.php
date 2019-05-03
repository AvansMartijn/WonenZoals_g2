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
use App\Newsletter;
/**
 * User Table Seeder with one user of every type
 *
 * @category Class
 * @package  NewsletterSeeder
 * @author   Xandor janssen <xpjhjans@avans.nl>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://wonenzoals.mardy.tk
 */
class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsletters')->delete();

        $newsletters = [
            ['id' => 1, 'title' => "Nieuwsbrief Wonen Zoals februari 2019", 'link' => "https://stichting-wonen-zoals.email-provider.nl/web/x8dnchffh7/8tppkyieya/fyd3xapzta/ctl2i9baaj"],
            ['id' => 2, 'title' => "Nieuwsbrief Wonen Zoals januari 2019", 'link' => "https://stichting-wonen-zoals.email-provider.nl/web/x8dnchffh7/knsualb7lm"],
            ['id' => 3, 'title' => "Nieuwsbrief Wonen Zoals oktober 2018", 'link' => "https://stichting-wonen-zoals.email-provider.nl/web/x8dnchffh7/klem5l8yd0"],
            ['id' => 4, 'title' => "Nieuwsbrief Wonen Zoals juli 2018", 'link' => "https://stichting-wonen-zoals.email-provider.nl/web/x8dnchffh7/7jcwcvzsnp"],
            ['id' => 5, 'title' => "Nieuwsbrief Wonen Zoals mei 2018", 'link' => "https://stichting-wonen-zoals.email-provider.nl/web/x8dnchffh7/bcornpqsfx/fyd3xapzta/3cpydc1uip"]
            
            
            
        ];

        foreach($newsletters as $newsletter){
            Newsletter::create($newsletter);
        };
    }
}
