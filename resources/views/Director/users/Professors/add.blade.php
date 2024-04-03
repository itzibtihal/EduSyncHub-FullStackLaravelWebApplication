<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSyncHub | Add Professor</title>
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

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-fluid px-1 py-5 mx-auto ">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">


                    <form class="form-card" action="{{ route('professors.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="role_id" value="2">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">First Name<span class="text-danger">
                                        *</span></label>
                                <input type="text" name="firstname">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Last Name<span class="text-danger"> *</span></label>
                                <input type="text" name="lastname">
                            </div>
                        </div>
   
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Adress<span class="text-danger">
                                        *</span></label>
                                <input type="text" name="adress">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Date Of Birth<span class="text-danger">
                                        *</span></label>
                                <input type="Date" name="dateofbirth">
                            </div>
                        </div>


                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Email<span class="text-danger"> *</span></label>
                                <input type="text" name="email">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Phone :<span class="text-danger">
                                        *</span></label>
                                <input type="tel" id="phone" name="phone" placeholder="+212 XXX XX XX XX">
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Monthly Amount<span class="text-danger">*</span></label>
                                <input type="number" name="monthly_amount" step="0.01" min="0.01" placeholder="Enter monthly amount" class="form-control" required>
                            </div>
                            
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label px-3">Password<span class="text-danger"> *</span></label>
                                <input type="password" name="password">
                            </div>
                        </div>


                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Institutions<span class="text-danger">*</span></label>
                                <select name="institutions[]" class="form-control" id="multiple-select" multiple>
                                    @foreach ($user->institutions as $institution)
                                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Status<span class="text-danger"> *</span></label>
                                <select name="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>

                        </div>





                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex> 
                                <label class="form-control-label px-3">Profile picture<span class="text-danger">
                                        *</span></label>
                                         <input type="file" name="avatar" placeholder=""> 
                            </div>

                                        <div class="form-group col-sm-6 flex-column d-flex">
                                            <label class="form-control-label px-3">CV (Resume)<span class="text-danger">*</span></label>
                                            <input type="file" name="cv_file" accept=".pdf,.doc,.docx" class="form-control-file" required>
                                            
                                        </div>
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
    <script>
        let multipleSelect = new MultipleSelect('#multiple-select', {
            placeholder: 'Select Institutions'
        })
        </script>
</body>

</html>
