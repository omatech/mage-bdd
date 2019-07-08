<?php

use Illuminate\Database\Seeder;
use Omatech\MageBdd\App\Models\BddDomain;
use Omatech\MageBdd\App\Models\BddFeature;
use Omatech\MageBdd\App\Models\BddScenario;
use Omatech\MageBdd\App\Models\BddLine;


class BddDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BddDomain::class, 10)->create()->each(function ($domain) {
            $domain->features()->saveMany(factory(BddFeature::class, 10)->make());

            $domain->features()->each(function($feature){
                $feature->scenarios()->saveMany(factory(BddScenario::class, 5)->make());

                $feature->scenarios()->each(function($scenario){
                    $scenario->lines()->saveMany(factory(BddLine::class, 5)->make());
                });

                $feature->lines()->saveMany(factory(BddLine::class, 5)->make());

            });
        });
    }
}
