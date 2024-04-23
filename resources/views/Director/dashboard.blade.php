@extends('layouts.navbar')


@section('main-content')
<h1>Dashboard</h1>
           <!-- Analyses -->
           <div class="analyse">
            <div class="sales">
                <div class="status">
                    <div class="info">
                        <h3>TOTAL Students</h3>
                        <h1>{{ $userCount }}</h1>
                    </div>
                    <div class="progresss">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>+81%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="visits">
                <div class="status">
                    <div class="info">
                        <h3>Today's Exams</h3>
                        <h1>{{ $examsCount }}</h1>
                    </div>
                    <div class="progresss">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>-48%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="searches">
                <div class="status">
                    <div class="info">
                        <h3> Total absence </h3>
                        <h1>{{ $absenceCount }}</h1>
                    </div>
                    <div class="progresss">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>+21%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <br>

       <!-- New Users Section -->
       <div class="new-users">
        <h2>New Users</h2>
        <div class="user-list">
            @foreach($lastUsers as $lastUser)
        <div class="user">
            <a href="{{ asset('storage/' . $lastUser->avatar) }}" target="_blank">
                <img src="{{ asset('storage/' . $lastUser->avatar) }}" alt="Profile Image">
            </a>
            <h2>{{ $lastUser->firstname }} {{ $lastUser->lastname }}</h2>
            <p>{{ $lastUser->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
        </div>
    </div>

        <div class="recent-orders">
                <h2>Recent exams</h2>
                <table>
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Teacher</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lastExams as $exam)
                        <tr>
                            <td>{{ $exam->title }}</td>
                            <td>{{ $exam->date }}</td>
                            <td>{{ $exam->duration }} minutes</td>
                            <td>
                                @php
                                    $professor = App\Models\User::where('id', $exam->professor_id)->first();
                                    echo "DR. ";
                                      echo $professor->lastname;
                                @endphp
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('director.exams') }}">Show All</a>
            </div>

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
                <p>Hey, <b>{{Auth::user()->lastname}}</b></p>
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