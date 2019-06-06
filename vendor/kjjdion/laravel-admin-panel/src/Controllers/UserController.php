<?php

namespace Kjjdion\LaravelAdminPanel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Auth;
use App\Media;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth_admin', 'can:Access Admin Panel']);
        $this->middleware('intend_url')->only(['index', 'read']);
        $this->middleware('can:Create Users')->only(['createForm', 'create']);
        $this->middleware('can:Read Users')->only(['index', 'read']);
        $this->middleware('can:Update Users')->only(['updateForm', 'update', 'passwordForm', 'password']);
        $this->middleware('can:Delete Users')->only('delete');
    }

    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            
            $objAuth    = app(config('auth.providers.users.model'))->with('roleUser');
            $objAuth    =  $objAuth->has('roleUser')->find(Auth::id());
            $users      = app(config('auth.providers.users.model'))::select('users.*','roles.name as rolename','roles.level','roles.id as role_id')->leftJoin('role_user', function($join) {
                                $join->on('users.id', '=', 'role_user.user_id');
                            })->leftJoin('roles', function($join) {
                                $join->on('roles.id', '=', 'role_user.role_id');
                            })->where('roles.level','>',$objAuth->roleUser->role_id);
            $datatable  = datatables($users)
                ->editColumn('roles', function ($user) {
                    return $user->rolename;
                })
                ->editColumn('actions', function ($user) {
                    return view('lap::users.datatable.actions', compact('user'));
                })
                ->rawColumns(['actions']);

            return $datatable->toJson();
        }

        $html = $builder->columns([
            ['title' => 'Emp Id', 'data' => 'emp_id'],
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Email Address', 'data' => 'email'],
            ['title' => 'Timezone', 'data' => 'timezone'],
            ['title' => 'Roles', 'data' => 'roles', 'searchable' => false, 'orderable' => false],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->setTableAttribute('id', 'users_datatable');

        return view('lap::users.index', compact('html'));
    }

    public function createForm()
    {
        $roles = app(config('lap.models.role'))->all()->sortBy('name');

        return view('lap::users.create', compact('roles'));
    }

    public function create()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data = array_merge(request()->all(), [
            'password' => Hash::make(request()->input('password')),
        ]);

        $user = app(config('auth.providers.users.model'))->create($data);
        $user->roles()->sync(request()->input('roles'));

        activity('Created User: ' . $user->name, array_except($data, ['password', 'password_confirmation']), $user);
        flash(['success', 'User created!']);
        
        if (request()->input('_submit') == 'redirect') {
            return response()->json(['redirect' => session()->pull('url.intended', route('admin.users'))]);
        }
        else {
            return response()->json(['reload_page' => true]);
        }
    }

    public function read($id)
    {
//        $user = app(config('auth.providers.users.model'))->findOrFail($id);
        $user      = app(config('auth.providers.users.model'))::with('media')->select('users.*','roles.name as rolename','roles.level','roles.id as role_id')->leftJoin('role_user', function($join) {
                                $join->on('users.id', '=', 'role_user.user_id');
                            })->leftJoin('roles', function($join) {
                                $join->on('roles.id', '=', 'role_user.role_id');
                            })->where('users.id',$id)->first();

        return view('lap::users.read', compact('user'));
    }

    public function updateForm($id)
    {
        $user = app(config('auth.providers.users.model'))->findOrFail($id);
        $roles = app(config('lap.models.role'))->all()->sortBy('name');

        return view('lap::users.update', compact('user', 'roles'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email,' . $id,
        ]);
       
        $user = app(config('auth.providers.users.model'))->with('media')->findOrFail($id);
        $user->update(request()->all());
        $user->roles()->sync(request()->input('roles'));
        
        if($user->media){
            $user->media->uploadImage($user,request()->file('profile_image'));
        }else{
            $objMedia = new Media();
            $objMedia->uploadImage($user,request()->file('profile_image'));
        }
       
        activity('Updated User: ' . $user->name, request()->all(), $user);
        flash(['success', 'User updated!']);
        
        if (request()->input('_submit') == 'redirect') {
            return response()->json(['redirect' => session()->pull('url.intended', route('admin.users'))]);
        }
        else {
            return response()->json(['reload_page' => true]);
        }
    }

    public function passwordForm($id)
    {
        $user = app(config('auth.providers.users.model'))->findOrFail($id);

        return view('lap::users.password', compact('user'));
    }

    public function password($id)
    {
        $this->validate(request(), [
            'new_password' => 'required|confirmed',
        ]);

        $user = app(config('auth.providers.users.model'))->findOrFail($id);
        $user->update(['password' => Hash::make(request()->input('new_password'))]);

        activity('Changed User Password: ' . $user->name, [], $user);
        flash(['success', 'User password changed!']);

        if (request()->input('_submit') == 'redirect') {
            return response()->json(['redirect' => session()->pull('url.intended', route('admin.users'))]);
        }
        else {
            return response()->json(['reload_page' => true]);
        }
    }

    public function delete($id)
    {
        $user = app(config('auth.providers.users.model'))->findOrFail($id);
        $user->delete();

        activity('Deleted User: ' . $user->name, $user->toArray());
        $flash = ['success', 'User deleted!'];

        if (request()->input('_submit') == 'reload_datatables') {
            return response()->json([
                'flash' => $flash,
                'reload_datatables' => true,
            ]);
        }
        else {
            flash($flash);

            return redirect()->route('admin.users');
        }
    }
}