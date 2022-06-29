<?php

namespace App\Http\Controllers;

use App\Models\WalletAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WalletAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wallet_addresses = WalletAddress::all();
        $title = 'Wallet Addresses';
        return view('admin.wallet_addresses.index', compact('wallet_addresses', 'title'));
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
        // return $request;
        
        $validated = $request->validate([
            'address' => 'required|string|unique:wallet_addresses|max:255|regex:/^\S*$/u',
        ]);
        try {
            WalletAddress::create($request->except('_token'));
            Session::flash('success', 'Wallet Address added.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Wallet Address addition failed.');
        }
        return redirect()->route('admin.wallet_addresses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletAddress  $walletAddress
     * @return \Illuminate\Http\Response
     */
    public function show(WalletAddress $walletAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalletAddress  $walletAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletAddress $walletAddress)
    {
        //
        $title = 'Edit Wallet Address';
        return view('admin.wallet_addresses.edit', compact('walletAddress', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WalletAddress  $walletAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WalletAddress $walletAddress)
    {
        //
        try {
            $walletAddress->update($request->except('_token', '_method'));
            Session::flash('success', 'Wallet Address updated.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Wallet Address update failed.');
        }
        return redirect()->route('admin.wallet_addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalletAddress  $walletAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalletAddress $walletAddress)
    {
        //
        try {
            $walletAddress->delete();
            Session::flash('success', 'Wallet Address deleted.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error! Wallet Address delete failed.');
        }
        return redirect()->route('admin.wallet_addresses.index');
    }
}
