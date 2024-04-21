@extends('layouts.navbar')

@section('main-content')
<h1>Students</h1>
          
<!-- last 4 Users Section -->
<div class="new-users">
    <h2>last added Students</h2>
    <!-- Begin foreach loop -->
    <div class="user-list">
        @foreach($students as $student)
        <div class="user">
            <a href="{{ asset('storage/' . $student->avatar) }}" target="_blank">
                <img src="{{ asset('storage/' . $student->avatar) }}" alt="Profile Image">
            </a>
            <h2>{{ $student->firstname }} {{ $student->lastname }}</h2>
            <p>{{ $student->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
    </div>
    <!-- End foreach loop -->
</div>
<!-- End of 4 Users Section -->
   

<!-- End of 4 Users Section -->

<div class="recent-orders">
    <h2>All  Students</h2>
    <a href="{{route('student.create')}}">Add new Student</a>
    <table>
        <thead>
            <tr>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Class</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Status</th>
                <th></th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($allstudents as $allstudent)
                    <tr>
                        <td>
                            <a href="{{ asset('storage/' . $allstudent->avatar) }}" target="_blank">
                                <img src="{{ asset('storage/' . $allstudent->avatar) }}" alt="Profile Image" style="width: 40px; border-radius: 50%;">
                            </a>
                        </td>
                        <td>{{ $allstudent->firstname }} {{ $allstudent->lastname }}</td>
                        <td>{{ $allstudent->sections->pluck('name')->join(', ') }}</td>
                        <td>{{ $allstudent->phone }}</td>
                        <td>{{ $allstudent->email }}</td>
                        <td>{{ $allstudent->status }}</td>
                        <td>
                            <td>
                                {{-- <a href="{{ route('student.edit', $allstudent->id) }}">Edit</a> --}}
                                <form action="{{ route('students.delete', $allstudent->id) }}" method="POST" id="delete-form-{{ $allstudent->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('students.edit', $allstudent->id) }}">Edit</a>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $allstudent->id }}').submit();">Delete</a>
                                </form>
                            </td>
                        </td>
                    </tr>
                    @endforeach
        </tbody>
    </table>
    {{ $allstudents->links() }}
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