<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\MusicSet;

class StoreMusicSet extends FormRequest
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
        $fileInputIndex = $this->file_input_index;
        $musicFiles = $this->file('music_file.*');

        $validation = [
            'musicset_name' => 'required|string|max:255',
        ];
        $musicFilesValidation = [];

        for ($i = 0; $i < $fileInputIndex + 1; $i++) {
            $musicFilesValidation["music_file.{$i}"] = 'required|mimetypes:audio/*|max:10000'; // Max 10 MB
        }

        return array_merge($validation, $musicFilesValidation);
    }
}
