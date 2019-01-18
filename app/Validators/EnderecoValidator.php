<?php
namespace App\Validators;

use App\Traits\ValidatorTrait;
use Validator;

class EnderecoValidator
{
    use ValidatorTrait;

    public function validate($cep): bool
    {
        $rules = [
            'endereco' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required'
        ];
        $this->validator = Validator::make($cep, $rules);
        return $this->isValid();
    }
}
