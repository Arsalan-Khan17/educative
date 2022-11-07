@extends('layouts.template')
@section('main')
    <!-- Content -->
    <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title text-primary d-inline-block">Students</h5>
                        <a href="{{route('user_form')}}" class="float-end btn btn-sm btn-outline-primary">Add Student</a>
                        <hr>
                    </div>
                     <div class="card-body">
                        <table id="student_table" class="table dataTable table-bordered table-striped">
                            <thead class="thead-dark">
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Contact</th>
                                <th>Guardian Contact</th>
                            </thead>
                            <tbody>

                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->father_name}}</td>
                                    <td>{{$student->student_contact}}</td>
                                    <td>{{$student->guardian_contact}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->
@endsection

@section('footer_scripts')
    <script src="{{asset('assets/js/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/datatables_init.js')}}" type="text/javascript"></script>


    <script>
        $(document).ready( function () {
            $('#student_table').dataTable()
        });
    </script>
@endsection

