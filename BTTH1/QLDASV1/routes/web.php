<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

// Hiển thị danh sách các vấn đề
Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');

// Thêm vấn đề mới
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

// Cập nhật thông tin vấn đề
Route::get('/issues/{issue}/edit', [IssueController::class, 'edit'])->name('issues.edit');
Route::put('/issues/{issue}', [IssueController::class, 'update'])->name('issues.update');

// Xóa vấn đề

Route::delete('/issues/{issue}', [IssueController::class, 'destroy'])->name('issues.destroy');
