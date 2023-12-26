<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\StudentDetail;
use App\Models\StudentMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    function index()
    {
        return view('school_message.index');
    }

    function getSendStudentMessage($id)
    {
        $student = StudentDetail::with(['user', 'father', 'mother'])->findOrFail($id);

        return view("admission.send-message", compact('student'));
    }

    function postSendStudentMessage(Request $request, $id)
    {

        $student = StudentDetail::findOrFail($id);

        DB::beginTransaction();

        try {

            StudentMessage::create([
                'subject' => $request->input('subject'),
                'description' => $request->input('description'),
                //student_id from student_details talbe
                'student_id' => $student->id,
                'cc_father_id' => $student->father_id,
                'cc_mother_id' => $student->mother_id,
            ]);

            $student->message_status = 'sent';
            $student->save();

            DB::commit();

            toastr()->success('Message sent successfully');

            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage());
            return redirect()->back();
        }

    }

}
