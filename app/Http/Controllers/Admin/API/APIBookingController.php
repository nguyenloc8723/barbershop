<?php

namespace App\Http\Controllers\Admin\API;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class APIBookingController extends Controller
{
//    function uploadFile($folder, $files, $multiple = true)
//    {
//
//        $result = '';
//        if ($multiple == 'true'){
//            $uploadFile = [];
//            foreach ($files as $file){
//                $fileName = time().$file->getClientOriginalName();
//                $uploadFile[] = [
//                    'url' => $file->storeAs($folder, $fileName, 'public'),
//                ];
//            }
//            $result = $uploadFile;
//        }else{
//
//            if (is_array($files)){
//                $file = $files[0];
//            }else{
//                $file = $files;
//            }
//
//            $fileName = time().$file->getClientOriginalName();
//
//            $result = $file->storeAs($folder, $fileName, 'public');
//
//        }
//        return $result;
//    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Booking::query()->with('images')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $files = $request->file('files');
        $slug = Str::slug($request->input('name'));
//                Log::info($request->input('category_id'));
        $service = Booking::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'is_active' => $request->input('is_active'),
        ]);
        $id = $service->id;
        if ($request->hasFile('files')){
            $result = $this->uploadFile('images', $files);
            foreach ($result as $value){
//                Log::info($value);
                ImageBooking::create([
                    'url' => $value['url'],
                    'service_id' => $id,
                ]);
            }
        }
//        Log::info($request->file('files'));
        return response()->json(['success','Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataBooking = Booking::query()->with('images')->where('id',$id)->first();
        $dataCate = Booking_categories::all();
        return response()->json(['dataBooking' => $dataBooking, 'dataCate'=>$dataCate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
