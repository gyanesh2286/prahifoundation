@extends('lap::layouts.auth')

@section('title', 'Update District')
@section('child-content')
    <h2>@yield('title')</h2>

    <form method="POST" action="{{ route('admin.district.update', $objDistrict->id) }}" novalidate data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="list-group">
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">District Code</label>
                    <div class="col-md-8">
                        <input type="text" name="dist_code" id="dist_code" class="form-control" value="{{ $objDistrict->dist_code }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">Head Office Address</label>
                    <div class="col-md-8">
                        <input type="text" name="head_office_address" id="head_office_address" class="form-control" value="{{ $objDistrict->head_office_address }}">
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="form-group row mb-0">
                    <label for="name" class="col-md-2 col-form-label">Branch Office Address</label>
                    <div class="col-md-8">
                        <input type="text" name="branch_office_address" id="branch_office_address" class="form-control" value="{{ $objDistrict->branch_office_address }}">
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