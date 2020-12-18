<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; //add model

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $keyword = $request->get('keyword'); //variable for search data admin
        $queryAdminSelect = Admin::all(); //query for show data admin
        if($keyword)
        {
            $queryAdminSelect = Admin::where('first_name', 'LIKE', "%$keyword%")->get();
        }
        return response([
            'status' => 'OK',
            'message' => 'Show Admin Data',
            'data' => $queryAdminSelect
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check admin data using validation laravel
        $request->validate([
            'first_name' => 'required|max:25', 'string',
            'last_name' => 'required|max:25', 'string',
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => 'required', 'string'
        ]);

        //query for insert admin data
        $insertAdminData = new Admin();
        $insertAdminData->first_name = $request->first_name;
        $insertAdminData->last_name = $request->last_name;
        $insertAdminData->email = $request->email;
        $insertAdminData->password = $request->password;
        $insertAdminData->save();
        return response([
            'status' => 'Created',
            'message' => 'Data Saved',
            'data' => $insertAdminData
        ], 201);
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
        //check data for update with primary key
        $checkAdminData = Admin::firstWhere('id_admin', $id);
        if($checkAdminData)
        {
            //if data is available
            $updateAdminData = Admin::find($id);
            $updateAdminData->first_name = $request->first_name;
            $updateAdminData->last_name = $request->last_name;
            $updateAdminData->email = $request->email;
            $updateAdminData->password = $request->password;
            $updateAdminData->save();
            return response([
                'status' => 'OK',
                'message' => 'Updated Data',
                'data' => $updateAdminData
            ], 200);
        } else {
            //if data not available
            return response([
                'status' => 'Not Found',
                'message' => 'admin id is not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check data for delete with primary key
        $checkAdminData = Admin::firstWhere('id_admin', $id);
        if($checkAdminData)
        {
            Admin::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Deleted Data',
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'admin id is not found'
            ], 404);
        }
    }
}
