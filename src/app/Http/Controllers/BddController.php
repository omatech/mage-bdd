<?php

namespace Omatech\MageBdd\App\Http\Controllers;

use Omatech\MageBdd\App\Repositories\BddDomainRepository;

class BddController extends Controller
{

    /**
     * @var BddDomainRepository
     */
    private $bddDomainRepository;

    /**
     * BddController constructor.
     * @param BddDomainRepository $bddDomainRepository
     */
    public function __construct(BddDomainRepository $bddDomainRepository)
    {

        $this->bddDomainRepository = $bddDomainRepository;
    }
    
    public function index()
    {
        $domains = $this->bddDomainRepository->query()->get();

        return view('mage-bdd::pages.list', compact('domains'));
    }
}