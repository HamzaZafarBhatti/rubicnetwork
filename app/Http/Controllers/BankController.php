<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'hello';
        $banks = Bank::all();
        $title = 'Banks';
        return view('admin.banks.index', compact('banks', 'title'));
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
            Bank::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            Session::flash('success', 'Bank added.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Bank addition failed.');
        }
        return redirect()->route('admin.banks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
        $title = 'Edit Bank';
        return view('admin.banks.edit', compact('bank', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
        try {
            $bank = Bank::find($request->id);
            $bank->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            Session::flash('success', 'Bank updated.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Bank update failed.');
        }
        return redirect()->route('admin.banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
