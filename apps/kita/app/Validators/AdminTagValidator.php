<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AdminTagValidator {
    public function validate(array $data) {
        $validator = Validator::make($data, [
            'tag_name' => 'required|max:20',
        ]);

        $validatedData = $validator->validated();

        return $validatedData;
    }
}
