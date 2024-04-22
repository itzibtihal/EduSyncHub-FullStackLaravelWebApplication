<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title> Dashboard | EduSyncHub </title>
    <style>
        .star {
            color: blue;
            /* Change color as needed */
        }

        .rating-text {
            margin-left: 5px;
            /* Adjust spacing between stars and text */
        }

        /* The Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            /* Ensure modal is above other content */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            /* Black background with transparency */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            /* Center modal on screen */
            padding: 20px;
            /* border: 1px solid #888; */
            border-radius: 20px;
            width: 70%;
            /* Adjust width as needed */
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Additional Styles */
        .student-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            position: relative;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .initials {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #fff;
        }

        .info p {
            margin: 0;
        }

        .discipline,
        .notes {
            margin-bottom: 20px;
        }

        .stars {
            color: gold;
        }

        .label {
            font-weight: bold;
        }

        /* Style for the submit button */
        button[type="submit"] {
            background-color: #4CAF50;
            /* Green background */
            color: white;
            /* White text */
            padding: 10px 20px;
            /* Padding */
            border: none;
            /* No border */
            border-radius: 4px;
            /* Rounded corners */
            cursor: pointer;
            /* Cursor style on hover */
        }

        /* Hover effect */
        button[type="submit"]:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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

                <a href="{{ route('director.classes') }}" class="active">
                    <span class="material-icons-sharp">
                        school
                    </span>
                    <h3>Classes/ Courses</h3>
                </a>


                <a href="{{ route('director.exams') }}"
                    class="{{ request()->routeIs('director.exams') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Exams</h3>
                </a>



                <a href="{{ route('director.absence') }}"
                    class="{{ request()->routeIs('director.absence') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        crisis_alert
                    </span>
                    <h3>Absence</h3>
                </a>

                <a href="{{ route('timesheet.index') }}"
                    class="{{ request()->routeIs('timesheet.index') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Timesheets</h3>
                </a>


                <a href="{{ route('director.holidays') }}"
                    class="{{ request()->routeIs('director.holidays') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        travel_explore
                    </span>
                    <h3>Holidays</h3>
                </a>


                <a href="{{ route('director.reminders') }}"
                    class="{{ request()->routeIs('director.reminders') ? 'active' : '' }}">
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
            <h1>Students</h1>

            

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Student Information</h2>
                    <!-- Add more details here -->
                    <div class="student-info">
                        <div class="avatar">
                            <img src="{{ asset('assets/images/profile-2.jpg') }}" alt="Avatar">
                            <span class="initials">ST</span>
                        </div>
                        <div class="info">
                            <p class="name">Amela Danny Miller</p>
                            <p class="email">Aliquam.ultrices@Integer.eu</p>
                            <p class="phone">(+212) 68 88 39 54</p>
                        </div>
                    </div>
                    <div class="absences">
                        <h2 class="label">Absences</h2>
                        <p>Justifiable absences <span class="absence-count" style="color: blue;">0</span> sessions</p>
                        <p>Unjustifiable absences <span class="absence-count" style="color: blue;">0</span> sessions</p>
                    </div>

                    <br>
                    <div class="discipline">
                        <h2 class="label">Discipline note:</h2>

                        <div class="stars">
                            <!-- Stars will be added dynamically -->
                        </div>
                        <form class="form-card" action="{{ route('discipline.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" class="user_id" value="">
                            <label for="discipline-input" class="label"><b>PS:</b>write the Discipline note in this
                                form please (00/10) :</label><br><br>
                            <input type="text" class="discipline-input" name="discipline" value="">
                            <br><br>
                            <br>
                            <h2 class="label">Notes :</h2>
                            <textarea class="note-input" rows="4" cols="50" name="note"></textarea>
                            <br>

                            <button type="submit">Submit</button>
                        </form>
                    </div>

                    {{-- <div class="notes">
                        <h2 class="label">Notes :</h2>
                        <form>
                            <textarea class="note-input" rows="4" cols="50">good !</textarea>
                            <br>
                            <button type="submit">Submit</button>
                        </form>
                    </div> --}}
                </div>
            </div>


            <div class="recent-orders">
                <h2>All Students</h2>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>The discipline</th>
                            <th>Notes</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td></td>
                                <td>{{ $student->firstname }}</td>
                                <td>{{ $student->lastname }}</td>
                                <td>
                                    @if($student->disciplines->isNotEmpty())
                                    @for($i = 0; $i < ($student->disciplines->last()->discipline)/2; $i++)
                                        <span>	&#11088;</span> <!-- Filled star -->
                                    @endfor
                                    @for($i = ($student->disciplines->last()->discipline)/2; $i < 5; $i++)
                                        <span>&#9734;</span> <!-- Empty star -->
                                    @endfor
                                @endif
                                </td>
                                <td>
                                    @if($student->disciplines->isNotEmpty())
                                    {{ $student->disciplines->last()->note }}
                                @endif
                                </td>
                                <td>
                                    <!--  view student details -->
                                    <a class="detailsBtn" href="#" data-student-id="{{ $student->id }}">View
                                        Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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


    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script>
        
        document.querySelectorAll('.detailsBtn').forEach(function(detailsBtn) {
    detailsBtn.addEventListener('click', function(e) {
        e.preventDefault();

        var studentId = this.getAttribute('data-student-id');
        console.log(studentId);

        axios.get('/student-details/' + studentId)
            .then(response => {
                const data = response.data;
                console.log(data);
                // Update the modal with the fetched data
                document.querySelector('.modal .name').textContent = data.firstname + ' ' + data.lastname;
                document.querySelector('.modal .email').textContent = data.email;
                document.querySelector('.modal .phone').textContent = data.phone;
                document.querySelector('.modal .avatar img').src = data.avatar;
                let userInput = document.querySelector('.modal .user_id');
                userInput.value = data.id;
                console.log(userInput.value);

                // Update the absences count
                let justifiedAbsences = document.querySelectorAll('.modal .absences p')[0];
                justifiedAbsences.querySelector('.absence-count').textContent = data.justified_absences;

                let unjustifiedAbsences = document.querySelectorAll('.modal .absences p')[1];
                unjustifiedAbsences.querySelector('.absence-count').textContent = data.unjustified_absences;

                let disciplineInput = document.querySelector('.modal .discipline-input');
                let noteInput = document.querySelector('.modal .note-input');

                // Update the discipline note and the general note
                if (data.discipline) {
                    console.log(data.discipline);
                    disciplineInput.value = data.discipline;
                } else {
                    disciplineInput.value = 'No discipline note available';
                }

                if (data.note) {
                    noteInput.value = data.note;
                } else {
                    noteInput.value = 'No general note available';
                }

                // Display the modal
                document.getElementById('myModal').style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching student details:', error);
            });
    });
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>
</body>

</html>
