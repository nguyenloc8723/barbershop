<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\FakeServices;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    const OBJ = 'client.display';
    const DOT = '.';
    public function services(){
        $data = FakeServices::query()->get();
        return view(self::OBJ. self::DOT . __FUNCTION__, compact('data'));
    }
    public function servicesPage(string $id)
    {
        $model = FakeServices::query()->findOrFail($id);
        return view(self::OBJ . self::DOT . __FUNCTION__, compact('model'));
    }
}
