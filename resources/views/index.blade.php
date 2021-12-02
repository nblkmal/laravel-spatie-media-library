<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Integrate Spatie Medialibrary in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="d-flex p-2 bd-highlight mb-3">
            <a href="{{ route('client.create') }}" class="btn btn-dark">Add</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="30%">Avatar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $key=>$item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <img src="{{$item->getFirstMediaUrl('avatar', 'thumb')}}" / width="120px">
                        <form action="{{ route('client.update', [$item, 'avatar']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar" class="form-control">
                            <button type="submit" class="btn btn-dark">Update</button>
                        </form>
                        <a href="{{ route('client.delete', [$item, 'avatar']) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>