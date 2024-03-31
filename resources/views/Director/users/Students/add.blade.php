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


                    <form class="form-card" action="" method="post" enctype="multipart/form-data">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">First Name<span class="text-danger">
                                        *</span></label>
                                <input type="text" name="firstname">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Last Name<span class="text-danger"> *</span></label>
                                <input type="number" name="lastname">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Email<span class="text-danger"> *</span></label>
                                <input type="text" name="firstname">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Phone :<span class="text-danger">
                                        *</span></label>
                                <input type="tel" id="phone" name="phone"
                                   
                                    placeholder="+212 XXX XX XX XX">
                            </div>
                        </div>


                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Parent Full Name<span class="text-danger">
                                        *</span></label> <input type="text" name="pfullname" placeholder=""> </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Status<span class="text-danger"> *</span></label>
                                <select name="status" class="form-control">
                                    <option value="1">Pending</option>
                                    <option value="2">Approved</option>
                                    <option value="3">Declined</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Parent Email<span class="text-danger">
                                        *</span></label>
                                <input type="text" name="pemail">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Parent Phone  :<span class="text-danger">
                                        *</span></label>
                                <input type="tel" id="phone" name="pphone"
                                
                                    placeholder="+212 XXX XX XX XX">
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <!-- Select a school cycle -->
                                
                                <select name="school_cycle" id="school_cycle" style="width: 60%;margin-left: 0px;"  class="custom-select">
                                    <option value="">Select a school cycle</option>
                                    <option value="Primary">Primary</option>
                                    <option value="Secondary">Secondary</option>
                                    <option value="Higher Education">Higher Education</option>
                                </select>

                                <!-- Select a level -->
                                <div class="select-container" style="width: 60%;margin-top: 4px;">
                                    <i class="fas fa-caret-down"></i>
                                    <select name="speciality" id="speciality" class="custom-select">
                                        <option value="">Select the level</option>
                                     </select>
                                </div>

                                <!-- Select the speciality -->
                                <div class="select-container" style="margin-left: 80px; width: 60%;margin-top: 4px;">
                                    <i class="fas fa-caret-down"></i>
                                    <select name="speciality" id="speciality" class="custom-select">
                                        <option value="">Select the speciality</option>
                                    </select>
                                </div>

                                <!-- Select section -->
                                <div class="select-container" style="margin-left: 120px;  width: 60%;margin-top: 4px;">
                                    <i class="fas fa-caret-down"></i>
                                    <select name="section" id="section" class="custom-select">
                                        <option value="">Select section</option>
                                        
                                    </select>
                                </div>

                            </div>
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



                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label
                                    class="form-control-label px-3">Profile picture<span class="text-danger">
                                        *</span></label> <input type="file" name="image" placeholder=""> </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block "
                                    style="background-color: bisque;">Save</button> </div>
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