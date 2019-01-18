<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EnderecoService;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * @var EnderecoService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EnderecoService $service)
    {
        $this->service = $service;
    }

    public function query(Request $request)
    {
        return $this->service->query($request->all());
    }
}
