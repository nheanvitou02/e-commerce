<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $datas = User::when(request()->q, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->q . '%');
        })->orderBy('id', 'DESC')->paginate(5);

        return view('page.user.index', compact('datas'));
    }

    public function create(User $user)
    {
        return view('page.user.create', compact('user'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        try {
            $data->save();
        } catch (\Exception $errors) {
            return redirect()->back()
                ->withInput();
        }

        return redirect()->route('user.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('page.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required:unique:users,email,' . $user->id,
            'password' => 'confirmed'
        ]);

        if ($validator->fails()) {
            $validator->errors();
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        } catch (\Exception $errors) {
            return redirect()->back()
                ->withInput();
        }
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        if ($user) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}