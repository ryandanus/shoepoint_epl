<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_recent_transactions = DB::table('transactions')
                                    ->join('users', 'users.id', '=', 'transactions.user_id')
                                    ->join('services', 'services.id', '=', 'transactions.service_id')
                                    ->join('status', 'status.id', '=', 'transactions.status_id')
                                    ->select('transactions.id', 'users.name', 'services.service_name', 'transactions.created_at', 'status.status_name')
                                    ->latest()->get();

        return view('admin.home')
                ->with('data_recent_transactions', $data_recent_transactions);
    }
}
