<?php
namespace Omatech\MageBdd\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BddScenarioResource extends JsonResource
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
            'bdd_feature_id' => $this->bdd_feature_id,
            'title' => $this->title,
            'lines' => BddLineResource::collection($this->lines)
        ];
    }
}