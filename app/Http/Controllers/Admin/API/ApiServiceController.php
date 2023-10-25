<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\ImageService;
use App\Models\Service;
use App\Models\Service_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Mockery\Exception;

class ApiServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Service::query()->with('images')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $files = $request->file('files');
        $slug = Str::slug($request->input('name'));

        $service = $request->all();
        $model = new Service;
        $model->slug = $slug;
        $model->fill($service);
        $model->save();

        $id = $model->id;
        if ($request->hasFile('files')){
            $result = uploadFile('images', $files);
            foreach ($result as $value){
                ImageService::create([
                    'url' => $value['url'],
                    'service_id' => $id,
                ]);
            }
        }

        return response()->json(['success','Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataService = Service::query()
            ->with('images')
            ->where('id',$id)->first();

        $dataCate = Service_categories::all();
        return response()->json(['dataService' => $dataService, 'dataCate'=>$dataCate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $slug = Str::slug($request->input('name'));
            $service = $request->all();
            $model = Service::query()->findOrFail($id);
            $model->slug = $slug;
            $model->fill($service);
            $model->save();
            $idImg = $id;

            $check = false;
            if ($request->hasFile('files')){
                $imgService = ImageService::query()
                    ->where('service_id',$id)
                    ->get();
                foreach ($imgService as $item){
                    $item->delete();
                }

                $files = $request->file('files');
                $result = uploadFile('images', $files);
                foreach ($result as $value){
                    ImageService::create([
                        'url' => $value['url'],
                        'service_id' => $idImg,
                    ]);
                }
                $check = true;
            }

            return response()->json(['success'=>'Cập nhật dịch vụ thành công']);
        }catch (\Exception $e){

            return response()->json(['success'=>'Có lỗi xảy ra']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Service::find($id);
        $data->delete();
        return response()->json(['success','Đã vào thùng rác']);
    }

    public function getImage(string $id){
        $dataService = Service::query()
            ->with('images')
            ->where('id',$id)->first();
        return response()->json($dataService);
    }
}
