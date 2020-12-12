<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->username;
            $user->password = Hash::make(123456);
            $user->email = $request->email;
            if ($request->activated = "activated")
            {
                $user->is_activated = true;
            }
            $user->save();
            if ($request->admin)
            {
                $user->roles()->attach(1);
            }
            else $user->roles()->attach(2);
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->gender = $request->gender;
            $profile->save();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            abort(500);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id', $id)->first();
            //dd($request->check);
            $user->is_activated = $request->check;
            $user->save();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            abort(500);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/home')->with('success', 'Student deleted successfully');
    }
}
