<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function showTrack(Request $request)
    {
        if(!isset($request->invoice)) // If Order Number is not inserted
        {
            return view('track');
        }

        $invoice_id = $request->invoice;

        $status = DB::table('transactions')
                        ->join('status', 'status.id', '=', 'transactions.status_id')
                        ->join('users', 'users.id', '=', 'transactions.user_id')
                        ->join('services', 'services.id', '=', 'transactions.service_id')
                        ->select('status.status_name', 'transactions.status_id', 'users.name', 'services.service_name', 'isONS')
                        ->where('transactions.id', $invoice_id)
                        ->first();

        if (!is_null($status))
        {
            return view('track')
                ->with('invoice_id', $invoice_id)
                ->with('statusName', $status->status_name)
                ->with('statusId', $status->status_id)
                ->with('username', $status->name)
                ->with('servicename', $status->service_name)
                ->with('isONS', $status->isONS);
        }
        else
        {
            return redirect()->route('tracking')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'No data of order number: ' . $invoice_id);
        }
    }
}
