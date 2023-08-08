<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ArticleValidator {
    public function validate(array $data) {
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'contents' => 'required|max:2000',
            'member_id' => 'required',
            'tag_id' => 'array|max:5',
        ]);

        $validatedData = $validator->validated();

        return $validatedData;
    }
}
