<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSyncHub | Add Student</title>
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
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">

                    <form class="form-card" action="{{ route('director.exams.update', $exam->id) }}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="created_by" value="{{ Auth::id() }}">
                        <h3 class="mb-4">Update an Exam</h3>
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                        
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">Exam Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ $exam->title }}" required>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Date<span class="text-danger">*</span></label>
                                <input type="datetime-local" name="date" value="{{ $exam->date }}" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Duration (in minutes):<span class="text-danger">*</span></label>
                                <input type="number" name="duration" value="{{ $exam->duration }}" placeholder="Duration in minutes" required>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Base Note<span class="text-danger">*</span></label>
                                <input type="number" name="base_note" value="{{ $exam->base_note }}" placeholder="Base Note" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Comment<span class="text-danger">*</span></label>
                                <input type="text" name="comment" value="{{ $exam->comment }}" placeholder="Comment" required>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Professor<span class="text-danger">*</span></label>
                                <select name="professor_id" required>
                                    <option value="">Select a Professor</option>
                                    @foreach($professors as $professor)
                                    <option value="{{ $professor->id }}" {{ $professor->id == $exam->professor_id ? 'selected' : '' }}>
                                        {{ $professor->firstname }} {{ $professor->lastname }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Subject<span class="text-danger">*</span></label>
                                <select name="subject_id" required>
                                    <option value="">Select a Subject</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $subject->id == $exam->subject_id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Cycle<span class="text-danger">*</span></label>
                                <select name="cycle_id" id="cycle" class="custom-select" required>
                                    <option value="">Select a Cycle</option>
                                    @foreach ($cycles as $cycle)
                                        <option value="{{ $cycle->id }}" {{ $cycle->id == $exam->cycle_id ? 'selected' : '' }}>
                                            {{ $cycle->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-container" style="width: 60%;margin-top: 4px;">
                                <!-- Select a level -->
                                <i class="fas fa-caret-down"></i>
                                <select name="level_id" id="level" class="custom-select" required>
                                    <option value="">Select the level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}" {{ $level->id == $exam->level_id ? 'selected' : '' }}>
                                            {{ $level->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-container" style="margin-left: 80px; width: 60%;margin-top: 4px;">
                                <!-- Select the speciality -->
                                <i class="fas fa-caret-down"></i>
                                <select name="speciality_id" id="speciality" class="custom-select" required>
                                    <option value="">Select the speciality</option>
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}" {{ $speciality->id == $exam->speciality_id ? 'selected' : '' }}>
                                            {{ $speciality->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-container" style="margin-left: 120px;  width: 60%;margin-top: 4px;">
                                <!-- Select section -->
                                <i class="fas fa-caret-down"></i>
                                <select name="section_id" id="section" class="custom-select" required>
                                    <option value="">Select section</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}" {{ $section->id == $exam->section_id ? 'selected' : '' }}>
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block"
                                    style="background-color: rgb(188, 187, 186);">update</button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
