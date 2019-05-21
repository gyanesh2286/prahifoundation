@extends('lap::layouts.auth')

@section('title', 'Register Member ')
@section('child-content')
    <h2>@yield('title')</h2>
<div class="box-body">
    <form method="POST" action="{{ route('admin.users.create') }}" novalidate data-ajax-form>
        @csrf

        <div class="row">
            <div class="col-lg-6 col-xs-12 pad">
                <label>Card Holder's Name :</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Father/ Husband Name :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Age (on 01.01.2018) :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Current Address :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>State :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>District :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Date of Issue :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Gender :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Old Desease If Any :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Aadhaar No. :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>No. of Family Members :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Card Holder's Mobile :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Health Card Type :</label>
                <input type="text" name="father_husband" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Email :</label>
                <input type="email" name="email" id="name" class="form-control">
            </div>

            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
            </div>

            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
            </div>

            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="password_confirmation" class="col-md-2 col-form-label">Confirm Password</label>
                    <div class="col-md-8">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
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
                                    <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" class="custom-control-input" value="{{ $role->id }}">
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
</div>
@endsection