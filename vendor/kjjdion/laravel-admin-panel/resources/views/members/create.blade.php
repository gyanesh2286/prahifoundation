@extends('lap::layouts.auth')

@section('title', 'Register Heath Card ')
@section('child-content')
    <h2>@yield('title')</h2>
<div class="box-body">
    <form method="POST" action="{{ route('admin.members.create') }}" enctype="multipart/form-data" novalidate data-ajax-form>
        @csrf

        <div class="row">
            <div class="col-lg-6 col-xs-12 pad">
                <label>Card Holder's Name :</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Father/ Husband Name :</label>
                <input type="text" name="father_husband" id="father_husband" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Age (on 01.01.2018) :</label>
                <input type="text" name="age" id="age" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Current Address :</label>
                <input type="text" name="current_address" id="current_address" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>State :</label>
                <input type="text" name="state" id="state" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>District Name:</label>
                <input type="text" name="district_name" id="district" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Date of Issue :</label>
                <input type="text" name="date_of_issue" id="date_of_issue" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Gender :</label>
                <select name="gender" id="gender" class="form-control" required="">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Old Disease If Any :</label>
                <input type="text" name="old_desease" id="old_desease" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Aadhaar No. :</label>
                <input type="text" name="uid_aadhaar_no" id="uid_aadhaar_no" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>No. of Family Members :</label>
                <input type="text" name="family_members" id="family_members" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Card Holder's Mobile :</label>
                <input type="text" name="card_holder_mobile" id="card_holder_mobile" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Health Card Type :</label>
                <select name="health_card_type" id="health_card_type" class="form-control" required="">
                    <option value="">- Select -</option>
                    <option value="Individual">Individual (Rs.50/-)</option>
                    <option value="Family">Family (Rs.100/-)</option>
                </select>
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Email :</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>District :</label>
                <select name="district_id" id="health_card_type" class="form-control" required="">
                    <option value="">- Select District  -</option>
                    @foreach($objDistrict as $districts)
                        <option value="{{$districts->id}}">{{$districts->dist_code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-xs-12 pad">
                <label>Profile Photo :</label>
                <input type="file" name="card_image" id="profile_image" class="form-control">
            </div>
            <div class="col-lg-6 col-xs-12 pad"></div>
            <div class="col-lg-6 col-xs-12 pad">
            <div class="text-left text-md-right pb-1" >
            <br>
                <button type="submit" name="_submit" class="btn btn-primary mb-2" value="reload_page">Save</button>
                <button type="submit" name="_submit" class="btn btn-primary mb-2" value="redirect">Save &amp; Go Back</button>
            </div>
            </div>
        </div>
    </form>
</div>
@endsection