<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\GeneralEmail;
use App\Models\User;
use App\Models\Settings;
use App\Models\Currency;
use App\Models\Earners;
use App\Models\Etemplate;
use App\Models\PaymentProof;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PaymentProofController extends Controller
{



    public function paymentprooflog()
    {
        $data['title'] = 'Payment Proof logs';
        $data['paymentproof'] = PaymentProof::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.index', $data);
    }


    public function paymentproofapproved()
    {
        $data['title'] = 'Approved Payment Proof';
        $data['paymentproof'] = PaymentProof::with('user')->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.approved', $data);
    }

    public function paymentproofpending()
    {
        $data['title'] = 'Pending Payment Proof';
        $data['paymentproof'] = PaymentProof::with('user')->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.pending', $data);
    }

    public function paymentproofdeclined()
    {
        $data['title'] = 'Declined Payment Proof';
        $data['paymentproof'] = PaymentProof::with('user')->where('status', 2)->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.declined', $data);
    }

    public function DestroyPaymentProof($id)
    {
        $data = PaymentProof::find($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Payment Proof');
        }
    }

    public function approve($id)
    {
        $data = PaymentProof::find($id);
        $res = $data->update(['status' => 1]);
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Payment Proof');
        }
    }

    public function approve_multi(Request $request)
    {
        // return $request;
        foreach ($request->ids as $id) {
            $data = PaymentProof::find($id);
            $res = $data->update(['status' => 1]);
        }
        return 1;
    }

    public function decline($id)
    {
        $data = PaymentProof::find($id);
        $res = $data->update(['status' => 2]);
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Payment Proof');
        }
    }
}
