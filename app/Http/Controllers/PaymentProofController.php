<?php

namespace App\Http\Controllers;

use App\Models\PaymentProof;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class PaymentProofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = 'Payment Proof logs';
        $data['paymentproof'] = PaymentProof::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.index', $data);
    }
    public function pending()
    {
        //
        $data['title'] = 'Pending Payment Proof';
        $data['paymentproof'] = PaymentProof::with('user')->where('status', '0')->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.pending', $data);
    }
    public function approved()
    {
        //
        $data['title'] = 'Approved Payment Proof';
        $data['paymentproof'] = PaymentProof::with('user')->where('status', '1')->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.approved', $data);
    }
    public function declined()
    {
        $data['title'] = 'Declined Payment Proof';
        $data['paymentproof'] = PaymentProof::with('user')->where('status', '2')->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.declined', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.payment_proofs.create');
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
        $validator = Validator::make($request->all(), [
            'caption' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $errors = $validator->errors();
            $html_err = "Error: ";
            $html_err .= implode(', ', $errors->all());
            return back()->with('error', $html_err);
        }
        // return $request;
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'proof_' . time() . '.jpg';
            $location = 'asset/payment_proofs/' . $filename;
            Image::make($image)->save($location);
            $data['image'] = $filename;
        }
        $data['user_id'] = auth()->user()->id;
        // return $data;
        $res = PaymentProof::create($data);
        if ($res) {
            $user = User::find(auth()->user()->id);
            $user->update(['show_popup' => 0]);
            return back()->with('success', 'Payment Proof uploaded Successfully!');
        } else {
            return back()->with('alert', 'Problem uploading payment proof');
        }
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
    public function approve($id)
    {
        //
        $data = PaymentProof::find($id);
        $res = $data->update(['status' => '1']);
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Payment Proof');
        }
    }
    public function decline($id)
    {
        //
        $data = PaymentProof::find($id);
        $res = $data->update(['status' => '2']);
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Payment Proof');
        }
    }
    public function approve_multi(Request $request)
    {
        foreach ($request->ids as $id) {
            $data = PaymentProof::find($id);
            $res = $data->update(['status' => '1']);
        }
        return 1;
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
        $data = PaymentProof::find($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Payment Proof');
        }
    }
}
