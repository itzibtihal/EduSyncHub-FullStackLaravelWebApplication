@extends('layouts.navbar')


@section('main-content')
<h1>Timesheets</h1>
       
      

        <div class="recent-orders">
            <h2>Recent timesheets</h2>
            <table>
                <thead>
                    <tr>
                        <th>Staff Name</th>
                        <th>Timesheet File</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timesheets as $timesheet)
                    <tr>
                        <td>{{ $timesheet->user->firstname }} {{ $timesheet->user->lastname }}</td>
                        {{-- <td><a>{{ $timesheet->file }}</a></td> --}}
                        {{-- <td>
                            <a href="{{ Storage::url($timesheet->file) }}" download>{{ $timesheet->file }}</a>
                        </td>
                        --}}
                        <td><a href="{{ Storage::url($timesheet->file) }}" target="_blank" >{{ $timesheet->file }}</a></td>
                       
                       
                        <td>
                           
                            @if($timesheet->is_valid == 1)
                                <span class="validated-icon">
                                    <span class="material-icons-sharp">check_circle</span>
                                </span>
                            @elseif($timesheet->is_valid == 0)
                                <button class="validate-btn" onclick="validateTimesheet({{ $timesheet->id }})" style="border-radius: 10px">
                                    <span class="material-icons-sharp">report_gmailerrorred</span> 
                                </button>
                            @else
                                <span class="default-content">Default content here</span>
                            @endif
                        </td>
                        

                        
                    </tr>
                    @endforeach
                </tbody>
              
          

            </table>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function validateTimesheet(timesheetId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to validate this timesheet.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, validate it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('timesheets.validate') }}",
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'timesheet_id': timesheetId
                    },
                    success: function(response) {
                        Swal.fire(
                            'Validated!',
                            'The timesheet has been validated.',
                            'success'
                        ).then(function() {
                            location.reload(); // Reload the page after validation
                        });
                    }
                });
            }
        });
    }
</script>

        </div>
       
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function validateTimesheet(timesheetId) {
                swal({
                    title: "Confirm Validation",
                    text: "Are you sure you want to validate this timesheet?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willValidate) => {
                    if (willValidate) {
                        // Perform validation logic here
                        // Update the is_valid field of the timesheet to 1
                        // Refresh the page or update the UI accordingly
                    }
                });
            }
        </script> --}}


{{-- here i want tolist timsheets i want to get in staff name the userfirstname +lastname / time sheet file i want it to be clickeble and open window to view the excel file / in the last i want to chek if is valid =0 to click on a button with valid and check icone and use sweet alert to confirm the validation form to the isvalid will be from 0 to 1 and if isvalid already =1 it will be green with small green bg with validated  --}}

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