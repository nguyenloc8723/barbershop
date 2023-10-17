<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\StylistTimeSheet;
use App\Models\Stylist;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class ApiStylistTimeSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StylistTimeSheet::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stylistTimeSheets = StylistTimeSheet::create([
            'stylist_id' => $request->input('stylist_id'),
            'timesheet_id' => $request->input('timesheet_id'),
            'is_active' => $request->input('is_active'),
            'is_block' => $request->input('is_block'),
        ]);
        return response()->json(['success','Created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataStylistTimeSheets = StylistTimeSheet::query()->findOrFail($id);

        $dataStylist = Stylist::all();

        $dataTimeSheet = Timesheet::all();

        return response()->json(['dataStylistTimeSheets' => $dataStylistTimeSheets,
                                 'dataStylist'=>$dataStylist,
                                 'dataTimeSheet'=>$dataTimeSheet]);
    }
    public function getvalue()
    {
        $dataStylist = Stylist::all();
        $dataTimeSheet = Timesheet::all();

        return response()->json(['dataStylist'=>$dataStylist, 'dataTimeSheet'=>$dataTimeSheet]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $stylistTimeSheets = StylistTimeSheet::query()->where('id',$id)->update([
                'stylist_id' => $request->input('stylist_id'),
                'timesheet_id' => $request->input('timesheet_id'),
                'is_active' => $request->input('is_active'),
                'is_block' => $request->input('is_block'),
            ]);
            return response()->json(['success'=>'Cập nhật thành công']);
        }catch (\Exception $e){

            return response()->json(['success'=>'Không thể cập nhật!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StylistTimeSheet::find($id);
        $data->delete();
        return response()->json(['success','Moved successfully']);
    }
}
