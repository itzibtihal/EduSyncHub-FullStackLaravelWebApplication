<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title> Dashboard | EduSyncHub </title>
    <style>
        .header2 {
            background-color: #2196F3;
            color: white;
            padding: 8px;
            text-align: center;
            border-radius: 10px;
        }

        .content {
            padding: 20px;
        }

        .select-box {
            margin-top: 0px;
        }

        #school-cycle {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .container2 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: calc(33.33% - 20px);
            /* Adjust the width based on your preference */
            min-width: 250px;
            /* Set a minimum width to prevent narrow cards */
            background-color: #f0f0f0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #495159;
            color: white;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-header2 {
            background-color: #E2725B;
            color: white;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }


        .card-body {
            padding: 20px;
            border: 1px solid #ccc;
            /* Add border */
        }

        .section-info {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info2 {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .info2 img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .specialty {
            margin-bottom: 10px;
        }

        .actions {
            text-align: center;
        }

        .btn {
            padding: 8px 16px;
            background-color: #495159;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;

        }

        .btn2 {
            padding: 8px 16px;
            background-color: #E2725B;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;

        }

        #E2725B .btn:last-child {
            margin-right: 0;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            /* Distribute space between the cards */
            flex-wrap: wrap;
            /* Allow cards to wrap to the next row if needed */
        }

        .custom-div {
            background-color: #007bff;
            /* Blue background color */
            color: #fff;
            /* White text color */
            padding: 10px;
            /* Padding around the text */
            border-radius: 5px;
            /* Rounded corners */
            font-weight: bold;
            /* Bold text */
            text-align: center;
            /* Center-align the text */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Shadow effect */
            width: 100%;
            /* Set width as needed */
            margin-bottom: 10px;
        }

        .middle-school-card {
            width: calc(33.33% - 20px);
            /* Adjust the width based on your preference */
            min-width: 250px;
            /* Set a minimum width to prevent narrow cards */
            background-color: #f0f0f0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .high-school-card {
            width: calc(33.33% - 20px);
            /* Adjust the width based on your preference */
            min-width: 250px;
            /* Set a minimum width to prevent narrow cards */
            background-color: #f0f0f0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>

            <div class="toggle">
                <div class="logo">
                    <img src="{{ asset('assets/images/edubg.png') }}" id="logo-image">
                    <h2>EduSync<span style="color:rgb(83, 151, 200);">Hub</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{ route('director.dashboard') }}"
                    class="{{ request()->routeIs('director.dashboard') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{ route('institutions.index') }}"
                    class="{{ request()->routeIs('institutions.index') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        domain_add
                    </span>
                    <h3> institutions</h3>
                </a>

                <a href="{{ route('director.students') }}"
                    class="{{ request()->routeIs('director.students') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Students</h3>
                </a>

                <a href="{{ route('director.professors') }}"
                    class="{{ request()->routeIs('director.professors') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        group
                    </span>
                    <h3>Professors</h3>
                </a>

                <a href="{{ route('director.organigram') }}"
                    class="{{ request()->routeIs('director.organigram') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        account_tree
                    </span>
                    <h3>Organizational chart</h3>

                </a>

                <a href="{{ route('director.classes') }}" class="{{ request()->routeIs('director.classes') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        school
                    </span>
                    <h3>Classes/ Courses</h3>
                </a>


                <a href="{{ route('director.exams') }}" class="{{ request()->routeIs('director.exams') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Exams</h3>
                </a>



                <a href="{{ route('director.absence') }}" class="{{ request()->routeIs('director.absence') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        crisis_alert
                    </span>
                    <h3>Absence</h3>
                </a>
  
                <a href="{{ route('timesheet.index') }}" class="{{ request()->routeIs('timesheet.index') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Timesheets</h3>
                </a>


                <a href="{{ route('director.holidays') }}" class="{{ request()->routeIs('director.holidays') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        travel_explore
                    </span>
                    <h3>Holidays</h3>
                </a>
               

                <a href="{{ route('director.reminders') }}" class="{{ request()->routeIs('director.reminders') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        notifications_active
                    </span>
                    <h3> Agenda </h3>
                    <span class="message-count">{{ $reminderCount }}</span>
                </a>








                <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>

                <form id="logout-form" action="" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Classes</h1>
            <!-- last 4 Users Section -->
            <div class="new-users">
                <div class="content">
                    <div class="select-box">
                        <h2>Select school cycle(s):</h2>
                        <select id="school-cycle">

                            <option value="middle">Middle</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- ************************************************* Middle *************************************************-->

            @foreach ($specialities as $speciality)
                <div class="custom-div middle-school">
                    Level: {{ $speciality->level_id }}th year (Middle)
                </div>

                <div class="container2 middle-school">
                    @if ($speciality->section)
                        @foreach ($speciality->section as $section)
                            <div class="card middle-school">
                                <div class="card-header">
                                    Section: {{ $speciality->getSpecialityName() }} ({{ $speciality->level_id }}th
                                    year Middle)
                                </div>
                                <div class="card-body">
                                    <div class="section-details">
                                        <div class="info2">
                                            <div class="icon2">
                                                <img src="{{ asset('assets/images/class.png') }}" alt="Students Icon">
                                            </div>
                                            <div class="text">
                                                Students
                                            </div>
                                        </div>
                                        <div class="specialty">
                                            Specialty: {{ $speciality->getSpecialityName() }}
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <button class="btn coursesBtn">
                                            <span class="material-icons-sharp">auto_stories</span>
                                            Courses
                                        </button>
                                        <button class="btn studentsBtn">
                                            <span class="material-icons-sharp">group</span>
                                            Students
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card middle-school">
                            <div class="card-body">
                                No sections found for this speciality.
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach



            <!-- ************************************************* high school *************************************************-->



            <div class="custom-div high-school" style="display: none;">
                Level: 1st year (high school)
            </div>

            <!-- sections for level 1 -->
            <div class="container2 high-school" style="display: none;">
                <div class="card">
                    <div class="card-header2">
                        Section: Gr A (1st year high school) - PHYSICAL EDUCATION
                    </div>


                    <div class="card-body">
                        <div class="section">

                            <div class="section-details">
                                <div class="info2">
                                    <div class="icon2">
                                        <img src="{{ asset('assets/images/class.png') }}" alt="Students Icon">
                                    </div>
                                    <div class="text">
                                        22 Students
                                    </div>
                                </div>
                                <div class="specialty">
                                    Specialty: default
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    auto_stories
                                </span>
                                Courses</button>
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    group
                                </span>
                                Students</button>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card-header2">
                        Section: Gr A (1st year high school) - PHYSICAL EDUCATION
                    </div>


                    <div class="card-body">
                        <div class="section">

                            <div class="section-details">
                                <div class="info2">
                                    <div class="icon2">
                                        <img src="{{ asset('assets/images/class.png') }}" alt="Students Icon">
                                    </div>
                                    <div class="text">
                                        22 Students
                                    </div>
                                </div>
                                <div class="specialty">
                                    Specialty: default
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    auto_stories
                                </span>
                                Courses</button>
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    group
                                </span>
                                Students</button>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card-header2">
                        Section: Gr A (1st year high school) - PHYSICAL EDUCATION
                    </div>


                    <div class="card-body">
                        <div class="section">

                            <div class="section-details">
                                <div class="info2">
                                    <div class="icon2">
                                        <img src="{{ asset('assets/images/class.png') }}" alt="Students Icon">
                                    </div>
                                    <div class="text">
                                        22 Students
                                    </div>
                                </div>
                                <div class="specialty">
                                    Specialty: default
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    auto_stories
                                </span>
                                Courses</button>
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    group
                                </span>
                                Students</button>
                        </div>
                    </div>


                </div>
                <!-- Repeat the card structure for other sections -->
            </div>

            <div class="custom-div high-school" style="display: none;">
                Level: 2nd year (high school)
            </div>

            <div class="container2 high-school" style="display: none;">
                <div class="card">
                    <div class="card-header2">
                        Section: Gr A (1st year high school) - PHYSICAL EDUCATION
                    </div>


                    <div class="card-body">
                        <div class="section">

                            <div class="section-details">
                                <div class="info2">
                                    <div class="icon2">
                                        <img src="{{ asset('assets/images/class.png') }}" alt="Students Icon">
                                    </div>
                                    <div class="text">
                                        22 Students
                                    </div>
                                </div>
                                <div class="specialty">
                                    Specialty: default
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    auto_stories
                                </span>
                                Courses</button>
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    group
                                </span>
                                Students</button>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card-header2">
                        Section: Gr A (1st year high school) - PHYSICAL EDUCATION
                    </div>


                    <div class="card-body">
                        <div class="section">

                            <div class="section-details">
                                <div class="info2">
                                    <div class="icon2">
                                        <img src="{{ asset('assets/images/class.png') }}" alt="Students Icon">
                                    </div>
                                    <div class="text">
                                        22 Students
                                    </div>
                                </div>
                                <div class="specialty">
                                    Specialty: default
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    auto_stories
                                </span>
                                Courses</button>
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    group
                                </span>
                                Students</button>
                        </div>
                    </div>


                </div>

                <!-- Repeat the card structure for other sections -->
            </div>


            <div class="custom-div high-school" style="display: none;">
                Level: 3rd year (high school)
            </div>

            <div class="container2 high-school" style="display: none;">
                <div class="card">
                    <div class="card-header2">
                        Section: Gr A (1st year high school) - PHYSICAL EDUCATION
                    </div>


                    <div class="card-body">
                        <div class="section">

                            <div class="section-details">
                                <div class="info2">
                                    <div class="icon2">
                                        <img src="{{ asset('assets/images/class.png') }}" alt="Students Icon">
                                    </div>
                                    <div class="text">
                                        22 Students
                                    </div>
                                </div>
                                <div class="specialty">
                                    Specialty: default
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    auto_stories
                                </span>
                                Courses</button>
                            <button class="btn2">
                                <span class="material-icons-sharp">
                                    group
                                </span>
                                Students</button>
                        </div>
                    </div>


                </div>


                <!-- Repeat the card structure for other sections -->
            </div>





        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
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


    </div>

    <script src="orders.js"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script>
        document.getElementById("school-cycle").addEventListener("change", function() {
            var selectedCycle = this.value;

            if (selectedCycle === "middle") {
                document.querySelectorAll(".middle-school").forEach(function(element) {
                    element.style.display = "block";
                });
                document.querySelectorAll(".high-school").forEach(function(element) {
                    element.style.display = "none";
                });
                // Add CSS class to adjust card width for middle school
                document.querySelectorAll(".card").forEach(function(element) {
                    element.classList.add("middle-school-card");
                    element.classList.remove("high-school-card");
                });
            } else if (selectedCycle === "high") {
                document.querySelectorAll(".middle-school").forEach(function(element) {
                    element.style.display = "none";
                });
                document.querySelectorAll(".high-school").forEach(function(element) {
                    element.style.display = "block";
                });
                // Add CSS class to adjust card width for high school
                document.querySelectorAll(".card").forEach(function(element) {
                    element.classList.add("high-school-card");
                    element.classList.remove("middle-school-card");
                });
            }
        });



        // Get all elements with the class "studentsBtn"
        var studentsButtons = document.getElementsByClassName("studentsBtn");
        for (var i = 0; i < studentsButtons.length; i++) {
            studentsButtons[i].addEventListener("click", function() {
                window.location.href =
                "{{ route('director.sectionstudents') }}"; // Assuming 'sectioncourses' is the name of your route
            });
        }


        //coursesBtn

        var coursesButtons = document.getElementsByClassName("coursesBtn");
        for (var i = 0; i < coursesButtons.length; i++) {
            coursesButtons[i].addEventListener("click", function() {
                window.location.href = "sectioncourses.html";
            });
        }



        //     document.addEventListener("DOMContentLoaded", function() {
        //     // Get all elements with class "coursesBtn"
        //     var coursesButtons = document.getElementsByClassName("coursesBtn");

        //     // Iterate over each button and attach click event listener
        //     for (var i = 0; i < coursesButtons.length; i++) {
        //         coursesButtons[i].addEventListener("click", function() {
        //             // Redirect to the desired URL
        // window.location.href = ""; // Assuming 'sectioncourses' is the name of your route
        //         });
        //     }
        // });
    </script>
</body>

</html>
