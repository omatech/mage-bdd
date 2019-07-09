<?php

namespace Omatech\MageBdd\App\Http\Controllers;

use Omatech\MageBdd\App\Repositories\BddDomainRepository;

class BddDomainController extends Controller
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
        $domains = $this->bddDomainRepository->query()->orderBy('color')->get();

        return view('mage-bdd::pages.domain.list', compact('domains'));
    }
    
    public function create()
    {
        return view('mage-bdd::pages.domain.create');
    }
    
    public function store()
    {
        
    }

    public function edit($id)
    {
        $domain = $this->bddDomainRepository->query()->find($id);

        return view('mage-bdd::pages.domain.create', compact('domain'));
    }

    public function update($id)
    {
        return view('mage-bdd::pages.domain.create');
    }
}