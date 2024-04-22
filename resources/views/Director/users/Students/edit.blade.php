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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card" style="border-radius: 30px;">


                    
<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <h1>Upade Student</h1>
    <input type="hidden" name="role_id" value="3">
    <input type="hidden" name="isActive" value="1">

    <div class="row justify-content-between text-left">
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">First Name<span class="text-danger">*</span></label>
            <input type="text" name="firstname" value="{{ $student->firstname }}">
        </div>
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">Last Name<span class="text-danger">*</span></label>
            <input type="text" name="lastname" value="{{ $student->lastname }}">
        </div>
    </div>

    <div class="row justify-content-between text-left">
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">Email<span class="text-danger">*</span></label>
            <input type="text" name="email" value="{{ $student->email }}">
        </div>
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">Phone :<span class="text-danger">*</span></label>
            <input type="tel" id="phone" name="phone" value="{{ $student->phone }}" placeholder="+212 XXX XX XX XX">
        </div>
    </div>

    <div class="row justify-content-between text-left">
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">Date of birth<span class="text-danger">*</span></label>
            <input type="date" name="dateofbirth" value="{{ $student->dateofbirth }}" placeholder="">
        </div>
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">Status<span class="text-danger">*</span></label>
            <select name="status" class="form-control">
                <option value="pending" {{ $student->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $student->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $student->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
    </div>

    <div class="row justify-content-between text-left">
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">Address<span class="text-danger">*</span></label>
            <input type="text" name="address" value="{{ $student->address }}">
        </div>
        <div class="form-group col-sm-6 flex-column d-flex">
            <label class="form-control-label px-3">Monthly amount:<span class="text-danger">*</span></label>
            <input type="number" id="phone" name="monthly_amount" value="{{ $student->monthly_amount }}">
        </div>
    </div>

    <div class="row justify-content-between text-left">
        <div class="form-group col-12 flex-column d-flex">
            <!-- Select a school cycle -->
            <select id="school_cycle" style="margin-left: 0px;" class="custom-select" name="section_id[]">
                <option value="">Select section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $student->sections->contains('id', $section->id) ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>

           
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#section').select2();
            });
        </script>
        <script>
            document.getElementById('school_cycle').addEventListener('change', function () {
                var school_cycle = this.value;
                var level_select = document.getElementById('level');
                level_select.innerHTML = ''; 
                if (school_cycle === 'Primary') {
                    var levels = ["Grade 1", "Grade 2", "Grade 3"];
                } else if (school_cycle === 'Secondary') {
                    var levels = ["Grade 10", "Grade 11", "Grade 12"];
                } else if (school_cycle === 'Higher Education') {
                    var levels = ["Undergraduate", "Graduate", "PhD"];
                }
                levels.forEach(function (level) {
                    var option = document.createElement('option');
                    option.value = level;
                    option.textContent = level;
                    level_select.appendChild(option);
                });
            });
        </script>
    </div>


    <div class="row justify-content-center">
        <div class="form-group col-sm-6">
            <button type="submit" class="btn-block" style="background-color: bisque;">Save</button>
        </div>
    </div>
</form>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>