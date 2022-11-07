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
                        <h5 class="card-title text-primary d-inline-block">Students</h5>
                        <button  class="float-end btn btn-sm btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#modalCenter">Add Student(s)</button>
                        <hr>
                    </div>
                    <div class="card-body">
                        <table id="list_table" class="table dataTable table-bordered table-striped text-center">
                            <thead class="thead-dark">
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Father Name</th>
                            <th>Group</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($group->students as $student)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->father_name}}</td>
                                    <td>{{$group->groups->title}}</td>
                                    <td></td>
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
                    <h5 class="modal-title" id="modalCenterTitle">Add Student(s)</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Student(s)</label>
                            <select
                                id="title"
                                name="title"
                                class="form-select select2">

                                <option value="">Select Student(s)</option>
                                <option value="">4</option>
                                <option value="">4</option>
                                <option value="">4</option>
                                <option value="">4</option>
                                <option value="">4</option>
                                <option value="">4</option>

                            </select>
                            <input type="hidden" name="group" value="{{$group->group_id}}" id="group">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onclick="save();">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->
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

        {{--function save(){--}}
        {{--    let data  = new FormData();--}}
        {{--    data.append('name',$('#name').val());--}}
        {{--    data.append('title',$('#title').val());--}}
        {{--    data.append('_token','{{@csrf_token()}}');--}}

        {{--    let a  = function(){--}}
        {{--        window.location.reload()--}}
        {{--    }--}}
        {{--    let arr = [a];--}}

        {{--    call_ajax_with_functions('','{{route('save')}}',data,arr);--}}
        {{--}--}}
    </script>
@endsection

