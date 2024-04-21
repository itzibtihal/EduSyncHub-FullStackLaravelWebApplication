@extends('shared.navbar')


@section('main-content')
<h1>Dashboard</h1>
       
      
<div class="new-users">
    
    <div class="user-list">
        <div>
        <h2>Nice to see you again Dr . {{ auth()->user()->lastname }} {{ auth()->user()->firstname }} !</h2>
        <br>
        <p style="color: green"> Dont forget to keep your timesheet UPDATED! </p>
    </div>       
        @if(empty(auth()->user()->avatar))
            <img src="{{ asset('assets/img/img/avatar-1.png') }}" alt="Profile Image" style="width: 100px; border-radius: 50%;">
        @else
            <img src="{{ asset('storage/' .  auth()->user()->avatar) }}" alt="Profile Image" style="width: 100%; border-radius: 50%;">
        @endif
    </div>
</div>

        <div class="recent-orders">
                <h2>My Recent exams</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>subject</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exams as $exam)
                        <tr>
                            <td>{{ $exam->title }}</td>
                            <td>{{ $exam->date }}</td>
                            <td>{{ $exam->duration }}</td>
                            <td>{{ $exam->subject->name }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('professor.exams.index') }}">Show All</a>
        </div>

        <div class="recent-orders">
            <h2> Today's absence</h2>
            <table> 
                <thead>
                    <tr>
                        <th>Student full Name</th>
                        <th>Section</th>
                        <th>Subject</th>
                        <th>Duration</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absences as $absence)
                        <tr>
                            <td>{{ $absence->user->firstname }} {{ $absence->user->lastname }}</td>
                            <td>{{ $absence->section->name }}</td>
                            <td>{{ $absence->subject->name  }}</td>
                            <td>
                                @php
                                $startsAt = \Carbon\Carbon::parse($absence->starts_at);
                                $endsAt = \Carbon\Carbon::parse($absence->ends_at);
                                $duration = $endsAt->diffInMinutes($startsAt);
                                @endphp
                                @if ($duration < 10)
                                    <span style="color: red;">late: {{ $duration }} min</span>
                                @else
                                    @php
                                        $days = floor($duration / 1440); // 1440 minutes in a day
                                        $remainingMinutes = $duration % 1440;
                                    @endphp

                                    @if ($days > 0)
                                        {{ $days }} day{{ $days > 1 ? 's' : '' }}
                                    @endif

                                    @if ($remainingMinutes > 0)
                                        {{ $remainingMinutes }} min
                                    @endif
                                @endif
                            </td>
                            <td>{{ $absence->reason }}</td>
                        </tr>
                    @endforeach

                    @if (empty($absences))
                        <tr>
                            <td colspan="5">No absence was marked today</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <a href="{{ route('teacher.absence') }}">Show All</a>
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