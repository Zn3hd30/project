@extends('layout.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Student List</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">MiddleName</th>
                            <th scope="col">ExtensionName</th>
                            <th scope="col">Gender</th>
                            <th scope="col">BirthDate</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($Student))
                        @foreach($Student as $Students)
                        <tr>
                            <th scope="row">{{$Students->StudentID}}</th>
                            <td>{{$Students->FirstName}}</td>
                            <td>{{$Students->LastName}}</td>
                            <td>{{$Students->MiddleName}}</td>
                            <td>{{$Students->ExtensionName}}</td>
                            <td>{{$Students->Gender}}</td>
                            <td>{{$Students->BirthDate}}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#edit_student"
                                    class="btn btn-info">Edit</button>
                                <button type="button" onclick="delete_student()" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="edit_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #191C24 !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">

                <form method="post" action="{{ route('StudentSave') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="FirstName" class="form-label">FirstName</label>
                        <input type="text" value="" class="form-control" name="FirstName" id="FirstName">
                    </div>

                    <div class="mb-3">
                        <label for="MiddleName" class="form-label">MiddleName</label>
                        <input type="text" value="" class="form-control" name="MiddleName" id="MiddleName">
                    </div>

                    <div class="mb-3">
                        <label for="LastName" class="form-label">LastName</label>
                        <input type="text" value="" class="form-control" name="LastName" id="LastName">
                    </div>

                    <div class="mb-3">
                        <label for="ExtensionName" class="form-label">ExtensionName</label>
                        <input type="text" value="" class="form-control" name="ExtensionName" id="ExtensionName">
                    </div>
                    <div class="mb-3">
                        <label for="Gender" class="form-label">Gender</label>
                        <select id="Gender" name="Gender" class="form-select form-select-sm mb-3"
                            aria-label=".form-select-sm example">
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="BirthDate" class="form-label">BirthDate</label>
                        <input type="date" value="" class="form-control" name="BirthDate" id="BirthDate">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection