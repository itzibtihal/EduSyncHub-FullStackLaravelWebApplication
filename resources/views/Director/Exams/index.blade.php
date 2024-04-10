@extends('layouts.navbar')


@section('main-content')
<h1>Exams</h1>
           



        <div class="recent-orders">
                <h2>Recent exams</h2>
                <a href="{{route('director.exams.create')}}">Create an Exam</a>
                <table>
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>Date</th>
                            <th>Duration</th>
                            <th>Subject</th>
                            <th>professor</th>
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
                            <td>DR.{{ $exam->professor->lastname }}</td>
                            <td>
                                <a href="{{ route('director.exams.edit', $exam->id) }}">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="{{ route('director.exams.delete', $exam->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $exam->id }}').submit();">
                                    <i class="material-icons">delete</i>
                                </a>
                                <form id="delete-form-{{ $exam->id }}" action="{{ route('director.exams.delete', $exam->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
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