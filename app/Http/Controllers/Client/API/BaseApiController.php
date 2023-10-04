<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaseApiController extends Controller
{
    public $model;

    public function index(){
        $data = $this->model::all();
        return response()->json($data);
    }
}
