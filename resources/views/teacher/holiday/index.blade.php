@extends('shared.navbar')



@section('main-content')
    <h1>Holidays</h1>


    <div class="recent-orders">
        <h2>Close Holidays</h2>


        <br>
        <table>
            <thead>
                <tr>
                    <th>title</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Number of days</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach ($holidays as $holiday)
                    <tr>
                        <td>{{ $holiday->title }}</td>
                        <td>{{ $holiday->from }}</td>
                        <td>{{ $holiday->to }}</td>
                        <td>{{ $holiday->number_of_days }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Display pagination links --}}
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
