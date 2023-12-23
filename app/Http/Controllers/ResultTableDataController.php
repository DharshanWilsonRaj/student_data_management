<?php

namespace App\Http\Controllers;

use App\Models\ResultsTable;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ResultTableDataController extends Controller
{
    // table
    public function resultTable()
    {
        return view('teachers.studentTable');
    }

    // datatable fetch done by here
    public function ajaxTable()
    {
        $data = ResultsTable::query();
        return DataTables::of($data)
            ->addColumn('mycolu', function ($row) {
                return '<a href="' . route('edit.studentResult.view', $row->id) . '">Edit</a> | <a href="' . route('delete.student', $row->id) . '">Delete</a> ';
            })
            ->rawColumns(['mycolu'])
            ->make(true);
    }

    // view student add result form
    public function addStudentResultView()
    {
        return view('teachers.addStudentResult');
    }

    // add students results
    public function addStudentResult(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:results_tables,email',
            'marks' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $studentResult = new ResultsTable([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'marks' => $request->input('marks'),
            'status' => $request->input('status'),
        ]);

        $studentResult->save();
        return redirect()->route('student_table')->with('success', 'Student Result added successfully');
    }

    public function editStudentResultView($id)
    {
        $data = ResultsTable::find($id);
        if (!$data) {
            abort(404);
        }
        return view('teachers.editStudentResult', compact('data'));
    }

    public function updateStudentResult(Request $request, $id)
    {
        $data = ResultsTable::find($id);
        if (!$data) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:results_tables,email,' . $id . ',id',
            'marks' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $data->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'marks' => $request->input('marks'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('student_table')->with('success', 'Record updated successfully');
    }

    public function deleteStudentRecord($id)
    {
        $data = ResultsTable::find($id);
        if (!$data) {
            abort(404);
        }
        $data->delete();
        return redirect()->route('student_table')->with('success', 'Record updated successfully');
    }

    public function showStudentProfile($email)
    {
        $data = ResultsTable::where('email', $email)->first();
        if (!$data) {
            abort(404);
        }
        return view('students.studentProfile', compact('data'));
    }
}
