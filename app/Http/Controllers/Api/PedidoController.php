<?php

namespace App\Http\Controllers\Api;

use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use App\Services\PedidoService;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * @var PedidoService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PedidoService $service)
    {
        $this->service = $service;
    }

    public function query(Request $request)
    {
        return response()->json($this->service->query($request->all()));
    }

    public function get($id)
    {
        return response()->json($this->service->get($id));
    }

    public function post(Request $request)
    {
        return response()->json($this->service->save($request->all()), HttpStatus::CREATED);
    }
}
