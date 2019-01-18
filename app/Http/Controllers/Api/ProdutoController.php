<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * @var ProdutoService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProdutoService $service)
    {
        $this->service = $service;
    }

    public function query(Request $request)
    {
        return $this->service->query($request->all());
    }

    public function get($id)
    {
        return response()->json($this->service->get($id));
    }
}
