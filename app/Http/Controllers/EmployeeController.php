<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');//variable for search data employee
        $query = Employee::select(['id_employee', 'first_name', 'last_name',
        'email', 'phone_number', 'address', 'gender'])->get();
        if($keyword)
        {
            $query = Employee::where('first_name', 'LIKE', "%$keyword%")->get();
        }
        return response([
            'status' => 'OK',
            'message' => 'Show Employees Data',
            'data' => $query
        ], 200);

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
         //check employees data using validation laravel
         $request->validate([
            'first_name' => 'required|max:25', 'string',
            'last_name' => 'required|max:25', 'string',
            'email' => 'required', 'string', 'email:rfc,dns', 'max:50', 'unique:users',
            'phone_number' => 'required|max:15', 'integer|max:15',
            'address' => 'required',
            'gender' => 'required'
        ]);

        //query for insert employee data
        $insert = new Employee();
        $insert->first_name = $request->first_name;
        $insert->last_name = $request->last_name;
        $insert->email = $request->email;
        $insert->phone_number = $request->phone_number;
        $insert->address = $request->address;
        $insert->gender = $request->gender;
        $insert->save();
        return response([
            'status' => 'Created',
            'message' => 'Data Saved',
            'data' => $insert
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
        //check employees data using validation laravel
        $request->validate([
            'first_name' => 'required|max:25', 'string',
            'last_name' => 'required|max:25', 'string',
            'email' => 'required', 'string', 'email:rfc,dns', 'max:50', 'unique:users',
            'phone_number' => 'required|max:15', 'integer|max:15',
            'address' => 'required',
            'gender' => 'required'
        ]);

        //check data for update with primary key
        $checkEmployeeData = Employee::firstWhere('id_employee', $id);
        if($checkEmployeeData)
        {
            //if data is available
            $query = Employee::find($id);
            $query->first_name = $request->first_name;
            $query->last_name = $request->last_name;
            $query->email = $request->email;
            $query->phone_number = $request->phone_number;
            $query->address = $request->address;
            $query->gender = $request->gender;
            $query->save();
            return response([
                'status' => 'OK',
                'message' => 'Updated Data',
                'data' => $query
            ], 200);
        } else {
            //if data not available
            return response([
                'status' => 'Not Found',
                'message' => 'employee id is not found'
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
        $checkEmployeeData = Employee::firstWhere('id_employee', $id);
        if($checkEmployeeData)
        {
            Employee::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Deleted Data',
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'employee id is not found'
            ], 404);
        }
    }
}
