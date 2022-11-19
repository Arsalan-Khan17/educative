@extends('layouts.template')
@section('main')

    <!-- Content -->
    <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title text-primary d-inline-block">Classes</h5>
                        <button  class="float-end btn btn-sm btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#modalCenter">Add Class</button>
                        <hr>
                    </div>
                    <div class="card-body">
                        <table id="list_table" class="table dataTable table-bordered table-striped text-center">
                            <thead class="thead-dark">
                            <th>#</th>
                            <th>Subject</th>
                            <th>Group</th>
                            <th>Session</th>
                            <th>Teacher</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($classes as $class)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$class->subject->title}}</td>
                                    <td>{{$class->group->title}}</td>
                                    <td>{{$class->session->title}}</td>
                                    <td>{{$class->user->name}}</td>
                                    <td><a title="Lectures" href="{{route('lectures',['class_id' => $class->class_id])}}" class="btn btn-primary btn-sm"><i class="fa fa-video"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add Class</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form id="class_form">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="group" class="form-label">Group</label>
                                <select
                                    id="group"
                                    name="group"
                                    class="form-select" required>

                                    <option value="">Select Group</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->group_id}}">{{$group->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="session" class="form-label">Session</label>
                                <select
                                    id="session"
                                    name="session_id"
                                    class="form-select" required>

                                    <option value="">Select Session</option>
                                    @foreach($sessions as $session)
                                        <option value="{{$session->session_id}}">{{$session->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select
                                    id="subject"
                                    name="subject"
                                    class="form-select" required>

                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->subject_id}}">{{$subject->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="teacher" class="form-label">Teacher</label>
                                <select
                                    id="teacher"
                                    name="teacher"
                                    class="form-select" required>

                                    <option value="">Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->user_id}}">{{$teacher->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onclick="save_class();">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{asset('assets/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/datatables_init.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <script>
        $(document).ready( function () {
            $('#list_table').dataTable()
            $('.select2').select2();
        });

        function save_class(){
            let data  = new FormData($('#class_form')[0]);
            let a  = function(){
                window.location.reload()
            }
            let arr = [a];

            call_ajax_with_functions('','{{route('save_class')}}',data,arr);
        }
    </script>
@endsection

