<?php

namespace App\Services;
use App\Models\User;
use Carbon\Carbon;


class UserService
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        return User::create(request()->only([
            'name','email'
        ]));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::select('id', 'name','email')->where('role', 0)->get();
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function editUser($id)
    {
        return User::select('id', 'name','email')->where('id', $id)->first();
    }

    /*
     * Update the specified resource in storage.
     */
    public function updateUser($id)
    {
        return User::where('id', $id)->update(request()->only([
            'name','email'
        ]));
    }

    /*
     * Update the specified resource in storage.
     */
    public function deleteUser($id)
    {
        return User::where('id', $id)->update(['is_deleted' => 1]);
    }

}
