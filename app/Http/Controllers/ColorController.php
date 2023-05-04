<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\File;
class ColorController extends Controller
{
    public function list()
    {

        $colors = Color::all();
        return view('pages.color.list',compact('colors'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'colorName_en'=>'required|string',
            'colorName_ar' =>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'colorCode' => ['nullable', 'regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
         ]);
         $color = new Color;
         $color->colorName_en = $request->colorName_en;
         $color->colorName_ar = $request->colorName_ar;
         $color->colorCode = $request->colorCode;
         $color->activeOrNot = 1;

         //image logo
        if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/color",$filename); //move to file
            $color->image = 'color'.'/'.$filename;
         }


          $color->save();
         return redirect()->route('dashboard.colors.list')->with('status', "Color created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);

        //dd($data);
        return view('pages.color.edit', compact('color'));
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
            'colorName_en'=>'required|string',
            'colorName_ar' =>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'colorCode' => ['nullable', 'regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
         ]);
         $color = Color::find($id);
         $color->colorName_en = $request->colorName_en;
         $color->colorName_ar = $request->colorName_ar;
         $color->colorCode = $request->colorCode;
         $color->activeOrNot = 1;

        if($request->file('image')){
            $destination = 'images/'. $productColor->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/color",$filename); //move to file
            $productColor->image = 'color'.'/'.$filename;
         }

         $color->update();
         return redirect()->route('dashboard.colors.list')->with('status', "Color updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);

        $destination = 'images/'. $color->image;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $color->delete();
        return redirect()->route('dashboard.colors.list')->with('status','Color Deleted Successfully');
    }
}
