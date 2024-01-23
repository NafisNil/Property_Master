<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Remainder;
class CalenderController extends Controller
{
    //
    public function index(){
        $events = [];
 
        $appointments = Remainder::get();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->subject ,
                'start' => $appointment->due_date,
                'end' => $appointment->due_date,
            ];
        }
        return view('calender.index', ['events' => $events]);
    }

    public function getRemainder(){
            

           
 
        return view('home', compact('events'));
    }

    public function deleteRemainder($id){
        $remainder = Remainder::find($id);
        $remainder->delete();
         return response()->json(['message' => 'Deleted successfully!']);
    }

    public function update(Request $request, $id)
    {
        $remainder = Remainder::findOrFail($id);

        $remainder->update([
            'start' => Carbon::parse($request->input('start_date'))->setTimezone('UTC'),
            'end' => Carbon::parse($request->input('end_date'))->setTimezone('UTC'),
        ]);

        return response()->json(['message' => 'Event moved successfully']);
    }

    public function resize(Request $request, $id)
    {
        $remainder = Remainder::findOrFail($id);

        $newEndDate = Carbon::parse($request->input('end_date'))->setTimezone('UTC');
        $remainder->update(['end' => $newEndDate]);

        return response()->json(['message' => 'Event resized successfully.']);
    }

    public function search(Request $request)
    {
        $searchKeywords = $request->input('title');

        $matchingEvents = Remainder::where('subject', 'like', '%' . $searchKeywords . '%')->get();

        return response()->json($matchingEvents);
    }
}
