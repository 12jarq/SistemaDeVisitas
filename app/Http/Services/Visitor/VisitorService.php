<?php

namespace App\Http\Services\Visitor;

use App\Enums\Status;
use App\Http\Requests\VisitorRequest;
use App\Models\Booking;
use App\Models\PreRegister;
use App\Models\VisitingDetails;
use App\Models\Visitor;
use App\Notifications\SendVisitorToEmployee;
use Illuminate\Http\Request;
use DB;

class VisitorService
{

    public function all()
    {
        if(auth()->user()->getrole->name == 'Employee') {
            return VisitingDetails::where(['employee_id'=>auth()->user()->employee->id])->orderBy('id', 'desc')->get();
        }else {
            return VisitingDetails::orderBy('id', 'desc')->get();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        if(auth()->user()->getrole->name == 'Employee') {
            return VisitingDetails::where(['id'=>$id,'employee_id'=>auth()->user()->employee->id])->first();
        }else {
            return VisitingDetails::find($id);
        }
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhere($column, $value)
    {
        return VisitingDetails::where($column, $value)->get();
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findWhereFirst($column, $value)
    {

        return VisitingDetails::where($column, $value)->first();
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate($perPage = 10)
    {
        return VisitingDetails::paginate($perPage);
    }

    /**
     * @param VisitorRequest $request
     * @return mixed
     */
    public function make(VisitorRequest $request)
    {
        $visitor = DB::table('visiting_details')->orderBy('reg_no', 'desc')->first();
        $date    = date('y-m-d');
        $data    = substr($date, 0, 2);
        $data1   = substr($date, 3, 2);
        $data2   = substr($date, 6, 8);

        if ($visitor) {
            $value = substr($visitor->reg_no, -2);
            if ($value < 1000) {
                $reg_no = $data2 . $data1 . $data . ($value + 1);
            } else {
                $reg_no = $data2 . $data1 . $data . '01';
            }
        } else {
            $reg_no = $data2 . $data1 . $data . '01';
        }
        $input['first_name'] = $request->input('first_name');
        $input['last_name'] = $request->input('last_name');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        $input['gender'] = $request->input('gender');
        $input['address'] = $request->input('address');
        $input['national_identification_no'] = $request->input('national_identification_no');
        $input['is_pre_register'] = false;
        $input['status'] = Status::ACTIVE;
        $visitor = Visitor::create($input);

        if($visitor){
            $visiting['reg_no'] = $reg_no;
            $visiting['purpose'] = $request->input('purpose');
            $visiting['company_name'] = $request->input('company_name');
            $visiting['employee_id'] = $request->input('employee_id');
            $visiting['checkin_at'] = date('y-m-d H:i');
            $visiting['visitor_id'] = $visitor->id;
            $visiting['status'] = Status::ACTIVE;
            $visiting['user_id'] = $request->input('employee_id');
            $visitingDetails = VisitingDetails::create($visiting);
            if ($request->file('image')) {
                $visitingDetails->addMedia($request->file('image'))->toMediaCollection('visitor');
            }

            try {
                $visitingDetails->employee->user()->notify(new SendVisitorToEmployee($visitingDetails));
            } catch (\Exception $e) {
                // Using a generic exception

            }
        }else{
            $visitingDetails ='';
        }

        return $visitingDetails;

    }

    /**
     * @param $id
     * @param VisitorRequest $request
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $visitingDetails = VisitingDetails::findOrFail($id);

        $input['first_name'] = $request->input('first_name');
        $input['last_name'] = $request->input('last_name');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        $input['gender'] = $request->input('gender');
        $input['address'] = $request->input('address');
        $input['national_identification_no'] = $request->input('national_identification_no');
        $input['is_pre_register'] = false;
        $input['status'] = Status::ACTIVE;
        $visitingDetails->visitor->update($input);

        if($visitingDetails){
            $visiting['purpose'] = $request->input('purpose');
            $visiting['company_name'] = $request->input('company_name');
            $visiting['employee_id'] = $request->input('employee_id');
            $visiting['visitor_id'] = $visitingDetails->visitor->id;
            $visiting['status'] = Status::ACTIVE;
            $visiting['user_id'] = $request->input('employee_id');
            $visitingDetails->update($visiting);
        }

        if ($request->file('image')) {
            $visitingDetails->addMedia($request->file('image'))->toMediaCollection('visitor');
        }
        try {
            $visitingDetails->employee->user()->notify(new SendVisitorToEmployee($visitingDetails));
        } catch (\Exception $e) {
            // Using a generic exception

        }
        return $visitingDetails;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return VisitingDetails::find($id)->delete();
    }

}
