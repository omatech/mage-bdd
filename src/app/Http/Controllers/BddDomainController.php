<?php

namespace Omatech\MageBdd\App\Http\Controllers;

use Omatech\MageBdd\App\Http\Requests\DomainCreateRequest;
use Omatech\MageBdd\App\Http\Requests\DomainUpdateRequest;
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

        return view('mage-bdd::pages.domain.index', compact('domains'));
    }
    
    public function create()
    {
        return view('mage-bdd::pages.domain.create');
    }
    
    public function store(DomainCreateRequest $request)
    {
        $this->bddDomainRepository->query()->insert(request()->only(['color', 'name']));

        return redirect()->route('mage-bdd.domain.index');
    }

    public function edit($id)
    {
        $domain = $this->bddDomainRepository->query()->find($id);

        return view('mage-bdd::pages.domain.edit', compact('domain'));
    }

    public function update(DomainUpdateRequest $request, $id)
    {
        $this->bddDomainRepository->update(request()->only(['color', 'name']), $id);

        return redirect()->route('mage-bdd.domain.index');
    }
}