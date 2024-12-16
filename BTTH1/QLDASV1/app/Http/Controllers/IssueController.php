<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách các vấn đề
    public function index()
    {
        $issues = Issue::all(); // Lấy tất cả các vấn đề
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form tạo vấn đề mới
    public function create()
    {
        $computers = Computer::all(); // Lấy danh sách máy tính
        return view('issues.create', compact('computers'));
    }

    // Lưu vấn đề mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'issue_level' => 'required|string',
            'status' => 'required|string',
            'reported_by' => 'required|string',
            'reported_at' => 'required|date',
        ]);

        Issue::create([
            'computer_id' => $request->computer_id,
            'issue_level' => $request->issue_level,
            'status' => $request->status,
            'reported_by' => $request->reported_by,
            'reported_at' => $request->reported_at,
        ]);

        return redirect()->route('issues.index');
    }

    // Hiển thị form chỉnh sửa vấn đề
    public function edit(Issue $issue)
    {
        $computers = Computer::all(); // Lấy danh sách máy tính
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin vấn đề
    public function update(Request $request, Issue $issue)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'issue_level' => 'required|string',
            'status' => 'required|string',
            'reported_by' => 'required|string',
            'reported_at' => 'required|date',
        ]);

        $issue->update([
            'computer_id' => $request->computer_id,
            'issue_level' => $request->issue_level,
            'status' => $request->status,
            'reported_by' => $request->reported_by,
            'reported_at' => $request->reported_at,
        ]);

        return redirect()->route('issues.index');
    }

    // Xóa vấn đề
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index');
    }
}
