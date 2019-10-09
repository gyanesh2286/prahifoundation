<?php

namespace Kjjdion\LaravelAdminPanel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Auth;
use Kjjdion\LaravelAdminPanel\Models\Member;
use App\Media;

class MemberController extends Controller
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
            $objMember = Member::with('user');
            $datatable = datatables($objMember)
                ->editColumn('user', function ($objMember) {
                    return $objMember->user->name;
                })
                ->editColumn('actions', function ($objMember) {
                    return view('lap::members.datatable.actions', compact('objMember'));
                })
                ->rawColumns(['actions']);
            return $datatable->toJson();
        }

        $html = $builder->columns([
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Father/Husband', 'data' => 'father_husband'],
            ['title' => 'Age', 'data' => 'age'],
            ['title' => 'Email', 'data' => 'email'],
            ['title' => 'Current Address', 'data' => 'current_address'],
            ['title' => 'District', 'data' => 'district_name'],
            ['title' => 'State', 'data' => 'state'],
            ['title' => 'Date Of Issue', 'data' => 'date_of_issue'],
            ['title' => 'Gender', 'data' => 'gender'],
            ['title' => 'Aadhaar No', 'data' => 'uid_aadhaar_no'],
            ['title' => 'Family Members', 'data' => 'family_members'],
            ['title' => 'Mobile No', 'data' => 'card_holder_mobile'],
            ['title' => 'Health Card Type No', 'data' => 'health_card_type'],
            ['title' => '', 'data' => 'serial_number'],
            ['title' => 'Old Desease', 'data' => 'old_desease', 'searchable' => false, 'orderable' => false],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->setTableAttribute('id', 'members_datatable');

        return view('lap::members.index', compact('html'));
    }

    public function createForm()
    {
        $objDistrict = app(config('lap.models.district'))->get(['id','dist_code']);

        return view('lap::members.create', compact('objDistrict'));
    }

    public function create()
    {      
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);
        $data=array_merge(request()->input(), [
            'user_id' => Auth::id(),
        ]);

        $objMember = Member::with('media')->create($data);
        $objMember->serial_number   = str_pad($objMember->id, 4, '0', STR_PAD_LEFT);
        $objMember->save();
        if(!$objMember->media->isEmpty()){
            $objMember->media->uploadImage(Auth::user(),$objMember,request()->file('card_image'));
        }else{
            $objMedia = new Media();
            $objMedia->uploadImage(Auth::user(),$objMember,request()->file('card_image'));
        }
        flash(['success', 'User created!']);
        
        if (request()->input('_submit') == 'redirect') {
            return response()->json(['redirect' => session()->pull('url.intended', route('admin.members'))]);
        }else {
            return response()->json(['reload_page' => true]);
        }
    }

    public function read($id)
    {
        $members = Member::with('district','media')->find($id);
        return view('lap::members.read', compact('members'));
    }

    public function updateForm($id)
    {
        $user = Member::findOrFail($id);
        return view('lap::members.update', compact('user'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = app(config('auth.providers.users.model'))->findOrFail($id);
        $user->update(request()->all());
        $user->roles()->sync(request()->input('roles'));

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