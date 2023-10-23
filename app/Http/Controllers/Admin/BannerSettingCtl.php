<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class BannerSettingCtl extends Controller
{
    //
    public $model = Banner::class;
    public $route = 'banner';
    public $pathViews = 'admin.banner';
    public $columns = [
        'id' => 'id',
        'key' => 'Key',
        'image' => 'Image'
    ];

    /**
     * Display a listing of the resource.
     * @throws BindingResolutionException
     */




    public function __construct()
    {
        if (class_exists($this->model)) {
            $this->model = app()->make($this->model);
        } else {
            $this->model = null;
        }
    }

    public function index()
    {
        if ($this->model !== null) {
            $data = $this->model->paginate();
        } else {
            $data = [];
        }
        return view($this->pathViews . '.' . __FUNCTION__, compact('data'))
            ->with('columns', $this->columns);
    }


    public function create()
    {
        return view($this->pathViews . '.' . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        function uploadFile($nameFolder, $file)
        {
            $fileName = time() . '' . $file->getClientOriginalName();
            return $file->storeAS($nameFolder, $fileName, 'public');
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->image = uploadFile('image', $request->file('image'));
        }

        $params = $request->except('_token');
        $params['image'] = $request->image;

        Banner::create($params);
        return redirect()->route($this->route . '.' . 'index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        
        function uploadFile2($nameFolder, $file)
        {
            $fileName = time() . '' . $file->getClientOriginalName();
            return $file->storeAS($nameFolder, $fileName, 'public');
        }
        $data = Banner::findOrFail($id);

        if ($request->isMethod('POST')) {

            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $resultDL = Storage::delete('/public/' . $data->image);
                if ($resultDL) {
                    $request->image = uploadFile2('image', $request->file('image'));
                    $params['image'] =  $request->image;
                }
            } else {
                $params['image'] = $data->image;
            }
        
            $result = Banner::where('id', $id)->update($params);
            return redirect()->route($this->route . '.' . 'index');
            
        }
            return view($this->pathViews . '.' . __FUNCTION__, compact('data'));
        
    }
    public function checkDelete(Request $request){
        $ids = $request->ids;
        Banner::withTrashed()->whereIn('id', $ids)->forceDelete();
        return response()->json(["success"=> "Banner delete success"]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id)
    {
        // $banner = Banner::where('id', $id)->delete(); Xóa Mềm
        $banner = Banner::withTrashed()->where('id', $id)->forceDelete(); //Xóa cứng đây😁
        return redirect()->route($this->route . '.' . 'index');
    }
}
