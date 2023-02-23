<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sample Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
            <table class="table table-dark table-striped">
                <thead>
                    <td>#</td>
                    <td>FirstName</td>
                    <td>LastName</td>
                    <td>MiddleName</td>
                    <td>Gender</td>
                </thead>                
                <tbody>
                @if(isset($data))
                    @foreach($data as $list_data)
                        <tr>
                            <td>{{ $list_data->StudentID }}</td>
                            <td>{{ $list_data->FirstName }}</td>
                            <td>{{ $list_data->LastName }}</td>
                            <td>{{ $list_data->MiddleName }}</td>
                            <td>{{  $list_data->Gender }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        
    </script>
</body>

</html>