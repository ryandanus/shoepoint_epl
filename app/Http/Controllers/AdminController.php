<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function checkRole()
    {
        $id = Auth::user()->id;
        return DB::table('users')
                    ->select('role_id')
                    ->where('id', $id)
                    ->first()->role_id;
    }

    public function displayNewUser()
    {
        $role = AdminController::checkRole();

        return view('admin.user.insert')
                ->with('role', $role);
    }

    public function displayNewOrder()
    {
        $datas = DB::table('services')
                    ->select('id', 'service_name', 'service_price')
                    ->get();

        return view('admin.transaction.insert')
                ->with('datas', $datas);
    }

    public function displayNewService()
    {
        $role = AdminController::checkRole();

        if($role != 3)
        {
            abort(403);
        }
        else
        {
            return view('admin.service.insert');
        }
    }

    public function displayAllUsers()
    {
        $role = AdminController::checkRole();
        $user_id = Auth::user()->id;

        $data_user = DB::table('users')
                    ->select('users.id', 'name', 'updated_at', 'email')
                    ->where('role_id', 1)
                    ->get();

        $data_admin = DB::table('users')
                    ->select('id', 'name', 'updated_at', 'email')
                    ->where('role_id', 2)
                    ->orWhere('role_id', 3)
                    ->get();

        return view('admin.user.view')
                ->with('data_user', $data_user)
                ->with('data_admin', $data_admin)
                ->with('role', $role)
                ->with('user_id', $user_id);
    }

    public function displayAllOrders()
    {
        $role = AdminController::checkRole();

        $datas = DB::table('transactions')
                    ->join('users', 'users.id', '=', 'transactions.user_id')
                    ->join('services', 'services.id', '=', 'transactions.service_id')
                    ->join('status', 'status.id', '=', 'transactions.status_id')
                    ->select('transactions.id', 'users.name', 'services.service_name', 'transactions.created_at', 'status.status_name')
                    ->get();

        return view('admin.transaction.view')
                ->with('datas', $datas)
                ->with('role', $role);
    }

    public function displayAllServices()
    {
        $role = AdminController::checkRole();

        $data = DB::table('services')
                ->join('users', 'services.user_id', '=', 'users.id')
                ->select('services.id', 'service_name', 'users.name', 'services.updated_at', 'service_price')
                ->get();

        return view('admin.service.view')
                ->with('datas', $data)
                ->with('role', $role);
    }

    public function displayEditUser($id)
    {
        $role = AdminController::checkRole();
        $data = DB::table('users')
                ->select('role_id', 'name', 'email', 'address', 'phone')
                ->where('id', $id)
                ->first();

        $temp = explode(' ', $data->name, 2);

        $data->firstname = $temp[0];
        $data->lastname = $temp[1];
        $data->id = $id;

        $user_id = Auth::user()->id;

        return view('admin.user.edit')
                ->with('data', $data)
                ->with('role', $role)
                ->with('user_id', $user_id);
    }

    public function displayEditService($id)
    {
        $data = DB::table('services')
                ->select('service_name', 'service_desc', 'service_price')
                ->where('id', $id)
                ->first();

        $temp = explode(' ', $data->service_name, 3);

        $data->service_name = $temp[2];
        $data->service_type = $temp[0];
        $data->service_price = intval($data->service_price);
        $data->id = $id;
        
        return view('admin.service.edit')
                ->with('data', $data);
    }

    public function displayEditOrder($id)
    {   
        $data_service = DB::table('services')
                    ->select('id', 'service_name', 'service_price')
                    ->get();

        $data_transaction = DB::table('transactions')
                            ->join('users', 'users.id', '=', 'transactions.user_id')
                            ->join('services', 'services.id', '=', 'transactions.service_id')
                            ->join('status', 'status.id', '=', 'transactions.status_id')
                            ->select('users.name', 'users.email', 'users.phone', 'users.address', 'service_id', 'isONS', 'total_amount', 'status.id as status_id', 'status.status_name')
                            ->where('transactions.id', $id)
                            ->first();

        $data_status = DB::table('status')
                        ->select('id', 'status_name')
                        ->get();

        $temp = explode(' ', $data_transaction->name, 2);

        $data_transaction->firstname = $temp[0];
        if(count($temp) == 2)
        {
            $data_transaction->lastname = $temp[1];
        }
        $data_transaction->total_amount = intval($data_transaction->total_amount);
        $data_transaction->id = $id;

        return view('admin.transaction.edit')
                ->with('data_service', $data_service)
                ->with('data_transaction', $data_transaction)
                ->with('data_status', $data_status);
    }

    public function displaySetting()
    {
        $id = Auth::user()->id;
        return view('admin.setting')
                ->with('id', $id);
    }

    public function addNewUser(Request $request)
    {
        $isEmailTaken = DB::table('users')
                        ->select('email')
                        ->where('email', $request->email)
                        ->first();
        
        if(!is_null($isEmailTaken))
        {
            return redirect()->back()
                    ->with('firstname', $request->firstname)
                    ->with('lastname', $request->lastname)
                    ->with('email', $request->email)
                    ->with('phone', $request->phone)
                    ->with('address', $request->address)
                    ->with('formError', 'Email is already taken.');
        }

        if(isset($request->lastname))
        {
            $name = $request->firstname . " " . $request->lastname;
        }
        else
        {
            $name = $request->firstname;
        }

        $password = Hash::make("123");

        $user_id = DB::table('users')
                    ->insertGetId([
                        'role_id' => $request->role,
                        'name' => $name,
                        'email' => $request->email,
                        'password' => $password,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'created_at' => Carbon::now('Asia/Jakarta'),
                        'updated_at' => Carbon::now('Asia/Jakarta')
                    ]);

        if(!is_null($user_id))
        {
            return redirect()->route('all-user')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'New user successfully added.');
        }
        else
        {
            return redirect()->route('new-user')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to add user.');
        }
    }

    public function addNewOrder(Request $request)
    {
        $updated_by = Auth::user()->id;
        $isIdExist = DB::table('users')
                    ->select('id')
                    ->where('email', $request->email)
                    ->first();

        if(is_null($isIdExist))
        {
            if(isset($request->lastname))
            {
                $name = $request->firstname . " " . $request->lastname;
            }
            else
            {
                $name = $request->firstname;
            }

            $password = Hash::make("123");
            
            $user_id = DB::table('users')
                    ->insertGetId([
                        'role_id' => 1,
                        'name' => $name,
                        'email' => $request->email,
                        'password' => $password,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'created_at' => Carbon::now('Asia/Jakarta'),
                        'updated_at' => Carbon::now('Asia/Jakarta')
                    ]);
        } else {
            $user_id = $isIdExist->id;
        }

        $status_id = 2;

        $transaction_id = DB::table('transactions')
                        ->insertGetId([
                            'user_id' => $user_id,
                            'status_id' => $status_id,
                            'service_id' => $request->servicetype,
                            'total_amount' => $request->total,
                            'isPaid' => true,
                            'isONS' => $request->onenightservice,
                            'updated_by' => $updated_by,
                            'created_at' => Carbon::now('Asia/Jakarta'),
                            'updated_at' => Carbon::now('Asia/Jakarta')
                        ]);
        
        if(!is_null($transaction_id))
        {
            return redirect()->route('all-order')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'New transaction successfully added.');
        }
        else
        {
            return redirect()->route('new-order')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to add transaction.');
        }

    }

    public function addNewService(Request $request)
    {
        $user_id = Auth::user()->id;

        if($request->servicetype == 1)
        {
            $service_type = "Regular";
        }
        else if($request->servicetype == 2)
        {
            $service_type = "Premium";
        }
        else
        {
            $service_type = "Other";
        }

        $service_desc = $request->servicedesc;
        $service_name = $service_type . " - " . $request->servicename;
        $service_price = $request->servicecost;

        //dd($user_id, $service_name, $service_price, $service_desc);

        $service_id = DB::table('services')
                        ->insertGetId([
                            'user_id' => $user_id,
                            'service_name' => $service_name,
                            'service_desc' => $service_desc,
                            'service_price' => $service_price,
                            'created_at' => Carbon::now('Asia/Jakarta'),
                            'updated_at' => Carbon::now('Asia/Jakarta')
                        ]);

        if(!is_null($service_id))
        {
            return redirect()->route('all-service')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'New service successfully added.');
        }
        else
        {
            return redirect()->route('new-service')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to add service.');
        }
    }

    public function updateUser($id, Request $request)
    {
        $isEmailTaken = DB::table('users')
                        ->select('email', 'id')
                        ->where('email', $request->email)
                        ->first();
        
        if(!is_null($isEmailTaken) && ($isEmailTaken->id != $id))
        {
            return redirect()->back()
                    ->with('formError', 'Email is already taken.');
        }

        if(isset($request->lastname))
        {
            $name = $request->firstname . " " . $request->lastname;
        }
        else
        {
            $name = $request->firstname;
        }

        $affected = DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'role_id' => $request->role,
                        'name' => $name,
                        'email' => $request->email,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'updated_at' => Carbon::now('Asia/Jakarta')
                    ]);

        if(!is_null($affected))
        {
            return redirect()->route('all-user')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'User successfully updated.');
        }
        else
        {
            return redirect()->route('all-user')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to update the user.');
        }



        return true;
    }

    public function updateService($id, Request $request)
    {
        $user_id = Auth::user()->id;

        if($request->servicetype == 1)
        {
            $service_type = "Regular";
        }
        else if($request->servicetype == 2)
        {
            $service_type = "Premium";
        }
        else
        {
            $service_type = "Other";
        }

        $service_desc = $request->servicedesc;
        $service_name = $service_type . " - " . $request->servicename;
        $service_price = $request->servicecost;

        //dd($user_id, $service_name, $service_price, $service_desc);

        $affected = DB::table('services')
                        ->where('id', $id)
                        ->update([
                            'user_id' => $user_id,
                            'service_name' => $service_name,
                            'service_desc' => $service_desc,
                            'service_price' => $service_price,
                            'updated_at' => Carbon::now('Asia/Jakarta')
                        ]);

        if(!is_null($affected) && $affected > 0)
        {
            return redirect()->route('all-service')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'Service successfully updated.');
        }
        else
        {
            return redirect()->route('edit-service, [$id]')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to update the service.');
        }
    }

    public function updateOrder($id, Request $request)
    {
        $updated_by = Auth::user()->id;

        $user_id = DB::table('users')
                    ->select('id')
                    ->where('email', $request->email)
                    ->first()->id;
        
        $affected = DB::table('transactions')
                    ->where('transactions.id', $id)
                    ->update([
                        'user_id' => $user_id,
                        'status_id' => $request->status,
                        'service_id' => $request->servicetype,
                        'total_amount' => $request->total,
                        'isPaid' => true,
                        'isONS' => $request->onenightservice,
                        'updated_by' => $updated_by,
                        'created_at' => Carbon::now('Asia/Jakarta'),
                        'updated_at' => Carbon::now('Asia/Jakarta')
                    ]);
    
        if(!is_null($affected))
        {
            return redirect()->route('all-order')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'Transaction successfully updated.');
        }
        else
        {
            return redirect()->route('new-order')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to update the transaction.');
        }
    }

    public function deleteService(Request $request)
    {
        $success = DB::table('services')
                ->where('id', $request->modal_service_id)
                ->delete();

        if($success == 1)
        {
            return redirect()->route('all-service')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'Service successfully deleted.');
        }
        else
        {
            return redirect()->route('all-service')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to delete the service.');
        }
    }

    public function deleteUser(Request $request)
    {
        $success = DB::table('users')
                ->where('id', $request->modal_user_id)
                ->delete();

        if($success == 1)
        {
            return redirect()->route('all-user')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'User successfully deleted.');
        }
        else
        {
            return redirect()->route('all-user')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to delete the user.');
        }
    }

    public function deleteOrder(Request $request)
    {
        $success = DB::table('transactions')
                ->where('id', $request->modal_order_id)
                ->delete();

        if($success == 1)
        {
            return redirect()->route('all-order')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'Transaction successfully deleted.');
        }
        else
        {
            return redirect()->route('all-order')
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to delete the transaction.');
        }
    }

    public function viewChangePassword($id)
    {
        return view('admin.changepassword')
                ->with('id', $id);
    }

    public function changePassword(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $currentPass = DB::table('users')
                        ->select('password')
                        ->where('id', $user_id)
                        ->first()->password;

        $isAuthenticated = Hash::check($request->currentpass, $currentPass);

        if($isAuthenticated)
        {
            $password = Hash::make($request->newpass);

            $affected = DB::table('users')
                        ->where('id', $user_id)
                        ->update([
                            'password' => $password
                        ]);            
        }
        else
        {
            return redirect()->route('show-change-password', [$id])
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'Your current password is wrong.');
        }

        if(!is_null($affected) && $affected > 0)
        {
            return redirect()->route('setting')
                    ->with('statusType', 'success')
                    ->with('statusMsg', 'Password successfully updated.');
        }
        else
        {
            return redirect()->route('show-change-password', [$id])
                    ->with('statusType', 'fail')
                    ->with('statusMsg', 'An error occurred while trying to update your password.');
        }
    }
}
