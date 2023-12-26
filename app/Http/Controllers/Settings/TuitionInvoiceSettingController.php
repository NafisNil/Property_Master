<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\FeesAndCharges;
use App\Models\SchoolProgram;
use App\Models\StudentDetail;
use App\Models\TuitionInvoiceSetting;
use Illuminate\Http\Request;

class TuitionInvoiceSettingController extends Controller
{

    function index()
    {
        $user = auth()->user();

        $invoiceSettings = TuitionInvoiceSetting::where('school_id', $user->school_id)
            ->get();

        return view('setting.tuition-invoice.index', compact('invoiceSettings'));
    }

    function create()
    {

        $programs = SchoolProgram::getForDropdown();

        return view("setting.tuition-invoice.create", compact('programs'));
    }


    function store()
    {

        \request()->input([
            'date' => 'required',
            'due_date' => 'required',
            'has_late_fee' => 'required',
        ]);

        $user = auth()->user();

        $data = \request()->only([
            'date', 'due_date', 'has_late_fee', 'late_fee',
            'has_cumulative_late_fee', 'cumulative_late_fee', 'interval',
            'program_id', 'grade_year_id', 'status'
        ]);

        $data['school_id'] = $user->school_id;

        TuitionInvoiceSetting::create($data);

        toastr()->success("success");

        return redirect()->route('tuition-invoice-settings.index');

    }

    function edit($id)
    {
        $invoiceSetting = TuitionInvoiceSetting::with(['program', 'gradeYear'])->findOrFail($id);

        $programs = SchoolProgram::getForDropdown();
        $gradeYears = SchoolProgram::getGradeYearForDropdown($invoiceSetting->program_id);

        return view('setting.tuition-invoice.edit', compact('invoiceSetting', 'programs', 'gradeYears'));
    }

    function update(Request $request, $id)
    {
        \request()->input([
            'date' => 'required',
            'due_date' => 'required',
            'has_late_fee' => 'required',
        ]);

        $user = auth()->user();

        $data = \request()->only([
            'date', 'due_date', 'has_late_fee', 'late_fee',
            'has_cumulative_late_fee', 'cumulative_late_fee', 'interval',
            'program_id', 'grade_year_id', 'status'
        ]);

        $invSetting = TuitionInvoiceSetting::findOrFail($id);

        $invSetting->update($data);

        toastr()->success("success");

        return redirect()->route('tuition-invoice-settings.index');
    }

    function destroy($id)
    {
        $invSetting = TuitionInvoiceSetting::findOrFail($id);
        $invSetting->delete();
        toastr()->success('Invoice deleted successfully');
        return redirect()->back();
    }

    function generateInvoice()
    {
        $user = auth()->user();

        //Find Active Settings

        $activeSettings = TuitionInvoiceSetting::where('school_id', $user->school_id)
            ->where("status", 1)->get();

        foreach ($activeSettings as $setting) {
            $tuitionCharge = FeesAndCharges::whereHas('category', function ($query) {
                $query->where('name', 'tuition');
            })
                ->where('program_id', $setting->program_id)
                ->where('grade_year_id', $setting->grade_year_id)
                ->first();

            //we found tuition fee

            //now generate invoice for each student

            $students = StudentDetail::with('studentType')->where('program_id', $setting->program_id)
                ->where('grade_year_id', $setting->grade_year)
                ->get();

            foreach ($students as $student) {

                if ($student->studentType->name == 'domestic') {
                    $tuitionFee = $tuitionCharge->fee_domestic;
                } elseif ($student->studentType->name == 'international') {
                    $tuitionFee = $tuitionCharge->fee_international;
                } elseif ($student->has_special_needs) {
                    $tuitionFee = $tuitionCharge->fee_special_needs;
                }

                // todo sent email to student

            }

            //Todo Sent Email to parents and students

        }

        toastr()->success('succes');

        return redirect()->back();

    }

}
