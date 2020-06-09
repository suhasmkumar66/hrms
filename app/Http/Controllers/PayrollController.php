<?php

namespace App\Http\Controllers;

use App\Payroll;
use App\User;
use Illuminate\Http\Request;
use Log;

class PayrollController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$employees = User::query()
			->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
			->orderBy('users.name', 'ASC')
			->where('users.access_label', '>=', 2)
			->where('users.access_label', '<=', 3)
			->get(['designations.designation', 'users.name', 'users.id'])
			->toArray();


		return view('administrator.hrm.payroll.manage_salary', compact('employees'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function go(Request $request) {
		request()->validate([
			'user_id' => 'required',
		], [
			'user_id.required' => 'The employee name field is required',
		]);
		return redirect('/hrm/payroll/manage-salary/' . $request->user_id);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($user_id) {
		$employee_id = $user_id;

		$employees = User::query()
			->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
			->orderBy('users.name', 'ASC')
			->where('users.access_label', '>=', 2)
			->where('users.access_label', '<=', 3)
			->get(['designations.designation', 'users.name', 'users.id'])
			->toArray();

		$salary = Payroll::where('user_id', $employee_id)
			->first();

		if (!empty($salary)) {
			return view('administrator.hrm.payroll.edit_salary', compact('employees', 'employee_id', 'salary'));
		} else {
			return view('administrator.hrm.payroll.create_salary', compact('employees', 'employee_id'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
 		$salary = request()->validate([
			'ctc' => 'required',
			'employee_type' => 'required',
			'basic_salary' => 'required',
			'house_rent_allowance' => 'nullable',
			'medical_allowance' => 'nullable',
			'special_allowance' => 'nullable',
			'other_allowance' => 'nullable',
			'tax_deduction' => 'nullable',
			'other_deduction' => 'nullable',
			'employee_esi' => 'nullable',
			'employeer_esi' => 'nullable',
			'employee_pf' => 'nullable',
			'employeer_pf' => 'nullable',
			'gross_salary' => 'nullable',
			'total_deduction' => 'nullable',
			'net_salary' => 'nullable'
		]);

		$result = Payroll::create($salary + ['created_by' => auth()->user()->id, 'user_id' => $request->user_id]);
		$inserted_id = $result->id;

		if (!empty($inserted_id)) {
			return redirect('/hrm/payroll/salary-list')->with('message', 'Add successfully.');
		}
		return redirect('/hrm/payroll/salary-list')->with('exception', 'Operation failed !');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list() {
		$salaries = Payroll::query()
			->leftjoin('users', 'payrolls.user_id', '=', 'users.id')
			->leftjoin('designations', 'users.designation_id', '=', 'designations.id')
			->orderBy('users.name', 'ASC')
			->where('users.deletion_status', 0)
			->get([
				'payrolls.*',
				'users.name',
				'designations.designation',
			])
			->toArray();
			Log::info($salaries);

		return view('administrator.hrm.payroll.salary_list', compact('salaries'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Payroll  $payroll
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$salary = Payroll::query()
			->leftjoin('users', 'payrolls.user_id', '=', 'users.id')
			->leftjoin('designations', 'users.designation_id', '=', 'designations.id')
			->leftjoin('departments', 'designations.department_id', '=', 'departments.id')
			->orderBy('users.name', 'ASC')
			->where('payrolls.id', $id)
			->where('users.deletion_status', 0)
			->first([
				'payrolls.*',
				'users.name',
				'users.avatar',
				'designations.designation',
				'departments.department',
			])
			->toArray();
		return view('administrator.hrm.payroll.salary_details', compact('salary'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Payroll  $payroll
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$salary = Payroll::find($id);
		request()->validate([
			'ctc' => 'required',
			'employee_type' => 'required',
			'basic_salary' => 'required',
			'house_rent_allowance' => 'nullable',
			'medical_allowance' => 'nullable',
			'special_allowance' => 'nullable',
			'other_allowance' => 'nullable',
			'tax_deduction' => 'nullable',
			'other_deduction' => 'nullable',
			'employee_esi' => 'nullable',
			'employeer_esi' => 'nullable',
			'employee_pf' => 'nullable',
			'employeer_pf' => 'nullable',
			'gross_salary' => 'nullable',
			'total_deduction' => 'nullable',
			'net_salary' => 'nullable'
		]);

		$salary->employee_type = $request->get('employee_type');
		$salary->ctc = $request->get('ctc');
		$salary->basic_salary = $request->get('basic_salary');
		$salary->house_rent_allowance = $request->get('house_rent_allowance');
		$salary->medical_allowance = $request->get('medical_allowance');
		$salary->special_allowance = $request->get('special_allowance');
		$salary->other_allowance = $request->get('other_allowance');
		$salary->tax_deduction = $request->get('tax_deduction');
		$salary->other_deduction = $request->get('other_deduction');
		$salary->employee_esi = $request->get('employee_esi');
		$salary->employeer_esi = $request->get('employeer_esi');

		$salary->employee_pf = $request->get('employee_pf');
		$salary->employeer_pf = $request->get('employeer_pf');
		$salary->gross_salary = $request->get('gross_salary');
		$salary->total_deduction = $request->get('total_deduction');
		$salary->net_salary = $request->get('net_salary');
		
		$affected_row = $salary->save();

		if (!empty($affected_row)) {
			return redirect('/hrm/payroll/salary-list')->with('message', 'Update successfully.');
		}
		return redirect('/hrm/payroll/salary-list')->with('exception', 'Operation failed !');

		$result = Payroll::create($salary + ['created_by' => auth()->user()->id, 'user_id' => $request->user_id]);
		$inserted_id = $result->id;

		if (!empty($inserted_id)) {
			return redirect('/hrm/payroll/salary-list')->with('message', 'Add successfully.');
		}
		return redirect('/hrm/payroll/salary-list')->with('exception', 'Operation failed !');
	}
}
