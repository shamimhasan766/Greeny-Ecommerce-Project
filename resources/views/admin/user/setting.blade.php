@extends('layouts.admin_layout')
@section('content')
<div class="row flex-column-reverse flex-md-row">
    <div class="col-md-8">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <div class="d-flex flex-column flex-md-row text-center text-md-start mb-3">
                            <figure class="me-4 flex-shrink-0">
                                <img width="100" class="rounded-pill"
                                    src="{{Auth::user()->profile->photo ? asset(Auth::user()->profile->photo) : asset('admin/assets/images/user/man_avatar3.jpg')}}" alt="...">
                            </figure>
                            <div class="flex-fill">
                                <h5 class="mb-3">{{ Auth::user()->name }}</h5>
                                <a class="change btn btn-primary me-2">Change Avatar</a>


                                <p class="small text-muted mt-3">For best results, use an image at least
                                    256px by 256px in either .jpg or .png format</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Basic Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name ?? old('name') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" value="{{ Auth::user()->profile->username ?? old('username') }}">
                                            @error('username')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" disabled class="form-control" name="" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <div class="d-flex gap-3">
                                                <input type="date" id="birthday" class="form-control" name="date_of_birth" value="{{ Auth::user()->profile->date_of_birth ?? old('date_of_birth') }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input {{ Auth::user()->profile->gender == 'male' ? 'checked': '' }} type="radio" value="male" name="gender"
                                                        class="form-check-input">
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input {{ Auth::user()->profile->gender == 'fmale' ? 'checked': '' }} type="radio" value="female" name="gender"
                                                        class="form-check-input">
                                                    <label class="form-check-label"
                                                        for="inlineRadio2">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Role</label>
                                            <select disabled class="form-select">
                                                <option value="">{{ Auth::user()->profile->role }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select disabled class="form-select">
                                                <option value="">{{ Auth::user()->profile->department }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Contact</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ Auth::user()->profile->phone ?? old('phone') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="text" class="form-control" name="website" value="{{ Auth::user()->profile->website ?? old('website') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address Line 1</label>
                                        <input type="text" class="form-control" name="address_1" value="{{ Auth::user()->profile->address_1 ?? old('address_1') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" class="form-control" name="address_2" value="{{ Auth::user()->profile->address_2 ?? old('address_2') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Post Code</label>
                                        <input type="text" class="form-control" name="zip" value="{{ Auth::user()->profile->zip ?? old('zip') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" value="{{ Auth::user()->profile->city ?? old('city') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        <input type="text" class="form-control" name="state" value="{{ Auth::user()->profile->state ?? old('state') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ Auth::user()->profile->country ?? old('country') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-4">Social</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" value="{{ Auth::user()->profile->twitter ?? old('twitter') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" value="{{ Auth::user()->profile->facebook ?? old('facebook') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" value="{{ Auth::user()->profile->instagram ?? old('instagram') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">GitHub</label>
                                            <input type="text" class="form-control" name="github" value="{{ Auth::user()->profile->github ?? old('github') }}">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 m-auto d-block"><i class="bi bi-check-circle"></i> Save</button>
                </form>
            </div>
            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Change Password</h6>
                        <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password Repeat</label>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="notification-settings" role="tabpanel"
                 aria-labelledby="notification-settings-tab">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Notifications</h6>
                        <h6 class="mb-4">Activity Notifications</h6>
                        <div class="mb-5">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" checked id="cs1">
                                    <label class="form-check-label" for="cs1">Someone assigns me to a task</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" checked id="cs2">
                                    <label class="form-check-label" for="cs2">Someone mentions me in a
                                        conversation</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" checked id="cs3">
                                    <label class="form-check-label" for="cs3">Someone adds me to a project</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="cs4">
                                    <label class="form-check-label" for="cs4">Activity on a project I am a member
                                        of</label>
                                </div>
                            </div>
                        </div>
                        <h6 class="mb-4">Service Notifications</h6>
                        <div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="cs5">
                                    <label class="form-check-label" for="cs5">Monthly newsletter</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" checked id="cs6">
                                    <label class="form-check-label" for="cs6">Major feature enhancements</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="cs7">
                                    <label class="form-check-label" for="cs7">Minor updates and bug fixes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card sticky-top mb-4 mb-md-0">
            <div class="card-body">
                <ul class="nav nav-pills flex-column gap-2" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="true">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="password-tab" data-bs-toggle="tab" href="#password" role="tab"
                           aria-controls="password" aria-selected="false">
                            <i class="bi bi-lock me-2"></i> Password
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="notification-settings-tab" data-bs-toggle="tab" href="#notification-settings"
                           role="tab"
                           aria-controls="notification-settings" aria-selected="false">
                            <i class="bi bi-bell me-2"></i> Notifications
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        Swal.fire({
        position: "top-end",
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
@endif
<script>
            // edit

            $('.change').on('click', function(){
                Swal.fire({
                    title: "Change Profile Picture",
                    html:
                    `
                    <img class="mt-4" height="200" id="blah" src="{{ asset(Auth::user()->profile->photo) }}" alt="">
                    <input type="file" id="photo" class="mt-3" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    `,
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Save",
                }).then((result) => {
                    if (result.isConfirmed) {

                    let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                    // Access input values
                    let photoValue = document.getElementById('photo').files[0];

                    // Create a FormData object to send the data
                    let formData = new FormData();
                    formData.append('_token', csrfToken);
                    formData.append('photo', photoValue);

                    // Use fetch to send the data to the server
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("user.profile.photo.update") }}', // Laravel route for handling the update
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                           // Handle success response
                                console.log(response);

                        // Show a customized success message with SweetAlert2
                        Swal.fire({
                            title: 'Success',
                            text: 'Category updated successfully',
                            icon: 'success',
                            confirmButtonColor: '#28a745',
                        }).then((result) => {
                            // Optionally, perform actions after the user clicks the "OK" button
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page or perform other actions
                            }
                        });
                        // Add an event listener to the SweetAlert modal overlay
                        document.querySelector('.swal2-container').addEventListener('click', function(event) {
                            // Check if the click is outside the modal (overlay)
                            if (event.target.classList.contains('swal2-container')) {
                                location.reload(); // Reload the page or perform other actions
                            }
                        });
                        },
                        error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);

                        // Check if the error is a validation error
                        if (xhr.status === 422) {
                            // Parse the validation errors from the response JSON
                            var validationErrors = JSON.parse(xhr.responseText);

                            // Display the validation errors to the user

                            for (var field in validationErrors.errors) {
                                var message = validationErrors.errors[field].join(', ') + '\n';
                            }

                            alert(message);
                        } else {
                            // For other types of errors, show a generic error message
                            alert('An error occurred. Please try again later.');
                        }
                    },
                        complete: function() {
                            // This block will be executed after success or error
                            // You can use it for actions that need to be performed in either case
                            console.log('Request completed');
                        }
                    });

                }
            });

        });
</script>
@endsection
