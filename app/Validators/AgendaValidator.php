<?php
namespace App\Validators;

use App\Traits\ValidatorTrait;
use Validator;

class AgendaValidator
{
    use ValidatorTrait;

    public function validate(array &$data, $id= null): bool
    {
        if (!$id) {
            $rules = [
                'titulo' => "required",
                'data_de' => "required",
                'hora_de' => "required",
                'data_ate' => "required",
                'hora_ate' => "required",
                'comentarios' => "required",
                'corretor_id' => "required"
            ];

            $this->validator = Validator::make($data, $rules);
        }

        return $this->isValid();
    }

    public function validateSendMessage(array &$data): bool
    {
        $rules = [
            'nome' => "required",
            'email' => "required",
            'creci' => "required",
            'gerente' => "required",
            'responsavel' => "required_unless:gerente,Sem gerente|exists:on_users,id",
            'data_visita' => "required",
            'msg' => "required"
        ];

        $this->validator = Validator::make($data, $rules);

        return $this->isValid();
    }
}
