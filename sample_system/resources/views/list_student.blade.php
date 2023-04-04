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
                                <th scope="row">{!! QrCode::size(50)->backgroundColor(255,90,0)->generate('$Students->StudentID') !!} </th>
                                <td>{{$Students->FirstName}}</td>
                                <td>{{$Students->LastName}}</td>
                                <td>{{$Students->MiddleName}}</td>
                                <td>{{$Students->ExtensionName}}</td>
                                <td>{{$Students->Gender}}</td>
                                <td>{{$Students->BirthDate}}</td>
                                <td>
                                <!-- data-bs-toggle="modal" data-bs-target="#edit_student"  -->
                                    <button type="button"  onclick="edit_student('{{$Students->StudentID}}','{{$Students->FirstName}}','{{$Students->LastName}}','{{$Students->MiddleName}}','{{$Students->ExtensionName}}','{{$Students->Gender}}','{{$Students->BirthDate}}')" class="btn btn-info">Edit</button>
                                    <button type="button" onclick="delete_student('{{$Students->StudentID}}')" class="btn btn-danger">Delete</button>
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
                        <input type="hidden" value="" class="form-control" name="StudentID" id="StudentID">
                    </div>

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
                <button type="button" onclick="save_edit_student()" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>

    function delete_student(StudentID){
        var student_Data = new FormData()
        student_Data.append('StudentID',StudentID)
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: "POST",
                    url: "{{route('StudentDelete')}}",
                    dataType: 'json',
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    data: student_Data,
                }).done(function( msg ) {
                    if(msg.result ==true){
                        Swal.fire(
                        'Delete',
                        msg.message,
                        'success'
                        )
                        setTimeout(function(){
                        window.location.reload();
                        }, 2000);
                    } else {
                        Swal.fire(
                        'Delete',
                        msg.message,
                        'error'
                        )
                    }
                });
            }
        })
    }

    function edit_student(StudentID, FirstName, LastName, MiddleName,ExtensionName,Gender,BirthDate) {
        
        
        $('#edit_student').modal('toggle');
        $('#StudentID').val(StudentID);
        $('#FirstName').val(FirstName);
        $('#LastName').val(LastName);
        $('#MiddleName').val(MiddleName);
        $('#ExtensionName').val(ExtensionName);
        $('#Gender').val(Gender);
        $('#BirthDate').val(BirthDate);

        
    }

    function save_edit_student(){
        var StudentID = $('#StudentID').val();
        var FirstName = $('#FirstName').val();
        var MiddleName = $('#MiddleName').val();
        var ExtensionName = $('#ExtensionName').val();
        var LastName = $('#LastName').val();
        var Gender = $('#Gender').val();
        var BirthDate = $('#BirthDate').val();

        var student_Data = new FormData()
        student_Data.append('StudentID',StudentID)
        student_Data.append('FirstName',FirstName)
        student_Data.append('MiddleName',MiddleName)
        student_Data.append('ExtensionName',ExtensionName)
        student_Data.append('Gender',Gender)
        student_Data.append('BirthDate',BirthDate)
        student_Data.append('LastName',LastName)

        $.ajax({
            method: "POST",
            url: "{{route('StudentSave')}}",
            dataType: 'json',
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            data: student_Data,
        }).done(function( msg ) {
            if(msg.result ==true){
                Swal.fire(
                'Update',
                msg.message,
                'success'
                )
            } else {
                Swal.fire(
                'Update',
                msg.message,
                'error'
                )
            }
        });
    }
</script>
@endsection