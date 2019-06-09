@extends('lap::layouts.auth')

@section('title', 'Update User')
@section('child-content')
    <h2>@yield('title')</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" novalidate data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="list-group">
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
            </div>

            {{-- <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
            </div> --}}
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Father Name</label>
                    <div class="col-md-8">
                        <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $user->father_name }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Mother Name</label>
                    <div class="col-md-8">
                        <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ $user->mother_name }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Education</label>
                    <div class="col-md-8">
                        <input type="text" name="education" id="education" class="form-control" value="{{ $user->education }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Full Address</label>
                    <div class="col-md-8">
                        <input type="text" name="full_address" id="full_address" class="form-control" value="{{ $user->full_address }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Aadhaar No</label>
                    <div class="col-md-8">
                        <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control" value="{{ $user->aadhaar_no }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">District</label>
                    <div class="col-md-8">
                        <input type="text" name="district" id="district" class="form-control" value="{{ $user->district }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">State</label>
                    <div class="col-md-8">
                        <input type="text" name="state" id="state" class="form-control" value="{{ $user->state }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">DOB</label>
                    <div class="col-md-8">
                        <input type="text" name="dob" id="dob" class="form-control" value="{{ $user->dob }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Mobile No</label>
                    <div class="col-md-8">
                        <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{ $user->mobile_no }}">
                    </div>
                </div>

            </div><div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Blood Group</label>
                    <div class="col-md-8">
                        <input type="text" name="blood_group" id="blood_group" class="form-control" value="{{ $user->blood_group }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Profile Photo</label>
                    <div class="col-md-8">
                        <input type="file" name="profile_image" id="profile_image" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label class="col-md-2 col-form-label">Roles</label>
                    <div class="col-md-8">
                        <div class="form-control-plaintext">
                            @foreach ($roles as $role)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" class="custom-control-input" value="{{ $role->id }}"
                                            {{ $user->roles->contains('id', $role->id) ? ' checked' : '' }}>
                                    <label for="role_{{ $role->id }}" class="custom-control-label">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-group-item bg-light text-left text-md-right pb-1">
                <button type="submit" name="_submit" class="btn btn-primary mb-2" value="reload_page">Save</button>
                <button type="submit" name="_submit" class="btn btn-primary mb-2" value="redirect">Save &amp; Go Back</button>
            </div>
        </div>
    </form>
@endsection