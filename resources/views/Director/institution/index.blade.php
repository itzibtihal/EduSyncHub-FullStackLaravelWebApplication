@extends('layouts.navbar')


@section('main-content')
    <h1>Institutions</h1>


    <div class="recent-orders">
        <h2>Recent Institutions</h2>


        <form action="{{route('institutions.store')}}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"
                style="flex: 0 0 calc(50% - 5px);
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: border-color 0.3s, box-shadow 0.3s;">
            <label for="city">City:</label>
            <input type="text" id="city" name="city"
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
                Institution</button>
        </form>

        <br>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($institutions as $institution)
                    <tr>
                        <td>{{ $institution->name }}</td>
                        <td>{{ $institution->city }}</td>
                        <td>
                            {{-- Edit action --}}
                            <a href="{{ route('institutions.edit', $institution->id) }}">
                                <i class="fas fa-edit"></i> <!-- Edit icon -->
                            </a>
                            {{-- Delete action --}}
                            <form action="{{ route('institutions.destroy', $institution->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this institution?');">
                                    <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                                </button>
                            </form>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $institutions->links() }} {{-- Display pagination links --}}
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
