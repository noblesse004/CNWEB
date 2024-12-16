<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesControllers;

// Đường dẫn hiển thị danh sách đồ án (trang chủ)

Route::get('/', [IssuesControllers::class, 'index'])->name('issues.index');

// Đường dẫn để tạo mới một đồ án (hiển thị form thêm mới)
Route::get('/issues/create', [IssuesControllers::class, 'create'])->name('issues.create');

// Đường dẫn để lưu dữ liệu đồ án mới (thực hiện thêm mới)
Route::post('/issues', [IssuesControllers::class, 'store'])->name('issues.store');

// Đường dẫn để hiển thị chi tiết một đồ án cụ thể (tuỳ chọn)
Route::get('/issues/{id}', [IssuesControllers::class, 'show'])->name('issues.show');

// Đường dẫn để chỉnh sửa thông tin đồ án (hiển thị form chỉnh sửa)
Route::get('/issues/{id}/edit', [IssuesControllers::class, 'edit'])->name('issues.edit');

// Đường dẫn để cập nhật thông tin đồ án (thực hiện cập nhật)
Route::put('/issues/{id}', [IssuesControllers::class, 'update'])->name('issues.update');

// Đường dẫn để xóa đồ án (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/issues/{id}', [IssuesControllers::class, 'destroy'])->name('issues.destroy');
