<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;

class StoreBookCoverRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cover' => ['nullable', File::image()->max('10mb')],
            'cover_id' => 'nullable|integer|exists:files,id',
        ];
    }

    public function getUploadedImage(): ?UploadedFile
    {
        return $this->file('cover');
    }
}
