<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Cập nhật Vấn Đề</title>
</head>
<body>
    <div class="container">
        <h2>Sửa vấn đề</h2>

        <form action="{{ route('issues.update', $issue->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="computer_id">Máy tính</label>
                <select name="computer_id" id="computer_id" class="form-control">
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                            {{ $computer->computer_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="severity">Mức độ sự cố</label>
                <input type="text" name="severity" id="severity" class="form-control" value="{{ $issue->severity }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" class="form-control">{{ $issue->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="reported_by">Người báo cáo</label>
                <input type="text" name="reported_by" id="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật vấn đề</button>
        </form>
    </div>
    </body>
