@extends('lap::layouts.auth')

@section('title', 'District')
@section('child-content')
    <div class="row mb-3">
        <div class="col-md">
            <h2 class="mb-0">@yield('title')</h2>
        </div>
        <div class="col-md-auto mt-2 mt-md-0">
            @can('Update Roles')
                <a href="{{ route('admin.district.update', $objDistrict->id) }}" class="btn btn-primary">Update</a>
            @endcan
            @can('Delete Roles')
                <form method="POST" action="{{ route('admin.district.delete', $objDistrict->id) }}" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" >Delete</button>
                </form>
            @endcan
        </div>
    </div>

    <div class="list-group">
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">ID</div>
                <div class="col-md-8">{{ $objDistrict->id }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">District Code</div>
                <div class="col-md-8">{{ $objDistrict->dist_code }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Head Office Address</div>
                <div class="col-md-8">{{ $objDistrict->head_office_address }}</div>
            </div>
        </div>
        
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Branch Office Address</div>
                <div class="col-md-8">{{ $objDistrict->branch_office_address }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Created At</div>
                <div class="col-md-8">{{ $objDistrict->created_at }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Updated At</div>
                <div class="col-md-8">{{ $objDistrict->updated_at }}</div>
            </div>
        </div>
    </div>
@endsection