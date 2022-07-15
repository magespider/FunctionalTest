<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Auth;
use Hash;
class ChangePasswordController extends Controller
{    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit()
    { 
        return view('admin.change-password.edit');
    }
    public function update(Request $request){

        $validator = Validator::make($request->all(), [ 
            'current-password' => 'required',
            'password' => 'required|string|min:6|max:12|confirmed|alpha_num',
        ]);  

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } 
        
        if (!(Hash::check($request->get('current-password'), Auth::guard('admin')->user()->password))) {
            // The passwords matches
            return redirect()->back()->withErrors(["current-password" => "Please confirm your current password"]);
        } 
        if(strcmp($request->get('current-password'), $request->get('password')) == 0){
            //Current password and new password are same 
            return redirect()->back()->withErrors(["password" => "Your new password cannot be the same as the current password, please reconfirm"]);
        } 

        //Change Password
        $admin = Auth::guard('admin')->user();
        $admin->password = bcrypt($request->get('password'));
        $admin->save(); 
        Auth::guard('admin')->logout(); 
        return redirect(route('admin.login'))->with("status","The password has been successfully modified, please log in again with the new password."); 
    }
}
