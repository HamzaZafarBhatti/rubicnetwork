<?php

namespace App\Http\Controllers;

use App\Models\DataOperator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_operators = DataOperator::all();
        $title = 'Data Operators';
        return view('admin.data_operators.index', compact('data_operators', 'title'));
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
        try {
            DataOperator::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            Session::flash('success', 'Data Operator added.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Data Operator addition failed.');
        }
        return redirect()->route('admin.data_operators.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataOperator  $dataOperator
     * @return \Illuminate\Http\Response
     */
    public function show(DataOperator $dataOperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataOperator  $dataOperator
     * @return \Illuminate\Http\Response
     */
    public function edit(DataOperator $data_operator)
    {
        //
        $title = 'Edit Data Operator';
        return view('admin.data_operators.edit', compact('data_operator', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataOperator  $dataOperator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataOperator $data_operator)
    {
        //
        try {
            $data_operator->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            Session::flash('success', 'Data Operator updated.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Data Operator update failed.');
        }
        return redirect()->route('admin.data_operators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataOperator  $dataOperator
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataOperator $dataOperator)
    {
        //
    }
}
