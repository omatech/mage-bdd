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
            $domain->features()->saveMany(factory(BddFeature::class, random_int(3,10))->make());

            $domain->features()->each(function($feature){
                $feature->scenarios()->saveMany(factory(BddScenario::class, random_int(3,7))->make());

                $feature->scenarios()->each(function($scenario){
                    $scenario->lines()->saveMany(factory(BddLine::class, random_int(4,8))->make());
                });

                $feature->lines()->saveMany(factory(BddLine::class, random_int(4,8))->make());

            });
        });
    }
}
