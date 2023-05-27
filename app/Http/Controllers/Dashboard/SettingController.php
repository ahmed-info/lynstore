<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        return "index";
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'phone'=>'string',
            'whatsapp'=>'string',
            'tiktok'=>'nullable|string',
            'youtube'=>'nullable|string',
            'facebook'=>'string',
            'instagram'=>'string',
            'exchange_rate'=>'numeric',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
         ]);

         $setting = Setting::find($id);
         $setting->phone = $request->phone;//
         $setting->whatsapp = $request->whatsapp;
         $setting->facebook = $request->facebook;//
         $setting->instagram = $request->instagram;//
         $setting->exchange_rate = $request->exchange_rate;//
         $setting->tiktok = $request->tiktok;
         $setting->youtube = $request->youtube;

         if($request->file('logo')){
            $destination = 'images/'. $setting->logo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $logo = $request->file('logo');
            $filename = time().'_'.$logo->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $logo->move("images/setting",$filename); //move to file
            $setting->logo = 'setting'.'/'.$filename;
         }

          $setting->update();
          return redirect()->route('dashboard.settings')->with('status', "brand updated successfully");
        }
}
