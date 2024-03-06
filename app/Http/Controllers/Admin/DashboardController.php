<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatus;
use App\Http\Controllers\BackendController;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\PreRegister;
use App\Models\Sale;
use App\Models\VisitingDetails;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{
    public function __construct()
    {
        parent::__construct();

        $this->data['sitetitle'] = 'Dashboard';

        $this->middleware(['permission:dashboard'])->only('index');
    }
    public function index()
    {

        if(auth()->user()->getrole->name == 'Employee') {
            $visitors       = VisitingDetails::where(['employee_id'=>auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            $preregister    = PreRegister::where(['employee_id'=>auth()->user()->employee->id])->orderBy('id', 'desc')->get();
            $totalEmployees = 0;
        }else {
            $visitors       = VisitingDetails::orderBy('id', 'desc')->get();
            $preregister    = PreRegister::orderBy('id', 'desc')->get();
            $employees      = Employee::orderBy('id', 'desc')->get();
            $totalEmployees = count($employees);
        }

        $totalVisitor   = count($visitors);
        $totalPrerigister = count($preregister);


        $this->data['totalVisitor']    = $totalVisitor;
        $this->data['totalEmployees'] = $totalEmployees;
        $this->data['totalPrerigister']     = $totalPrerigister;
        $this->data['visitors']  = $visitors;

        return view('admin.dashboard.index', $this->data);
    }


}
