<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    private $timeFormats = [
        'h:i:s' => "12 Hours",
        "H:i:s" => "24 Hours"
    ];

    private $dateFormats = [
        "Y-m-d" => "yyyy-mm-dd",
        "m-d-Y" => 'mm-yyyy-dd',
        'd-m-Y' => 'dd-MM-yyyy',
    ];

    private $timeZones;

    function __construct()
    {
        $this->timeZones = DateTimeZone::listIdentifiers(
            DateTimeZone::ALL
        );
    }

    function getTimeAndDateFormat()
    {

        $user = auth()->user();
        $school = $user->school;

        return view("setting.time-and-date-format", compact('school'))
            ->with(['timeFormats' => $this->timeFormats, 'dateFormats' => $this->dateFormats, 'timeZones' => $this->timeZones]);
    }

    function postTimeAndDateFormat(Request $request)
    {

        $request->validate([
            'time_format' => 'required',
            'date_format' => 'required',
            'time_zone' => 'required',
        ]);

        $user = auth()->user();
        $school = $user->school;

        $school->time_format = $request->input('time_format', null);
        $school->date_format = $request->input('date_format', null);
        $school->time_zone = $request->input('time_zone', null);

        $school->save();

        toastr()->success(__('updated'));

        return redirect()->back();

    }

}
