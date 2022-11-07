@extends('layouts.template')
@section('main')

    <style>
        .clickable{
            cursor: pointer;
        }
    </style>
    <!-- Content -->
    <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title text-primary d-inline-block">{{ucfirst($name)}}</h5>
                        <button  class="float-end btn btn-sm btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#modalCenter">Add {{ucfirst(rtrim($name,'s'))}} </button>
{{--                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">--}}
{{--                            Launch modal--}}
{{--                        </button>--}}
                        <hr>
                    </div>
                    <div class="card-body">
                        <table id="list_table" class="table dataTable table-bordered table-striped text-center">
                            <thead class="thead-dark">
                            <th>#</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($lists as $list)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$list->title}}</td>
                                    <td>{{parse_date_store($list->created_at)}}</td>
                                    <td>
                                        @if($name == 'groups')
                                            <a href="{{route('group_detail',['id' => $list->group_id])}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    Modal--}}
    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add {{ucfirst(rtrim($name,'s'))}}</h5>
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
                            <label for="nameWithTitle" class="form-label">Title</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control"
                                placeholder="Enter Title"
                            />
                            <input type="hidden" name="name" value="{{$name}}" id="name">
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



    <script>
        $(document).ready( function () {
            $('#list_table').dataTable()
        });

        function save(){
            let data  = new FormData();
            data.append('name',$('#name').val());
            data.append('title',$('#title').val());
            data.append('_token','{{@csrf_token()}}');

            let a  = function(){
                window.location.reload()
            }
            let arr = [a];

            call_ajax_with_functions('','{{route('save')}}',data,arr);
        }
    </script>
@endsection

