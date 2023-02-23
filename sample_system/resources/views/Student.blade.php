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

            @if(isset($Success))
                <div class="alert alert-success" role="alert">
                {{ $Success }}
                </div>
            @elseif(isset($Error))
            <div class="alert alert-danger" role="alert">
                {{ $Error }}
                </div>
            @endif

            
                <form method="post" action="{{ route('StudentSave') }}">  
                @csrf
                    <div class="form-group">
                        <label for="First Name">First Name</label>
                        <input type="text" class="form-control" name="FirstName" id="" aria-describedby="" placeholder=""></small>
                    </div>

                    <div class="form-group">
                        <label for="Last Name">Last Name</label>
                        <input type="text" class="form-control" name="LastName" id="" aria-describedby="" placeholder=""></small>
                    </div>

                    <div class="form-group">
                        <label for="Middle Name">Middle Name</label>
                        <input type="text" class="form-control" name="MiddleName" id="" aria-describedby="" placeholder=""></small>
                    </div>
                    <div class="form-group">
                    <label for="Middle Name">Gender</label>
                        <select class="form-select" name="Gender" aria-label="Default select example">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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