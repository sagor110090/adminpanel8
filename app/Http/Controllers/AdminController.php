<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{



    public function profileUpdate(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')->store('uploads', 'public');
        }
        if ($request->password) {
            $requestData['password'] = bcrypt($request->password);
        }else{
            $requestData['password'] = auth()->user()->password;
        }

        User::find(auth()->user()->id)->update($requestData);

        return back();
    }
}
