<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * @var CategoriaService
     */
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoriaService $service)
    {
        $this->service = $service;
    }

    public function query(Request $request)
    {
        return $this->service->query($request->all());
    }

    public function get()
    {
        return response()->json($this->service->get());
    }
}
