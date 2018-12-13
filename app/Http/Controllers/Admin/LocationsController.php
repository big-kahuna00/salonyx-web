<?php

namespace App\Http\Controllers\Admin;

use App\Location;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocationsRequest;
use App\Http\Requests\Admin\UpdateLocationsRequest;
use DB;
class LocationsController extends Controller
{
    /**
     * Display a listing of Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // if (! Gate::allows('employee_access')) {
//            return abort(401);
//        }

        $locations = Location::all();

        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating new Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if (! Gate::allows('employee_create')) {
//            return abort(401);
//        }

        return view('admin.locations.create');
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationsRequest $request)
    {
        //if (! Gate::allows('employee_create')) {
//            return abort(401);
//        }
        $employee = Location::create($request->only(['name', 'street_address', 'city', 'state','zip']));
		//$services_ids = [];
		//foreach($request->services as $service) :
		//$services_ids[] = $service;
		//endforeach;
		//$employee->services()->attach($services_ids);

        return redirect()->route('admin.locations.index');
    }


    /**
     * Show the form for editing Employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //if (! Gate::allows('employee_edit')) {
//            return abort(401);
//        }
        $location = Location::findOrFail($id);

        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update Employee in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationsRequest $request, $id)
    {
        //if (! Gate::allows('employee_edit')) {
//            return abort(401);
//        }
        $location = Location::findOrFail($id);
        $location->update($request->all());



        return redirect()->route('admin.locations.index');
    }


    /**
     * Display Employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //if (! Gate::allows('location_view')) {
//            return abort(401);
//        }
        //$relations = [
//            'working_hours' => \App\WorkingHour::where('employee_id', $id)->get(),
//            'appointments' => \App\Appointment::where('employee_id', $id)->get(),
//        ];

        $location = Location::findOrFail($id);

        return view('admin.locations.show', compact('employee') /*+ $relations */);
    }


    /**
     * Remove Employee from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('employee_delete')) {
            return abort(401);
        }
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Delete all selected Employee at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('employee_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Employee::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
	
	public function GetEmployees(Request $request)
	{
		$employees = DB::table('employees')->join('working_hours', function ($join) use ($request) {
			$join->on('employees.id', '=', 'working_hours.employee_id')
			->where('working_hours.date', '=', $request->date);
		})->get();
		$service = \App\Service::find($request->service_id);
		$html = "";
		$html .= "<div class='row employees'>";
		$html .= "<div class='col-xs-12 form-group'>";
		$html .= "<label class='control-label'>Employee*</label>";
		$html .= "<ul class='list-inline'>";
		if(is_object($employees) && count($employees) > 0):
		foreach($employees as $employee) :
			$html .= "<li><label><input type='radio' name='employee_id' class='employee_id' value='".$employee->id."'> ".$employee->first_name." ".$employee->last_name." (<span class='starting_hour_$employee->id'>".date("H", strtotime($employee->start_time))."</span>:<span class='starting_minute_$employee->id'>".date("i", strtotime($employee->start_time))."</span> - <span class='finish_hour_$employee->id'>".date("H", strtotime($employee->finish_time))."</span>:<span class='finish_minute_$employee->id'>".date("i", strtotime($employee->finish_time))."</span>)</label></li>";
		endforeach;
		else :
		$html .= "<li>No employees working on your selected date</li>";
		endif;
		$html .= "</ul>";
		$html .= "</div>";
		$html .= "</div>";
		return $html;
		
	}

}
