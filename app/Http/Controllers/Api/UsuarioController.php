<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * @var UsuarioService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    public function query(Request $request)
    {
        return $this->service->query($request->all());
    }
}
