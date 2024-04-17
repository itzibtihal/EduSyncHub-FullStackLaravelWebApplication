@extends('layouts.navbar')

@section('main-content')
<h1>Absence</h1>
       
<div class="recent-orders">
    <h2>Today's Absence</h2>
    <a href="{{ route('director.absence.create') }}">Add an Absence</a>
    <table>
        <thead>
            <tr>
                <th>Student full Name</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Duration</th>
                <th>Reason</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absences as $absence)
            <tr>
                <td>{{ $absence->user->firstname }} {{ $absence->user->lastname }}</td>
                <td>{{ $absence->section->name }}</td>
                <td>{{ $absence->subject->name }}</td>
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
                <td>
                    <a href="#" onclick="confirmDelete('{{ route('director.absence.delete', $absence->id) }}', 'delete-form-{{ $absence->id }}')">
                        <i class="material-icons">delete</i>
                    </a>
                    <form id="delete-form-{{ $absence->id }}" action="{{ route('director.absence.delete', $absence->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $absences->links() }}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(deleteUrl, formId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this exam!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).action = deleteUrl;
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
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