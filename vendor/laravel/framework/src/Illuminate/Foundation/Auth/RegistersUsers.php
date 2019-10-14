<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Kjjdion\LaravelAdminPanel\Models\Role;
use Kjjdion\LaravelAdminPanel\Models\RoleUser;
use Kjjdion\LaravelAdminPanel\Models\Permission;
use Kjjdion\LaravelAdminPanel\Models\PermissionUser;
use Kjjdion\LaravelAdminPanel\Models\States;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {   
        $objRoles       = Role::where('name',"<>","Admin")->get();
        $arrAllStates   = States::all();
        return view('auth.register',compact('objRoles','arrAllStates'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        if($user){
            $objRoleUsers           = new RoleUser();
            $objRoleUsers->user_id  = $user->id;
            $objRoleUsers->role_id  = $request->input('role');
            $objRoleUsers->save();
            $user->emp_id           = "EMP-".str_pad($user->id, 6, '0', STR_PAD_LEFT);
            $user->save();
            $objPermission          = Permission::get();
            $objPermission->each(function($obj)use($user){
                PermissionUser::create(['permission_id'=>$obj->id,'user_id'=>$user->id]);
            });
        }
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
