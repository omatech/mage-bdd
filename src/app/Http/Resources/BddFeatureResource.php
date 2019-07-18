<?php
namespace Omatech\MageBdd\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BddFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bdd_domain_id' => $this->bdd_domain_id,
            'title' => $this->title,
            'color' => $this->color,
            'as_a' => $this->as_a,
            'i_want' => $this->i_want,
            'so_that' => $this->so_that,
            'scenarios' => BddScenarioResource::collection($this->scenarios),
        ];
    }
}