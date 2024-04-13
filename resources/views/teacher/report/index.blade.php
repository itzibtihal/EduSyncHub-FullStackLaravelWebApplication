@extends('shared.navbar')


@section('main-content')
    <h1>Timesheet</h1> <br>
    <style>
        /* Status Container */
        .status-container {
            display: flex;
            align-items: center;
            background-color: #e5f4ef;
            padding: 10px;
            border-radius: 5px;
        }

        /* Status Icon */
        .status-container i {
            margin-right: 10px;
            font-size: 20px;
            color: #4caf50;
            /* Green color for the status icon */
        }

        /* Status Text */
        .status-text {
            color: #4caf50;
            /* Green color for the status text */
            font-weight: bold;
            margin-right: 10px;
        }


        /* Submit Button */
        .submit-button {
            background-color: #4caf50;
            /* Green background color for the submit button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Submit Button Hover Effect */
        .submit-button:hover {
            background-color: #45a049;
            /* Darker green color on hover */
        }

        .fa-check {
            color: white;
        }

        .wraper-div {
            display: flex;
            align-items: center;
            justify-content: center;
            /* min-height: 100vh; */
        }

        .wrapper {
            width: 430px;
            padding: 30px;
            background: #fff;
            border-radius: 5px;
        }

        .wrapper header {
            color: #6990f2;
            font-size: 27px;
            font-weight: 600;
            text-align: center;
        }

        .wrapper form {
            height: 167px;
            display: flex;
            margin: 30px 0;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 5px;
            border: 2px dashed #6990f2;
        }

        form :where(i, p) {
            color: #6990f2;
        }

        form i {
            font-size: 50px;
        }

        form p {
            font-size: 16px;
            margin-top: 15px;
        }

        section .row {
            background: #e9f0ff;
            margin-bottom: 10px;
            list-style: none;
            padding: 15px 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        section .row {
            font-size: 30px;
            color: #6990f2;
        }

        section .details span {
            font-size: 14px;
        }

        .progress-area .row .content {
            width: 100%;
            margin-left: 15px;
        }

        .progress-area .details {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 7px;
        }

        .progress-area .progress-bar {
            height: 6px;
            width: 100%;
            background: #fff;
            margin-bottom: 4px;
            border-radius: 30px;
        }

        .progress-bar .progress {
            height: 100%;
            width: 50%;
            background: #6990f2;
            border-radius: inherit;
        }

        .uploaded-area {
            max-height: 150px;
            overflow-y: scroll;
        }

        .uploaded-area.onprogress {
            max-height: 150px;

        }

        .uploaded-area::-webkit-scrollbar {
            width: 0px;
        }

        .uploaded-area .row .content {
            display: flex;
            align-items: center;
        }

        .uploaded-area .row .details {
            display: flex;
            margin-left: 15px;
            flex-direction: column;
        }

        .uploaded-area .details .size {
            font-size: 11px;
            color: #404040;
        }

        .uploaded-area .fa-check {
            color: #6990f2;
            font-size: 16px;
        }

        .wrapper .name {
            color: black;
        }
    </style>
    <div class="status-container">
        <i class="fas fa-bell"></i>
        <span class="status-text">Not submitted for validation</span>
        <br>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <br><br>
    @if ($timesheet)
        <a >
            <em>Click to download your timesheet file</em>
        </a>
    @elseif ($yearlyTimesheet)
        <a  href="{{ $filePath }}" download="timesheet_2024.xlsx" >
            <em>Click to download the yearly timesheet file</em>
        </a>
    @else
        <em>No timesheet files available</em>
    @endif
    <br><br>

    <script>
        // Function to download a file using JavaScript
        function downloadFile(filePath) {
          var downloadLink = document.getElementById('downloadLink');
          downloadLink.href = filePath;
          downloadLink.setAttribute('download', '');
          downloadLink.click();
        }
      
        var filePath = '{{ $filePath }}'; // Use the file path passed from the controller
        downloadFile(filePath);
    </script>


    <div class="wraper-div">

        <div class="wrapper">
            <header>Timesheet Uploader </header>
            <form id="timesheetForm" action="{{ route('timesheets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" class="file-input" name="file" style="opacity: 0">
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Browse file to Upload</p>
                <button id="submitFormButton" type="submit" class="submit-button">Submit for validation</button>
            </form>
            
            <section class="progress-area"></section>
            <section class="uploaded-area">

            </section>
        </div>
    </div>
    <script>
        const form = document.querySelector("form"),
            fileInput = document.querySelector(".file-input"),
            progressArea = document.querySelector(".progress-area"),
            uploadedArea = document.querySelector(".uploaded-area");

        form.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.onchange = ({
            target
        }) => {
            let file = target.files[0];
            if (file) {
                let fileName = file.name;
                if (fileName.length >= 12) {
                    let splitName = fileName.split('.');
                    fileName = splitName[0].substring(0, 12) + "..." + splitName[1];
                }
                uploadFile(fileName);
            }
        }



        function uploadFile(name) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/upload");

            xhr.upload.addEventListener("progress", ({
                loaded,
                total
            }) => {
                let fileLoaded = Math.floor((loaded / total) * 100);
                let fileTotal = Math.floor(total / 1000);
                let fileSize;
                (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) +
                    " MB";

                let progressHTML = `
          <li class="row">
            <i class="fas fa-file-alt"></i>
            <div class="content">
              <div class="details">
                <span class="name">${name} • Uploading</span>
                <span class="percent">${fileLoaded}%</span>
              </div>
              <div class="progress-bar">
                <div class="progress" style="width: ${fileLoaded}%"></div>
              </div>
            </div>
          </li>`;
                uploadedArea.classList.add("onprogress");
                progressArea.innerHTML = progressHTML;
                if (loaded == total) {
                    progressArea.innerHTML = "";
                    let uploadedHTML = `
            <li class="row">
              <div class="content">
                <i class="fas fa-file-alt"></i>
                <div class="details">
                  <span class="name">${name} • Uploaded</span>
                  <span class="size">${fileSize}</span>
                </div>
              </div>
              <i class="fas fa-check"></i>
            </li>`;
                    uploadedArea.classList.remove("onprogress");
                    // uploadedArea.innerHTML = uploadedHTML;
                    uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
                }
            });

            let formData = new FormData(form);
            xhr.send(formData);
        }
        // form.addEventListener("click", (event) => {
        //     event.preventDefault(); // Prevent default form submission behavior
        //     fileInput.click();
        // });
    </script>
   
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const submitFormButton = document.getElementById('submitFormButton');
        const form = document.getElementById('timesheetForm');

        submitFormButton.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default form submission

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Confirmation',
                text: 'Are you sure you want to submit the form?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, submit it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    form.submit();
                }
            });
        });
    });
</script>


@endsection

@section('right-section')
    <div class="right-section">
        <div class="nav">
            <button id="menu-btn">
                <span class="material-icons-sharp">
                    menu
                </span>
            </button>
            <div class="dark-mode">
                <span class="material-icons-sharp active">
                    light_mode
                </span>
                <span class="material-icons-sharp">
                    dark_mode
                </span>
            </div>

            <div class="profile">
                <div class="info">
                    <p>Hey, <b>{{ Auth::user()->lastname }}</b></p>
                    <small class="text-muted">{{ Auth::user()->role()->first()->name }}</small>
                </div>
                <div class="profile-photo">
                    <img src="{{ asset('assets/images/profile-1.jpg') }}">
                </div>
            </div>

        </div>
        <!-- End of Nav -->





        <div class="user-profile">
            <div class="logo">
                <img src="{{ asset('assets/images/edubg.png') }}" id="logo-image">
                <h2>EduSyncHub</h2>
                <p>Espace Educatif </p>
            </div>
        </div>

        <div class="reminders">
            <div class="header">
                <h2>Reminders</h2>
                <span class="material-icons-sharp">
                    notifications_none
                </span>
            </div>

            <div class="notification">
                <div class="icon">
                    <span class="material-icons-sharp">
                        volume_up
                    </span>
                </div>
                <div class="content">
                    <div class="info">
                        <h3>Workshop</h3>
                        <small class="text_muted">
                            08:00 AM - 12:00 PM
                        </small>
                    </div>
                    <span class="material-icons-sharp">
                        more_vert
                    </span>
                </div>
            </div>

            <div class="notification deactive">
                <div class="icon">
                    <span class="material-icons-sharp">
                        edit
                    </span>
                </div>
                <div class="content">
                    <div class="info">
                        <h3>Workshop</h3>
                        <small class="text_muted">
                            08:00 AM - 12:00 PM
                        </small>
                    </div>
                    <span class="material-icons-sharp">
                        more_vert
                    </span>
                </div>
            </div>

            <div class="notification add-reminder">
                <div>
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>Add Reminder</h3>
                </div>
            </div>

        </div>

    </div>
@endsection
