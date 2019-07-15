<?php

namespace Omatech\MageBdd\App\Http\Controllers;


use Omatech\MageBdd\App\Http\Requests\FeatureCreateRequest;
use Omatech\MageBdd\App\Http\Requests\FeatureUpdateRequest;
use Omatech\MageBdd\App\Http\Resources\BddFeatureResource;
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
    
    public function create($domain_id)
    {
        return view('mage-bdd::pages.feature.create', compact('domain_id'));
    }

    public function store(FeatureCreateRequest $request)
    {
        $feature = $this->bddFeatureRepository->create($request->only(['color', 'title', 'bdd_domain_id']));

        if($request->ajax()){

            return response(['feature' => new BddFeatureResource($feature), 'message' => trans('Feature created successfully')]);
        }

        return redirect()->route('mage-bdd.domain.index');
    }

    public function edit($id)
    {
        $feature = $this->bddFeatureRepository->findResource($id);

        return view('mage-bdd::pages.feature.edit', compact('feature'));
    }

    public function update(FeatureUpdateRequest $request, $id)
    {
        $feature_id = $this->bddFeatureRepository->update($request->only(['color', 'title']), $id);

        $feature = $this->bddFeatureRepository->find($feature_id);

        if($request->ajax()){

            return response(['feature' => new BddFeatureResource($feature), 'message' => trans('Feature updated successfully')]);
        }

        return redirect()->route('mage-bdd.domain.index');
    }



}