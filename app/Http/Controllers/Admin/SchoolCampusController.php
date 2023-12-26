<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\SchoolCampus;


class SchoolCampusController extends Controller
{
    public function index()
    {
        $user = \auth()->user();
        $schoolCampus = SchoolCampus::where('school_id', $user->school_id)->get();
        $school_info = School::where('id', $user->school_id)->first();
        return view('academical.campus.index', compact('school_info', 'schoolCampus'));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();
        return view('academical.campus.create', compact('school_info'));
    }

    public function store(Request $request)
    {

        $user = \auth()->user();

        $request->validate([
            'campus_code' => 'required',
        ]);
        $address = array(
            'name' => $request->address_line,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'zip' => $request->zip_code,
        );
        $addressId = \App\Models\Address::create($address);

        $request->address = $addressId->id;

        $data = $request->all();

        $data['school_id'] = $user->school_id;

        SchoolCampus::create($data);

        return redirect()->route('schoolCampus.index')
            ->with('success', 'Information added successfully.');
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();
        $schoolCampus = SchoolCampus::where('id', $id)->first();
        return view('academical.campus.edit', compact('school_info', 'schoolCampus'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'campus_code' => 'required',
        ]);
        $address = array(
            'name' => $request->address_line,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'zip' => $request->zip_code,
        );
        $bdirec = SchoolCampus::find($request->id);
        if (isset($bdirec->address) && !empty($bdirec->address)) {
            $addressId = \App\Models\Address::where('id', $bdirec->address)->update($address);
        } else {
            $addressId = \App\Models\Address::create($address);
        }
        $bdirec = SchoolCampus::find($request->id);
        $bdirec->update($request->all());
        $bdirec->update(['address' => $addressId->d]);

        return redirect()->route('schoolCampus.index')
            ->with('success', 'Information successfully updated.');
    }


    public function destroy($id)
    {
        $color = SchoolCampus::find($id);
        $color->delete();
        return redirect()->route('color.index')
            ->with('success', 'Color delete successfully');
    }

    public function details($id)
    {
        $course_out = SchoolCampus::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">Campus Code :</th>';
        $html .= '<td>' . $course_out->campus_code . '</td></tr>';

        $html .= '<tr><th scope="row">Campus Name :</th>';
        $html .= '<td>' . $course_out->name . '</td></tr>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $address = \App\Models\Address::where('id', $course_out->address)->first();
        $html .= '<tr><th scope="row"><h3>Address</h3></th>';
        if (isset($address) && !empty($address)) {
            $html .= '<tr><th scope="row">Number:</th>';
            $html .= '<td>' . $address->name . '</td></tr>';
            $html .= '<tr><th scope="row">Street:</th>';
            $html .= '<td>' . $address->street . '</td></tr>';
            $html .= '<tr><th scope="row">City:</th>';
            $html .= '<td>' . $address->city . '</td></tr>';
            $html .= '<tr><th scope="row">Zip/Postal Code :</th>';
            $html .= '<td>' . $address->zip . '</td></tr>';
            $html .= '<tr><th scope="row">State/ Province:</th>';
            $html .= '<td>' . $address->state . '</td></tr>';
            $html .= '<tr><th scope="row">Country:</th>';
            $html .= '<td>' . $address->country . '</td></tr>';
        } else {
            $html .= '<td>' . ',' . '</td></tr>';
        }

        $html .= '<tr><th scope="row"><h3>Contact</h3></th>';
        $html .= '<tr><th scope="row">Office Phone :</th>';
        $html .= '<td>' . $course_out->phone_office . '</td></tr>';

        $html .= '<tr><th scope="row">Email :</th>';
        $html .= '<td>' . $course_out->email . '</td></tr>';

        $html .= '<tr><th scope="row">Fax No. :</th>';
        $html .= '<td>' . $course_out->fax . '</td></tr>';

        $html .= '<tr><th scope="row">Cost Centre :</th>';
        $html .= '<td>' . $course_out->cost_center . '</td></tr>';

        $html .= '<tr><th scope="row">Income Centre :</th>';
        $html .= '<td>' . $course_out->income_center . '</td></tr>';

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


}
