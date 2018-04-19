<?php

namespace App\Http\Requests;

class PostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->main ? ',' . $this->main : $this->design ? ',' . $this->design : $this->beds ? ',' . $this->beds : $this->mattress ? ',' . $this->mattress : $this->pouffes ? ',' . $this->pouffes : '';
       // $id = $this->worldtc ? ',' . $this->worldtc :  '';
        if($id && $this->getMethod() != 'PUT') {
            return [
                'title' => 'bail|required|max:255',
                //'summary' => 'bail|required|max:65000',
                //'content' => 'bail|required|max:65000',
                'slug' => 'bail|required|max:255|unique:design|unique:beds|unique:mattress|unique:pouffes|unique:main,slug' . $id,
                // 'tags' => ['regex:/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/'],
            ];
        }else{
            return [
                'title' => 'max:255'
            ];
        }
    }
}
