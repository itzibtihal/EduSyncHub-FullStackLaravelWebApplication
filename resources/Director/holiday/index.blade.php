@extends('layouts.navbar')



@section('main-content')
    <h1>Holidays</h1>


    <div class="recent-orders">
        <h2>Close Holidays</h2>


        <form action="{{ route('director.holidays.store') }}" method="POST">
            @csrf
            <label for="name">title:</label>
            <input type="text" id="title" name="title"
                style="flex: 0 0 calc(50% - 5px);
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: border-color 0.3s, box-shadow 0.3s;">
            <label for="city">From:</label>
            <input type="date" id="from" name="from"
                style="
                flex: 0 0 calc(50% - 5px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s, box-shadow 0.3s;
    ">

            <label for="city">To:</label>
            <input type="date" id="to" name="to"
                style="
    flex: 0 0 calc(50% - 5px);
padding: 10px;
border: 1px solid #ccc;
border-radius: 5px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
transition: border-color 0.3s, box-shadow 0.3s;
">
            <button type="submit" id="addInstitutionBtn"
                style="flex: 0 0 100%;
                padding: 10px 20px;
                background-color: #adccee;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;">Add
                Holiday</button>
        </form>

        <br>
        <table>
            <thead>
                <tr>
                    <th>title</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Number of days</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($holidays as $holiday)
                    <tr>
                        <td>{{ $holiday->title }}</td>
                        <td>{{ $holiday->from }}</td>
                        <td>{{ $holiday->to }}</td>
                        <td>{{ $holiday->number_of_days }}</td>
                        <td>

                            {{-- Delete action --}}
                            <form action="{{ route('director.holidays.destroy', $holiday->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this holiday?');">
                                    <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                                </button>
                            </form>
                        </td>
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
