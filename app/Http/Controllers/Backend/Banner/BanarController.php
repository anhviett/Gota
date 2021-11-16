<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banar;
use Illuminate\Http\Request;

class BanarController extends Controller
{
    public function index(){
        $banars = Banar::all();
        return view('admin.banars.index', compact('banars'));
    }
    public function create(){
        $banars = Banar::all();

        return view('admin.banars.create', compact('banars'));
    }
    public function store(Request $request){

        $banars = new Banar();

        if($request->hasFile('images')){
            $img_path = saveFile($request->file('images'), 'ImageBanner/' . date('Y/m/d'));
            $banars->images = $img_path;

        }
        $banars->header = $request->input('inputHeader');
        $banars->title = $request->input('inputTitle');
        $banars->description = $request->input('inputDescription');
        $banars->bottom = $request->input('inputBottom');
        $banars->save();
        if($banars){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $banars = Banar::find($id);
        if($request->hasFile('images')){
            $img_path = saveFile($request->file('images'), 'ImageBanner/' . date('Y/m/d'));
            $banars->images = $img_path;

        }
        $banars->header = $request->input('inputHeader');
        $banars->title = $request->input('inputTitle');
        $banars->description = $request->input('inputDescription');
        $banars->bottom = $request->input('inputBottom');
        $banars->save();
        if($banars){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $banars =  Banar::all()->find($id);
        return view('admin.banars.edit', compact('banars'));

    }
    public function delete($id){
        Banar::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

}
