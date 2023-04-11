<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return "index";
    }
    public function update(SettingUpdateRequest $request, Setting $id)
    {
        $id->update($request->validated());
        return redirect()->route('dashboard.setting2');
    }
}
