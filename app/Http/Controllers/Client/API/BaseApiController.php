<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaseApiController extends Controller
{
    public $model;
    public $modelChooService;

    public function index(){
        $data = $this->model::all();
        return response()->json($data);
    }

    public function loadService(){
        $data = $this->modelChooService::query()->with('service')->get();
        return response()->json($data);
    }
}
