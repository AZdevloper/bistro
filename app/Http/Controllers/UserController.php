<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('profile', [
            'users' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
        $validatedData = $request->validate([
            
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6'
        ]);
        $user = User::findOrfail($id);
        // // dd($user);
        if ($validatedData['currentPassword']==$validatedData['newPassword']) {
            return redirect()->back()->withErrors(['status' => 'The new password cannot be the same as the current password.']);
            
        }
        if (!Hash::check($validatedData['currentPassword'], $user->password)) {
            return redirect()->back()->withErrors(['status' => 'The current password is incorrect.']);
        }
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('newPassword'));
        $user->name = $request->input('username');
        $user->save();

        $request->session()->flash('status', 'your new profile has been updated successfully !');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
