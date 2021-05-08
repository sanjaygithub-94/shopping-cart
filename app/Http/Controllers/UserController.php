<?php

namespace App\Http\Controllers;
use App\Services\UserService;

use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService) 
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->index();
   
        return view('Customer.list', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->userService->store($request);
        if (!$create) return abort(500, 'Whoops, looks like something went wrong');
        
        return Response::json(['success' => '1']);
    }

    /**
     * User edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        return $this->userService->editUser($id);
    }

    /**
     * User update
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $update = $this->userService->updateUser($request->user_id);
        
        if (!$update) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $delete = $this->userService->deleteUser($id);
  
        if (!$delete) return abort(500, 'Whoops, looks like something went wrong');

        return Response::json(['success' => '1']);
    }
}
