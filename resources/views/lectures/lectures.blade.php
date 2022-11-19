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
                        <h5 class="card-title text-primary d-inline-block">Lectures</h5>
                        <button  class="float-end btn btn-sm btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#modalCenter">Add Lecture</button>
                        <hr>
                    </div>
                    <div class="card-body">
                        @foreach($lectures as $lecture)

{{--                            @php--}}
{{--                                $lecture->url  = str_replace('www.youtube.com','www.youtube-nocookie.com',$lecture->url)--}}
{{--                            @endphp--}}
                            <iframe width="560" height="315" src="{{str_replace('watch?v=','embed/',$lecture->url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h3 class="mt-2">{{$lecture->title}}</h3>
                            <h6>Uploaded On {{parse_datetime_get($lecture->added_on)}}</h6>
                            <hr style="height: 3px">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add Lecture</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form id="lecture_form">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" type="text" name="title" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="url" class="form-label">Lecture Url</label>
                                <input class="form-control" type="url" name="url" required>
                            </div>
                        </div>

                        <input type="hidden" name="class_id" value="{{$class_id}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onclick="save_lecture();">Save changes</button>
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
        function save_lecture(){
            let data  = new FormData($('#lecture_form')[0]);
            let a  = function(){
                window.location.reload()
            }
            let arr = [a];

            call_ajax_with_functions('','{{route('save_lecture')}}',data,arr);
        }

    </script>
@endsection

