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
            'scenarios' => BddScenarioResource::collection($this->scenarios),
            'lines' => BddLineResource::collection($this->lines)
        ];
    }
}