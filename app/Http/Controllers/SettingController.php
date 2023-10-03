<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings',
            'value' => 'required',
        ]);

        Setting::create([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('settings.index')->with('success', 'Setting created successfully');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'key' => 'required|unique:settings,key,'.$id,
            'value' => 'required',
        ]);

        $setting = Setting::findOrFail($id);
        $setting->update([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully');
    }

    public function deleteConfirm($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.delete-confirm', compact('setting'));
    }

    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully');
    }
}
