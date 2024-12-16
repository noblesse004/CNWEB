<?php

namespace App\Http\Controllers;

use App\Models\Computers;
use App\Models\Issues;
use Illuminate\Http\Request;

class IssuesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issues::with('computer')->paginate(5);
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $computers = Computers::all();
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|max:255', // nullable nếu không bắt buộc
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        // Thêm vấn đề mới vào cơ sở dữ liệu
        Issues::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
    }

    public function edit($id)
    {
        $issue = Issues::findOrFail($id);
        $computers = Computers::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|max:255',
            'reported_date' => 'nullable|date', // nullable nếu không bắt buộc
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = Issues::findOrFail($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $issue = Issues::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công!');
    }
}
