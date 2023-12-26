<?php

namespace App\Http\Controllers\Admin;

use App\Models\SchoolProgram;
use App\Models\SubjectCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\Textbook;
use App\Models\Announcement;


class TextbookController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $Textbook = Textbook::where('school_id', $school_id)->get();
        $school_info = School::where('id', $school_id)->first();
        return view('academical.textbook.index', compact('school_info', 'Textbook'));
    }

    public function create()
    {
        return view('academical.textbook.create');
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'book_code' => 'required',
            'book_name' => 'required',
            'author_name' => 'required',
            'isbn_no' => 'string',
            'copyright' => 'string',
            'publisher' => 'string',
            'edition_no' => 'required',
            'status' => 'required'
        ]);

        $user = \auth()->user();

        $validData['school_id'] = $user->school_id;

        Textbook::create($validData);
        return redirect()->route('Textbook.index')
            ->with('success', 'Information added successfully.');
    }

    public function edit($id)
    {
        $textbook = Textbook::findOrFail($id);
        return view('academical.textbook.edit', compact('textbook'));
    }


    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'book_code' => 'required',
            'book_name' => 'required',
            'author_name' => 'required',
            'isbn_no' => 'string',
            'copyright' => 'string',
            'publisher' => 'string',
            'edition_no' => 'required',
            'status' => 'required'
        ]);

        $textbook = Textbook::find($id);

        $textbook->update($validData);

        return redirect()->route('Textbook.index')
            ->with('success', 'Information successfully updated.');
    }


    public function destroy($id)
    {
        $color = Textbook::find($id);
        $color->delete();
        return redirect()->route('textbook.index')
            ->with('success', 'Color delete successfully');
    }

    public function details($id)
    {
        $course_out = Textbook::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Book Code :</th>';
        $html .= '<td>' . $course_out->book_code . '</td></tr>';

        $html .= '<tr><th scope="row">Book Name :</th>';
        $html .= '<td>' . $course_out->book_name . '</td></tr>';

        $html .= '<tr><th scope="row">Author Name :</th>';
        $html .= '<td>' . $course_out->author_name . '</td></tr>';

        $html .= '<tr><th scope="row">ISBN No :</th>';
        $html .= '<td>' . $course_out->isbn_no . '</td></tr>';

        $html .= '<tr><th scope="row">Copyright :</th>';
        $html .= '<td>' . $course_out->copyright . '</td></tr>';

        $html .= '<tr><th scope="row">publisher:</th>';
        $html .= '<td>' . $course_out->publisher . '</td></tr>';

        $html .= '<tr><th scope="row">Edition No:</th>';
        $html .= '<td>' . $course_out->edition_no . '</td></tr>';

        $program = SchoolProgram::where('id', $course_out->program)->first();
        $html .= '<tr><th scope="row">Program:</th>';
        $html .= '<td>' . $program->program_name . '</td></tr>';

        $term = SchoolProgram::where('id', $course_out->term)->first();
        $html .= '<tr><th scope="row">Term:</th>';
        $html .= '<td>' . $term->term . '</td></tr>';

        $semester = SchoolProgram::where('id', $course_out->semester)->first();
        $html .= '<tr><th scope="row">Semester:</th>';
        $html .= '<td>' . $semester->semester . '</td></tr>';

        $subject_course = SubjectCourse::where('id', $course_out->subject_course)->first();
        $html .= '<tr><th scope="row">Subject Course:</th>';
        $html .= '<td>' . $subject_course->crn_name . '</td></tr>';

        $status = 'In-Active';
        if ($course_out->status == 1) {
            $status = 'Active';
        }
        $html .= '<tr><th scope="row">Status:</th>';
        $html .= '<td>' . $status . '</td></tr>';


        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    public function getTextbookInfo()
    {
        $id = \request()->input('id');

        $textbook = Textbook::findOrFail($id);

        return response()->json(['status' => 'success', 'data' => $textbook]);

    }

}
