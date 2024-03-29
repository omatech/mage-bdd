<?php
namespace Omatech\MageBdd\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BddLineResource extends JsonResource
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
            'type' => $this->type,
            'text' => $this->text,
            'bdd_scenario_id' => $this->bdd_scenario_id
        ];
    }
}