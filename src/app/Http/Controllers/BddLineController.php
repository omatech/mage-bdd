<?php

namespace Omatech\MageBdd\App\Http\Controllers;


use Omatech\MageBdd\App\Http\Requests\LineCreateRequest;
use Omatech\MageBdd\App\Http\Requests\LineUpdateRequest;
use Omatech\MageBdd\App\Http\Resources\BddLineResource;
use Omatech\MageBdd\App\Repositories\BddLineRepository;

class BddLineController extends Controller
{
    /**
     * @var BddLineRepository
     */
    private $bddLineRepository;

    /**
     * BddController constructor.
     * @param BddLineRepository $bddLineRepository
     */
    public function __construct(BddLineRepository $bddLineRepository)
    {

        $this->bddLineRepository = $bddLineRepository;
    }

    public function store(LineCreateRequest $request)
    {
        $scenario = $this->bddLineRepository->create($request->only(['text', 'bdd_scenario_id']));

        if($request->ajax()){

            return response(['line' => new BddLineResource($scenario), 'message' => trans('Line created successfully')]);
        }

        return redirect()->route('mage-bdd.domain.index');
    }

    public function update(LineUpdateRequest $request, $id)
    {
        $this->bddLineRepository->update($request->only(['text', 'bdd_scenario_id']), $id);

        $scenario = $this->bddLineRepository->find($id);

        if($request->ajax()){

            return response(['line' => new BddLineResource($scenario), 'message' => trans('Line updated successfully')]);
        }

        return redirect()->route('mage-bdd.domain.index');
    }
}