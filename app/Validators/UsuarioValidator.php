<?php
namespace App\Validators;

use App\Traits\ValidatorTrait;
use Illuminate\Validation\Rule;
use Validator;

class UsuarioValidator
{
    use ValidatorTrait;

    public function validate(array &$data, $id= null): bool
    {
        $rules = [
            "nome" => "required",
            "email" => "required",
            "telefone" => "required"
        ];

        $this->validator = Validator::make($data, $rules);

        return $this->isValid();
    }
}
