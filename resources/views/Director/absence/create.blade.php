<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSyncHub | Add Absence</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/multiple-select-js@1.0.2/dist/multiple-select.css">
    <!-- JS -->
    <script src="https://unpkg.com/multiple-select-js@1.0.2/dist/assets/js/multiple-select.js"></script>
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100vh;
            background-image: url("https://wallpapercave.com/wp/wp2095045.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%
        }

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        input,
        textarea,
        button,
        select {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        .select-container {
            position: relative;
        }

        .select-container i {
            position: absolute;
            top: 50%;
            left: 10px;
            /* Adjust this value based on your design */
            transform: translateY(-50%);
            pointer-events: none;
            /* Ensures the icon doesn't block select box interaction */
        }

        .custom-select {
            margin-left: 40px;
            /* Adjust the margin-left value as needed */
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-fluid px-1 py-5 mx-auto" >
        <div class="row d-flex justify-content-center" >
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center  " style="margin-top: 60px" >
                <div class="card p-4" style="border-radius: 36px">
                    <form class="form-card p-4" action="{{ route('director.absence.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                        <h3 class="mb-4"><em>Add Daily Absence report of the day
                                ( {{ \Carbon\Carbon::now()->format('l d M Y') }})</em> </h3>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">

                                <label class="form-control-label px-3">Subject<span class="text-danger">*</span></label>
                                <select name="subject_id" required>
                                    <option value="">Select a Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Section<span class="text-danger">*</span></label>
                                <select name="section_id" id="section_id" required>
                                    <option value="">Select section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">starts at<span
                                        class="text-danger">*</span></label>
                                <input type="datetime-local" name="starts_at" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Ends at<span class="text-danger">*</span></label>
                                <input type="datetime-local" name="ends_at" required>
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            {{-- <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">students<span
                                        class="text-danger">*</span></label>
                                <select name="Students[]" class="form-control" id="multiple-select" multiple>
                                    @foreach ($user->institutions as $institution)
                                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Student(s)<span class="text-danger">*</span></label>
                                <select name="user_id" id="user_id" required>
                                    <option value="">Select Student(s)</option>
                                   
                                </select>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Reason<span class="text-danger">*</span></label>
                                <select name="reason" required>
                                    <option value="Injustified">Injustified</option>
                                    <option value="Justified">Justified</option>
                                    <option value="sick leave">Sick Leave</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            



                        </div>

                         
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block"
                                    style="background-color: rgb(188, 187, 186);">Save</button>
                            </div>
                        </div>

                    </form>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#section_id').change(function() {
            var sectionId = $(this).val();
            if (sectionId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('getUsersInSection') }}",
                    data: { section_id: sectionId },
                    success: function(users) {
                        $('#user_id').empty();
                        $('#user_id').append('<option value="">Select user</option>');
                        $.each(users, function(key, user) {
                            $('#user_id').append('<option value="' + user.id + '">' + user.firstname + ' ' + user.lastname + '</option>');

                        });
                    }
                });
            } else {
                $('#user_id').empty();
                $('#user_id').append('<option value="">Select user</option>');
            }
        });
    });
</script>



                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        let multipleSelect = new MultipleSelect('#multiple-select', {
            placeholder: 'Select Studnets',
        })
    </script>
</body>

</html>
