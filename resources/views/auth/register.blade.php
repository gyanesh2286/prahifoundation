@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Register Here') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf

<div class="row">
    <div class="col-lg-6 col-xs-12 pad">
        <label>Employee/ Associate First Name :</label>
        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Employee/ Associate Last Name :</label>
        <input type="text" name="last_name" id="name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('last_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Father's Name :</label>
        <input type="text" name="father_name" id="father_name" class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('father_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('father_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Mother's Name :</label>
        <input type="text" name="mother_name" id="mother_name" class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('mother_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('mother_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>DOB :</label>
        <input type="text" name="dob" id="dob" placeholder="YYYY-MM-DD" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('dob'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('dob') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Education :</label>
        <input type="text" name="education" id="education" class="form-control{{ $errors->has('education') ? ' is-invalid' : '' }}">
        @if ($errors->has('education'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('education') }}</strong>
            </span>
        @endif  
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Country :</label>
        <input type="text" name="country" id="state" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('country'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
    </div>
     <div class="col-lg-6 col-xs-12 pad">
        <label>State :</label>
        <input type="text" name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('state'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>District :</label>
        <input type="text" name="district" id="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('district'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('district') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Full Address :</label>
        <input type="text" name="full_address" id="full_address" class="form-control{{ $errors->has('full_address') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('full_address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('full_address') }}</strong>
            </span>
        @endif
    </div>
    
   
   
    <div class="col-lg-6 col-xs-12 pad">
        <label>Aadhaar No. :</label>
        <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
        @if ($errors->has('aadhaar_no'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('aadhaar_no') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>E-Mail Id :</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Mobile No. :</label>
        <input type="text" name="mobile_no" id="mobile_no" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('mobile_no'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('mobile_no') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label>Create Login Password :</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label for="password-confirm">{{ __('Confirm Password') }} : </label>
            <input id="password-confirm" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password_confirmation" required>
    </div>
    <div class="col-lg-6 col-xs-12 pad">
        <label for="roles">{{ __('Employee Type') }} : </label>
        <select name="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" required>
            @foreach($objRoles as $key=>$value)
            <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-12 col-xs-12 pad">
    <br>
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
        
    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
