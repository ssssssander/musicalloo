<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMusicSet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $musicSet = MusicSet::find($this->route('music.show'));

        // return $musicSet && $this->user()->can('update', $musicSet);
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
            'music_set_name' => 'required|string|unique:music_sets,name|max:255',
            'music_file' => 'required|mimetypes:audio/wav,audio/mpeg,audio/mp3|max:10000', // Max 10 MB
        ];
    }
}
