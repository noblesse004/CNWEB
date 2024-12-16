
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Tạo mới Vấn Đề</title>
</head>
<body>
    <div class="container">
        <h2>Tạo mới vấn đề</h2>

        <form action="{{ route('issues.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="computer_id">Máy tính</label>
                <select name="computer_id" id="computer_id" class="form-control">
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="severity">Mức độ sự cố</label>
                <input type="text" name="severity" id="severity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="reported_by">Người báo cáo</label>
                <input type="text" name="reported_by" id="reported_by" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tạo vấn đề</button>
        </form>
    </div>
    </body>
</html>
