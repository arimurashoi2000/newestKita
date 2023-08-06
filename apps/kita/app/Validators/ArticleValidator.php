<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ArticleValidator {
    public function validate(array $data) {
        $validator = Validator::make($data, [
            'title' => 'required|max:20',
            'contents' => 'required|max:400',
        ]);

        $validatedData = $validator->validated();

        return $validatedData;
    }
}
