<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;

class TimeSheetController extends Controller
{
    public function index()
    {
        
        $timesheets = Timesheet::all();
       
        return view('admin.timesheets.index', compact('timesheets'));
    }

    public function create()
    {
        return view('admin.timesheets.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'hour' => 'required|integer',
        'minutes' => 'required|integer',
        'is_active' => 'boolean',
    ]);

    Timesheet::create([
        'hour' => $request->input('hour'),
        'minutes' => $request->input('minutes'),   
        
        'is_active' => $request->has('is_active'),
    ]);
    return back();
}


public function edit(Request $request, $id)
{
    $timesheet = Timesheet::findOrFail($id);
    
    return view('admin.timesheets.edit', compact('timesheet'));
    $request->validate([
        'hour' => 'required|integer',
        'minutes' => 'required|integer',
        'is_active' => 'boolean',
    ]);

    $timesheet = Timesheet::find($id);

    // $timesheet->hour = $request->input('hour');
    // $timesheet->minutes = $request->input('minutes');
    // $timesheet->is_active = $request->has('is_active');

    // $timesheet->save();
    $timesheet->update($request->all());

    return back();

   
}

    public function delete($id)
{
    $timesheet = Timesheet::findOrFail($id);
    $timesheet->delete();
return back();
    // return redirect()->route('admin.timesheets.index')->with('success', 'Timesheet deleted successfully');
}

}
