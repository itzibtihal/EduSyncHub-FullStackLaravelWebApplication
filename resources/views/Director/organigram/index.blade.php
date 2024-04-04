<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title> Dashboard | EduSyncHub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .school-chart {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #FFD700;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 5px;
        }

        .icons-container {
            display: flex;
        }

        .icons-container i {
            margin-left: 10px;
        }


        .cycle {
            background-color: #98FB98;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .level {
            background-color: #FFA500;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .speciality {
            background-color: #FFD700;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 5px;
        }

        .section {
            background-color: #87CEFA;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 5px;
        }

        .level-input {
            border: none;
            border-bottom: 1px solid #000;
            outline: none;
            background-color: transparent;
            width: 100%;
            margin-bottom: 10px;
            /* Adjust margin as needed */
        }

        .icons-container {
            display: flex;
            align-items: center;
            /* Align items vertically center */
        }

        .add-button,
        .remove-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            margin-left: 5px;
            /* Adjust margin as needed */
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

                <a href="" class="{{ request()->routeIs('organizer.events.pending') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        school
                    </span>
                    <h3>Classes/ Courses</h3>
                </a>


                <a href="" class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Exams</h3>
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
            <h1>Organizational chart</h1>
            <div class="new-users">
                <div class="user-list">
                    <p>
                        WHAT IS ORGANIGRAM?
                        You can set up the distribution of classes in your establishment by specialty, level and school
                        cycle. A school cycle contains several school levels, then each level contains several
                        specialties,
                        and each specialty contains several sections of students.
                        <br>
                        <b>PS</b>: If it is a common school level (no specialties), you can add a specialty (without
                        name) with an
                        empty field and will have the value "Default" by default.
                    </p>
                </div>
            </div>

            <div class="recent-orders">
                <h2>All Requests</h2>
                {{-- 
                <div class="school-chart">
                    <div class="item cycle"><span>Cycle: Middle </span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon"></i>
                            <i class="fas fa-plus add-button"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="level item"><span>Level: 1st Year</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon "></i>
                            <i class="fas fa-plus add-specialty"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="speciality item"><span>Speciality: Default</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="section item"> <span>Section: Gr A</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="section item"><span>Section: Gr B</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="level item"><span>Level: 2nd Year</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="speciality item"><span>Speciality: Default</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="section item"><span>Section: Gr A</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="section item"><span>Section: Gr B</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="level item"><span>Level: 3rd Year</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="speciality item"><span>Speciality: Default</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="section item"><span>Section: Gr A</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="section item"><span>Section: Gr B</span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash"></i>
                            <i class="fas fa-plus"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>

                    <div class="item cycle"><span>Cycle: Height School </span>
                        <div class="icons-container">
                            <i class="fas fa-eye-slash toggle-icon "></i>
                            <i class="fas fa-plus add-button"></i>
                            <i class="fas fa-pencil-alt"></i>
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div> --}}
                <div class="school-chart">
                    @foreach ($cycles as $cycle)
    <div class="cycle">
        <h2>Cycle: {{ $cycle->name }}</h2>

        <div class="levels">
            @foreach ($cycle->levels as $level)
                <div class="level">
                    <h3>Level: {{ $level->name }}</h3>

                    <div class="specialities">
                        @foreach ($cycle->specialities as $speciality)
                            @if ($cycle->name !== 'High School')
                                @php
                                    $defaultSpeciality = 'Default';
                                @endphp
                            @else
                                @php
                                    $defaultSpeciality = null;
                                @endphp
                            @endif

                            <div class="speciality">
                                <h4>Speciality: {{ $speciality->parent_id ? $speciality->parent->name : $defaultSpeciality }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach

                </div>
                
                

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
        document.querySelectorAll('.cycle .toggle-icon').forEach(function(icon) {
            icon.addEventListener('click', function() {
                var cycle = icon.closest('.cycle');
                var children = cycle.nextElementSibling;
                while (children && !children.classList.contains('cycle')) {
                    children.style.display = children.style.display === 'none' ? '' : 'none';
                    children = children.nextElementSibling;
                }
            });
        });

        document.querySelectorAll('.speciality .toggle-icon').forEach(function(icon) {
            icon.addEventListener('click', function() {
                var speciality = icon.closest('.speciality');
                var sections = speciality.nextElementSibling;
                while (sections && !sections.classList.contains('speciality')) {
                    if (sections.classList.contains('section')) {
                        sections.style.display = sections.style.display === 'none' ? '' : 'none';
                    }
                    sections = sections.nextElementSibling;
                }
            });
        });

        document.querySelectorAll('.level .toggle-icon').forEach(function(icon) {
            icon.addEventListener('click', function() {
                var level = icon.closest('.level');
                var speciality = level.nextElementSibling;
                var sections = speciality.nextElementSibling;

                speciality.style.display = speciality.style.display === 'none' ? '' : 'none';

                while (sections && !sections.classList.contains('level') && !sections.classList.contains(
                        'cycle')) {
                    sections.style.display = sections.style.display === 'none' ? '' : 'none';
                    sections = sections.nextElementSibling;
                }
            });


        });
        document.addEventListener('DOMContentLoaded', function() {
            const addButtons = document.querySelectorAll('.add-button');
            const addSpecButtons = document.querySelectorAll('.add-specialty');

            addButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const levelItem = document.createElement('div');
                    levelItem.classList.add('level', 'item');
                    levelItem.innerHTML = `
                <form action="">
                    <span>
                        <div class="input-container">
                            <input type="text" class="level-input" placeholder="Type level name here">
                            <div class="icons-container">
                                <button type="submit" class="add-button"><i class="fas fa-check"></i></button>
                                <button type="button" class="remove-button"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </span>
                </form>
            `;

                    button.closest('.item.cycle').parentNode.insertBefore(levelItem, button.closest(
                        '.item.cycle').nextSibling);

                    const removeButton = levelItem.querySelector('.remove-button');
                    removeButton.addEventListener('click', function() {
                        levelItem.remove();
                    });




                    const addSpecButton = levelItem.querySelector('.add-specialty');
                    addSpecButton.addEventListener('click', function() {
                        const specialtyItem = document.createElement('div');
                        specialtyItem.classList.add('speciality', 'item');
                        specialtyItem.innerHTML = `
                    <form action="">
                        <span>
                            <div class="input-container">
                                <input type="text" class="specialty-input" placeholder="Type specialty here">
                                <div class="icons-container">
                                <button type="submit" class="add-button"><i class="fas fa-check"></i></button>
                                <button type="button" class="remove-button"><i class="fas fa-times"></i></button>
                            </div>
                            </div>
                        </span>
                    </form>
                `;

                        button.closest('.speciality.item').parentNode.insertBefore(
                            specialtyItem, button.closest('.speciality.item')
                            .nextSibling);

                        const removeSpecButton = specialtyItem.querySelector(
                            '.remove-button');
                        removeSpecButton.addEventListener('click', function() {
                            specialtyItem.remove();
                        });
                    });


                });
            });
        });
    </script>

</body>

</html>
