<?php

namespace App\Http\Controllers\Admin;

use App\Models\AcademicYear;
use App\Models\FeeCategory;
use App\Models\SchoolProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use DB;
use App\Models\School;
use App\Models\FeesAndCharges;

class FeesAndChargesController extends BaseController
{

    public function index()
    {
        $user = \auth()->user();
        $feesAndCharges = FeesAndCharges::with('category', 'program', 'gradeYear')
            ->get();

        $school_info = School::where('id', $user->school_id)->first();
        return view('fees_and_charges.index', compact('school_info', 'feesAndCharges'));
    }

    public function create()
    {
        $user = \auth()->user();
        $feesCategories = FeeCategory::getForDropdown();
        $programs = SchoolProgram::getForDropdown();
        $gradeYears = SchoolProgram::getGradeYearForDropdown();
        return view('fees_and_charges.create', compact('feesCategories', 'programs'));
    }

    public function store(Request $request)
    {

        $user = \auth()->user();

        $request->validate([
            'category_id' => 'required',
            'program_id' => 'required',
            'grade_year_id' => 'required',
            'fee_domestic' => 'required',
        ]);

        $data = $request->only([
            'category_id', 'program_id', 'grade_year_id', '
           fee_domestic', 'fee_international', 'fee_special_needs',
            'comment', 'status', 'refundable'
        ]);

        $data['school_id'] = $user->school_id;

        $currentAcademicYear = AcademicYear::getCurrentAcademicYear();

        $data['academic_year_id'] = $currentAcademicYear->id ?? null;

        FeesAndCharges::create($data);

        return redirect()->route('fees-and-charges.index')
            ->with('success', 'Information added successfully.');
    }

    function show($id){
        $feesAndCharge = FeesAndCharges::where('id', $id)->first();

        return view('fees_and_charges.show', compact('feesAndCharge'));
    }

    public function edit($id)
    {
        $user = \auth()->user();

        $feesAndCharge = FeesAndCharges::where('id', $id)->first();

        $feesCategories = FeeCategory::getForDropdown();
        $programs = SchoolProgram::getForDropdown();
        $gradeYears = SchoolProgram::getGradeYearForDropdown($feesAndCharge->program_id);

        return view('fees_and_charges.edit', compact('feesAndCharge', 'feesCategories', 'programs', 'gradeYears'));

    }

    public function update(Request $request, $id)
    {

        $user = \auth()->user();

        $request->validate([
            'category_id' => 'required',
            'program_id' => 'required',
            'grade_year_id' => 'required',
            'fee_domestic' => 'required',
        ]);

        $data = $request->only([
            'category_id', 'program_id', 'grade_year_id', '
           fee_domestic', 'fee_international', 'fee_special_needs',
            'comment', 'status', 'refundable'
        ]);

        $feeAndCharge = FeesAndCharges::find($id);
        $feeAndCharge->update($data);

        return redirect()->route('fees-and-charges.index')
            ->with('success', 'Information successfully updated.');
    }


    public function destroy($id)
    {
        $feeAndCharge = FeesAndCharges::find($id);
        $feeAndCharge->delete();

        return redirect()->route('fees-and-charges.index')
            ->with('success', 'Information delete successfully');
    }

    public function details($id)
    {
        $fee_charge = FeesAndCharges::where('id', $id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $dep = FeeCategory::where('id', $fee_charge->category)->first();
        $html .= '<tr><th scope="row">Category:</th>';
        $html .= '<td>' . $dep->name . '</td></tr>';

        $html .= '<tr><th scope="row">Title:</th>';
        $html .= '<td>' . $fee_charge->name . '</td></tr>';

        $html .= '<tr><th scope="row">Amount for Students (Domestic):</th>';
        $html .= '<td>' . $fee_charge->fee_domestic . '</td></tr>';

        $html .= '<tr><th scope="row">Amount for Students (International):</th>';
        $html .= '<td>' . $fee_charge->fee_international . '</td></tr>';

        $html .= '<tr><th scope="row">Amount for Students (Special needs):</th>';
        $html .= '<td>' . $fee_charge->fee_special_needs . '</td></tr>';

        $html .= '<tr><th scope="row">Comment:</th>';
        $html .= '<td>' . $fee_charge->comment . '</td></tr>';

        $ref = 'No';
        if (isset($fee_charge->refundable) && $fee_charge->refundable == 1) {
            $ref = 'Yes';
        }
        $html .= '<tr><th scope="row">Refundable:</th>';
        $html .= '<td>' . $ref . '</td></tr>';

        $status = 'In-Active';
        if (isset($fee_charge->status) && $fee_charge->status == 1) {
            $status = 'Actie';
        }
        $html .= '<tr><th scope="row">Status:</th>';
        $html .= '<td>' . $status . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

}
