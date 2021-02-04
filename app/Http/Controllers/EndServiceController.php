<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EndServiceController extends Controller
{
    //
    public function endServiceForm($id){
        $employee=Employee::find($id);
        return view ('employees.end-service',compact('employee'));
    }

    public function calcEndService(Request $request){
        $employee=$this->updateResignationReason($request);
        
        return response()->json(['end_service'=>$this->actualEndService($employee)]);

    }

    public function updateResignationReason($request){
        $employee=Employee::find($request->employeeId);
        $employee->resignation_reason=$request->reason;
        $employee->save();
        return $employee;
    }
    public function endService($work_years,$salary){
        $firstFiveYears=$work_years-5<0?($work_years-2<0?0:$work_years):5;
        $firstFiveYearsService=$salary/2*$firstFiveYears;

        $restYears=$firstFiveYears<5?0:$work_years-5;
        $restYearsService=$salary*$restYears;

        return $firstFiveYearsService+$restYearsService;


    }

    public function actualEndService($employee){
        $fullEndService=$this->endService($employee->work_years,$employee->salary);
        $actualEndService=(in_array($employee->resignation_reason,['childbirth','marriage','force_majeure','contract']) || $employee->work_years>=10)? 
                                                $fullEndService:
                                                ($employee->work_years>=2?($employee->work_years>=5?$fullEndService*2/3:$fullEndService/3):0);
        return $actualEndService;
    }

}
