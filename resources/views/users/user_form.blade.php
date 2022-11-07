@extends('layouts.template')
@section('main')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">

                    <div class="col-12 mb-2 text-center">
                        <h4>Please Select the type of User you want to add</h4>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="radio" value="teacher" name="user">
                            </div>
                            <input type="text" class="form-control" value="Teacher" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="radio" value="student" name="user">
                            </div>
                            <input type="text" class="form-control" value="Student" readonly>
                        </div>
                    </div>

            <div class="col-lg-12 mb-4 mt-3 order-0">
                <form id="student_form" action="javascript:add_student();" style="display: none;">
                    @csrf()
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title text-primary d-inline-block">Add Student</h5>
                            <hr>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required />
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="father_name" class="form-label">Father Name</label>
                                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter Father Name" required />
                                </div>
{{--                                <div class="col-4 mb-3">--}}
{{--                                    <label for="father_name" class="form-label">Admitted In</label>--}}
{{--                                    <select class="form-select select2" name="class" required>--}}
{{--                                        <option value="AL">Alabama</option>--}}
{{--                                        <option value="WY">Wyoming</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                                <div class="col-4 mb-3">
                                    <label for="class" class="form-label">Admitted In</label>
                                    <select class="form-select" id="select2" name="class" required>
                                        <option value="">Select Class</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->group_id}}">{{$group->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 mb-0">
                                    <label for="student_cnic" class="form-label">Student CNIC</label>
                                    <input type="text" name="student_cnic" id="student_cnic" class="form-control" placeholder="xxxxx-xxxxxxx-x" />
                                </div>
                                <script>
                                    window.addEventListener('DOMContentLoaded', (event) => {
                                        var element = document.getElementById('student_cnic');
                                        var maskOptions = {
                                            mask: '00000-0000000-0'
                                        };
                                        var mask = IMask(element, maskOptions);                                    });

                                </script>
                                <div class="col-6 mb-0">
                                    <label for="guardian_cnic" class="form-label">Father / Guardian CNIC</label>
                                    <input type="text" name="guardian_cnic" id="guardian_cnic" class="form-control" placeholder="xxxxx-xxxxxxx-x" required />
                                </div>
                                <script>
                                    window.addEventListener('DOMContentLoaded', (event) => {
                                        var element = document.getElementById('guardian_cnic');
                                        var maskOptions = {
                                            mask: '00000-0000000-0'
                                        };
                                        var mask = IMask(element, maskOptions);                                    });

                                </script>

                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="guardian_cnic" class="form-label">Email</label>

                                    <div class="input-group input-group-merge mb-0">
                                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon33" id="student_email" required >
                                        <span class="input-group-text">@example.com</span>
                                    </div>
                                </div>
                                <div class="col-6 mb-0">
                                    <label for="student_contact" class="form-label">Student Contact</label>
                                    <input type="text" name="student_contact" id="student_contact" class="form-control" placeholder="Student Contact Number" />
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-4 mb-0">
                                    <label for="guardian_contact" class="form-label">Father / Guardian Contact</label>
                                    <input type="text" name="guardian_contact" id="guardian_contact" class="form-control" placeholder="Father/Guardian Contact Number" required/>
                                </div>
                                <div class="col-4 mb-0">
                                    <label for="student_paid" class="form-label">Paid</label>
                                    <input type="text" name="paid" id="student_paid" class="form-control" placeholder="Student Paid" />
                                </div>
                                <div class="col-4 mb-0">
                                    <label for="student_balance" class="form-label">Balance</label>
                                    <input type="text" name="balance" id="student_balance" class="form-control" placeholder="Student's Balance" />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-12 mb-0">
                                    <label for="address" class="form-label">Student Address</label>
                                    <textarea class="form-control" name="address" id="student_address" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" class="btn btn-outline-secondary" id="reset_student_form">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>
                <form id="teacher_form" action="javascript:add_teacher();" style="display: none;">
                    @csrf()
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title text-primary d-inline-block">Add Teacher</h5>
                            <hr>
                        </div>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="teacher_name" name="name" class="form-control" placeholder="Enter Name" required />
                                </div>
                                <div class="col-6">
                                    <label for="guardian_cnic" class="form-label">Email</label>

                                    <div class="input-group input-group-merge mb-0">
                                        <input id="teacher_email" name="email" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon33" required>
                                        <span class="input-group-text">@example.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" class="btn btn-outline-secondary" id="reset_teacher_form">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/imask"></script>


    <script>



    function add_student(){
        let data  = new FormData($('#student_form')[0]);

        let a  = function(){
            window.location.href = '{{route('students')}}';
        }
        let arr = [a];

        call_ajax_with_functions('','{{route('save_student')}}',data,arr);
    }
    function add_teacher(){
        let data  = new FormData($('#teacher_form')[0]);

        let a  = function(){
            window.location.href = '{{route('teachers')}}';
        }
        let arr = [a];

        call_ajax_with_functions('','{{route('save_teacher')}}',data,arr);
    }

    $(document).on('change', '[type="radio"]', function() {
        var currentlyValue = $(this).val(); // Get the radio checked value

        if(currentlyValue == 'student'){
            $('#select2').select2();


            $('#student_form').show();
            $('#teacher_form').hide();
        }
        else{
            $('#student_form').hide();
            $('#teacher_form').show();
        }
    });
    $(document).on('click', '#reset_student_form', function() {
        $('#student_form')[0].reset();
    });
    $(document).on('click', '#reset_teacher_form', function() {
        $('#teacher_form')[0].reset();
    });
    $(document).on('change', '#name', function() {
        var minm = 100000;
        var maxm = 999999;
        let name = $(this).val().replaceAll(" ","").toLowerCase();
         let email  = name +  (Math.floor(Math.random() * (maxm - minm + 1)) + minm).toString();
       $('#student_email').val(email);

    });
    $(document).on('change', '#teacher_name', function() {
        var minm = 100000;
        var maxm = 999999;
        let name = $(this).val().replaceAll(" ","").toLowerCase();
        let email  = name +  (Math.floor(Math.random() * (maxm - minm + 1)) + minm).toString();
        $('#teacher_email').val(email);

    });
</script>

@endsection
