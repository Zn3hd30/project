@extends('layout.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-2">
        </div>

        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add Student Form</h6>
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
                    <div class="mb-3">
                        <label for="FirstName" class="form-label">FirstName</label>
                        <input type="text" class="form-control" name="FirstName" id="FirstName">
                    </div>
           
                    <div class="mb-3">
                        <label for="MiddleName" class="form-label">MiddleName</label>
                        <input type="text" class="form-control" name="MiddleName" id="MiddleName">
                    </div>

                    <div class="mb-3">
                        <label for="LastName" class="form-label">LastName</label>
                        <input type="text" class="form-control" name="LastName" id="LastName">
                    </div>

                    <div class="mb-3">
                        <label for="ExtensionName" class="form-label">ExtensionName</label>
                        <input type="text" class="form-control" name="ExtensionName" id="ExtensionName">
                    </div>
                    <div class="mb-3">
                        <label for="Gender" class="form-label">Gender</label>
                        <select id="Gender" name="Gender" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="BirthDate" class="form-label">BirthDate</label>
                        <input type="date" class="form-control" name="BirthDate" id="BirthDate">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-xl-2">
        </div>

    </div>
</div>
@endsection