<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function info($id){
        $user = User::find($id);
        return view('admin.users.userProfile.info', compact('user'));
    }


    public function update(Request $request, $id){
        $user = User::find($id);
        if($request->hasFile('userProfileAvatarEdit')){
            $img_path = saveFile($request->file('userProfileAvatarEdit'), 'UserAvatar/' . date('Y/m/d'));
            $user->avatar = $img_path;
            $user->save();
        }

        $user->firstname = $request->input('inputFirstname');
        $user->lastname = $request->input('inputLastname');
        $user->email = $request->input('inputEmail');
        $user->password = Hash::make($request->input('inputPassword'));
        $user->education = $request->input('inputEducation');
        $user->skills = $request->input('inputSkills');
        $user->location = $request->input('inputLocation');
        $user->notes = $request->input('inputNote');
        $user->save();
        if($user){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
}
