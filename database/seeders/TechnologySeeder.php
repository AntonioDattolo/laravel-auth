<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $javaScript = new Technology();
            $javaScript->name = "JavaScript" ;
            $javaScript->description = "JavaScript è un linguaggio di programmazione che gli sviluppatori utilizzano per realizzare pagine Web interattive.";
            $javaScript->icon = '<i class="fa-brands fa-js"></i>';
            $javaScript->projects()->attach(1);
            $javaScript->save();

            $php = new Technology();
            $php->name = "PHP" ;
            $php->description = "PHP è un linguaggio di scripting interpretato lato server. È stato progettato per creare pagine web dinamiche, integrate efficacemente con i database; può essere incorporato direttamente all'interno del codice HTML di una pagina web.";
            $php->icon = '<i class="fa-brands fa-php"></i>';
            $php->projects()->attach(1);
            $php->save();

            $vue = new Technology();
            $vue->name = "Vuejs" ;
            $vue->description = "E' un framework Javascript open source per la creazione di interfacce utente (UI, User Interface). Si tratta di un framework progressivo, ovvero è pensato per essere adottabile in modo incrementale - a differenza dei framework monolitici.";
            $vue->icon = '<i class="fa-brands fa-vuejs"></i>';
            $vue->projects()->attach(1);
            $vue->save();

            $laravel = new Technology();
            $laravel->name = "Laravel" ;
            $laravel->description = "Laravel è un framework PHP e usa un linguaggio di scripting piuttosto che essere un linguaggio di programmazione PHP. Anche se i linguaggi di scripting e i linguaggi di programmazione sono correlati, presentano diverse differenze evidenti, principalmente nella facilità d'uso e nella velocità di esecuzione.";
            $laravel->icon = '<i class="fa-brands fa-laravel"></i>';
            $laravel->projects()->attach(1);
            $laravel->save();
    }
}
