@extends('lap::layouts.auth')

@section('title', 'Add Hospital')
@section('child-content')
    <h2>@yield('title')</h2>

    <form method="POST" action="{{ route('admin.hospital.create') }}" novalidate data-ajax-form>
        @csrf

        <div class="list-group">
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">State Name</label>
                    <div class="col-md-8">
                        <select id="state" name="state" class="form-control">
                            <option>--Selecte State--</option>
                            @foreach($objAllStates as $states)
                            <option value="{{$states->id}}">{{$states->name}}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">District Name</label>
                    <div class="col-md-8">
                        <select id="district" name="district" class="form-control">
                            <option>--Selecte District--</option>
                            <option>medium</option>
                            <option>large</option>
                        </select> 
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">Hospital Name</label>
                    <div class="col-md-8">
                        <input type="text" name="branch_office_address" id="branch_office_address" class="form-control">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">Hospital Address line 1</label>
                    <div class="col-md-8">
                        <input type="text" name="hospital_address_one" id="hospital_address_one" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">Hospital Address line 2</label>
                    <div class="col-md-8">
                        <input type="text" name="hospital_address_two" id="hospital_address_two" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">District Code</label>
                    <div class="col-md-8">
                        <input type="text" name="district_code" id="district_code" class="form-control">
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