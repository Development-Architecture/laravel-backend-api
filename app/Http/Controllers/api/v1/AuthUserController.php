<?php

namespace App\Http\Controllers\api\v1;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UploadAuthUserNameRequest;
use App\Http\Requests\UploadAuthUserEmailRequest;
use App\Http\Requests\UploadAuthUserPasswordRequest;

class AuthUserController extends Controller
{
    use ApiResponser;

    public function __construct() {
        !$this->middleware('auth:user-api');
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

    public function getAuthUser()
    {
        return $this->success(auth()->user(), 'get auth user successfully');
    }

    public function nameChange(UploadAuthUserNameRequest $request)
    {
        $user = auth()->user();
        if($user)
        {
            $user->update(['name' => $request->name]);
        }
        return $this->success($user, 'update user successfully');
    }

    public function emailChange(UploadAuthUserEmailRequest $request)
    {
        $user = auth()->user();
        if($user)
        {
            $user->update(['email' => $request->email]);
        }
        return $this->success($user, 'update user successfully');
    }

    public function passwordChange(UploadAuthUserPasswordRequest $request)
    {
        $user = auth()->user();
        if($user)
        {
            $user->update(['password' => Hash::make($request->password)]);
        }
        return $this->success($user, 'update user successfully');
    }
}
