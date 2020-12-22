<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OffWork;

class OffWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = OffWork::select(['id_off_work','employee_id', 'reason',
        'start_date', 'finish_date'])->get();
        return response([
            'status' => 'OK',
            'message' => 'Show Off Work Data',
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
         //check off work data using validation laravel
         $request->validate([
            'employee_id' => 'required', 'integer',
            'reason' => 'required', 'string',
            'start_date' => 'required|date_format:"Y-m-d"',
            'finish_date' => 'required|date_format:"Y-m-d"',
        ]);

        //query for insert off work data
        $insert = new OffWork();
        $insert->employee_id = $request->employee_id;
        $insert->reason = $request->reason;
        $insert->start_date = $request->start_date;
        $insert->finish_date = $request->finish_date;
        $insert->save();
        return response([
            'status' => 'OK',
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
         //check off work data using validation laravel
         $request->validate([
            'employee_id' => 'required', 'integer',
            'reason' => 'required', 'string',
            'start_date' => 'required|date_format:"Y-m-d"',
            'finish_date' => 'required|date_format:"Y-m-d"',
        ]);

        //check data for update with primary key
        $checkOffWorkData = OffWork::firstWhere('id_off_work', $id);
        if($checkOffWorkData)
        {
            //if data is available
            $query = OffWork::find($id);
            $query->employee_id = $request->employee_id;
            $query->reason = $request->reason;
            $query->start_date = $request->start_date;
            $query->finish_date = $request->finish_date;
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
                'message' => 'off work id is not found'
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
              $checkEmployeeData = OffWork::firstWhere('id_off_work', $id);
              if($checkEmployeeData)
              {
                  OffWork::destroy($id);
                  return response([
                      'status' => 'OK',
                      'message' => 'Deleted Data',
                  ], 200);
              } else {
                  return response([
                      'status' => 'Not Found',
                      'message' => 'off work id is not found'
                  ], 404);
              }
    }
}
