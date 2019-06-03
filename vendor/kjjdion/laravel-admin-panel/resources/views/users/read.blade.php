@extends('lap::layouts.auth')

@section('title', 'User')

@section('child-content')
    <div class="row mb-3">
        <div class="col-md">
            <h2 class="mb-0">@yield('title')</h2>
        </div>
        <div class="col-md-auto mt-2 mt-md-0">
            @can('Update Users')
                <a href="{{ route('admin.users.update', $user->id) }}" class="btn btn-primary">Update</a>
                <a href="{{ route('admin.users.password', $user->id) }}" class="btn btn-primary">Change Password</a>
            @endcan
            @can('Delete Users')
                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" data-confirm>Delete</button>
                </form>
            @endcan
        </div>
    </div>
    <div class="col-md-12">
        <div class="id-card-holder">
            <div class="id-card">
                            <table width="400">
                                    <tr class="text-left">
                                            <td width="100%"  style="padding-left: 80px;"><img src="{{asset('/')}}img/card_logo.jpg" width="220" height="80"></td>
                                    </tr>
                                <tr class="text-left">
                                    <td  style="padding:0px 250px 415px 10px"><img src="{{asset('/')}}images/logovoucher.png" width="80px" height="70px"/></td>
                                </tr>
                                <tr class="text-left">
                                        <td  style="padding-left: 20px;padding-top:0px;">
                                        
                                                <p class="text-left" style="font-size: 11px;">
                                                    THANK YOU FOR <br>
                                                    <span>Emp. code : </span><span>Emp. code: </span>
                                                </p>
                                                <p class="text-left" style="font-size: 11px;" > 
                                                        <span>Emp. code : </span><span>Emp. code: </span><br>
                                                        <span>Date of issue : </span><span>Emp. code: </span><br>
                                                        <span>Contact No : </span><span>Emp. code: </span><br>
                                                        <span>Emp. code : </span><span>Emp. code: </span> 
                                                </p>
                                                <p class="text-left"> 
                                                        <span>Emp. code :</span><span>visit the web site</span> 
                                                    </p>
                                                
                                            </td>
                                </tr>
                                
                            </table>
    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">ID</div>
        <div class="col-md-6">{{ $user->id }}</div>
    </div>
    <div class="list-group">
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-6">ID</div>
                <div class="col-md-6">{{ $user->id }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Name</div>
                <div class="col-md-8">{{ $user->name }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Email</div>
                <div class="col-md-8">{{ $user->email }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Timezone</div>
                <div class="col-md-8">
                    {{ $user->timezone }}<br>
                    <small class="text-secondary">Automatically set when the user logs in.</small>
                </div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Roles</div>
                <div class="col-md-8">
                    {{ $user->roles->sortBy('name')->implode('name', ', ') }}
                </div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Created At</div>
                <div class="col-md-8">{{ $user->created_at }}</div>
            </div>
        </div>

        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">Updated At</div>
                <div class="col-md-8">{{ $user->updated_at }}</div>
            </div>
        </div>
    </div>
@endsection
<style>

.id-card-holder {
    width: 400px;
    padding: 2px;
    margin: 0 auto;
    background-color: #1f1f1f;
    border-radius: 5px;
    position: relative;
    height: 200px;
}

.id-card {
    background-color: #fff;
    padding: 1px;
    border-radius: 1px;
    text-align: center;
    box-shadow: 0 0 1.5px 0px #b9b9b9;
}
.id-card img {
    margin: 0 auto;
}
.header img {
    width: 100px;
    height: 30px;
    margin-top: 5px;
}
.photo img {
    width: 80px;
    margin-top: 5px;
    float: left;
}
.username{
    width: 200px;
    margin-top: 5px;
    float: left;
}
.empId{
    width: 150px;
    margin-top: 5px;
    float: right;
}
h2 {
    font-size: 15px;
    margin: 5px 0;
}
h3 {
    font-size: 12px;
    margin: 2.5px 0;
    font-weight: 300;
}
p {
    font-size: 14px;
}
</style>