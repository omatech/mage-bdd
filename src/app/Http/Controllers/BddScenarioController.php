<?php

namespace Omatech\MageBdd\App\Http\Controllers;


use Omatech\MageBdd\App\Http\Requests\ScenarioCreateRequest;
use Omatech\MageBdd\App\Http\Requests\ScenarioUpdateRequest;
use Omatech\MageBdd\App\Http\Resources\BddScenarioResource;
use Omatech\MageBdd\App\Repositories\BddScenarioRepository;

class BddScenarioController extends Controller
{
    /**
     * @var BddScenarioRepository
     */
    private $bddScenarioRepository;

    /**
     * BddController constructor.
     * @param BddScenarioRepository $bddScenarioRepository
     */
    public function __construct(BddScenarioRepository $bddScenarioRepository)
    {

        $this->bddScenarioRepository = $bddScenarioRepository;
    }

    public function store(ScenarioCreateRequest $request)
    {
        $scenario = $this->bddScenarioRepository->create($request->only(['title', 'bdd_feature_id']));

        if($request->ajax()){

            return response(['scenario' => new BddScenarioResource($scenario), 'message' => trans('Scenario created successfully')]);
        }

        return redirect()->route('mage-bdd.domain.index');
    }

    public function update(ScenarioUpdateRequest $request, $id)
    {
        $this->bddScenarioRepository->update($request->only(['title', 'bdd_feature_id']), $id);

        $scenario = $this->bddScenarioRepository->find($id);

        if($request->ajax()){

            return response(['scenario' => new BddScenarioResource($scenario), 'message' => trans('Scenario updated successfully')]);
        }

        return redirect()->route('mage-bdd.domain.index');
    }
}