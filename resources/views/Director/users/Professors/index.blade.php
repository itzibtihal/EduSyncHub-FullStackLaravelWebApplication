@extends('layouts.navbar')


@section('main-content')
<h1>Professor</h1>
            <!-- last 4 Users Section -->
            <div class="new-users">
                <h2>Recent Professors</h2>
                <div class="user-list">
                    @foreach($Professors as $professor)
                    <div class="user">
                        <a href="{{ asset('storage/' . $professor->avatar) }}" target="_blank">
                            <img src="{{ asset('storage/' . $professor->avatar) }}" alt="Profile Image">
                        </a>
                        <h2>{{ $professor->firstname }} {{ $professor->lastname }}</h2>
                        <!-- Add any other user details you want to display -->
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- End of 4 Users Section -->
            
            <div class="recent-orders">
                <h2>All Professors</h2>
                <a href="{{route('professors.create')}}">Add new Professor</a>
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $professor)
                        <tr>
                            <td>{{ $professor->email }}</td>
                            <td>{{ $professor->firstname }} {{ $professor->lastname }}</td>
                            <td>{{ $professor->phone }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!-- Delete Action -->
                                    <form action="{{ route('professors.delete', $professor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this professor?')">
                                        @csrf
                                      
                                        <button type="submit" class="btn btn-danger btn-sm mr-2" title="Delete Professor">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                
                                    <!-- Update Action -->
                                    <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-primary btn-sm" title="Edit Professor">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
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