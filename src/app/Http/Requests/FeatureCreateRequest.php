<?php

namespace Omatech\MageBdd\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bdd_domain_id' => 'required|exists:bdd_domains,id',
            'title' => 'required'
        ];
    }
}
