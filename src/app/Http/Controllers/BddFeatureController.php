<?php

namespace Omatech\MageBdd\App\Http\Controllers;


use Omatech\MageBdd\App\Repositories\BddDomainRepository;
use Omatech\MageBdd\App\Repositories\BddFeatureRepository;

class BddFeatureController extends Controller
{
    /**
     * @var BddDomainRepository
     */
    private $bddDomainRepository;
    /**
     * @var BddFeatureRepository
     */
    private $bddFeatureRepository;


    /**
     * BddController constructor.
     * @param BddDomainRepository $bddDomainRepository
     * @param BddFeatureRepository $bddFeatureRepository
     */
    public function __construct(BddDomainRepository $bddDomainRepository, BddFeatureRepository $bddFeatureRepository)
    {

        $this->bddDomainRepository = $bddDomainRepository;
        $this->bddFeatureRepository = $bddFeatureRepository;
    }

    public function show()
    {
        return view('mage-bdd::pages.list', compact('domains'));
    }
    
    public function create()
    {
        return view('mage-bdd::pages.feature.create', compact('domains'));
    }

}