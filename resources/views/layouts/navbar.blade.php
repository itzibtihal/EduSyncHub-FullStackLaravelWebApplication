<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title> EduSyncHub | Dashboard </title>

    <style>
        .recent-orders {
            text-align: center;
        }

        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* Adjust the gap between charts as needed */
            margin-top: 20px;
            /* Adjust the top margin as needed */
        }

        canvas {
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
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


                <a href="" class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Exams</h3>
                </a>

                <a href="{{ route('director.holidays') }}" class="{{ request()->routeIs('director.holidays') ? 'active' : '' }}">
                    <span class="material-icons-sharp">
                        travel_explore
                    </span>
                    <h3>Holidays</h3>
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
            @yield('main-content')
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            @yield('right-section')
        </div>

    </div>

    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>

</html>
