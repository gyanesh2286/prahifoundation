<?php

namespace Kjjdion\LaravelAdminPanel\Controllers;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Auth;
use Kjjdion\LaravelAdminPanel\Models\District;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth_admin', 'can:Access Admin Panel']);
        $this->middleware('intend_url')->only(['index', 'read']);
        $this->middleware('can:Create Roles')->only(['createForm', 'create']);
        $this->middleware('can:Read Roles')->only(['index', 'read']);
        $this->middleware('can:Update Roles')->only(['updateForm', 'update']);
        $this->middleware(['can:Delete Roles', 'not_admin_role'])->only('delete');
    }

    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $roles = app(config('lap.models.district'))->get();
            
            $datatable = datatables($roles)
                
                ->editColumn('actions', function ($role) {
                    return view('lap::district.datatable.actions', compact('role'));
                })
                ->rawColumns(['actions']);

            return $datatable->toJson();
        }

        $html = $builder->columns([
            ['title' => 'Name', 'data' => 'dist_code'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->setTableAttribute('id', 'roles_datatable');

        return view('lap::district.index', compact('html'));
    }

    public function createForm()
    {
        $objDistrict = app(config('lap.models.district'))->all()->groupBy('id');

        return view('lap::district.create', compact('objDistrict'));
    }

    public function create()
    {
        $this->validate(request(), [
            'dist_code' => 'required|unique:district',
        ]);

        $data=array_merge(request()->all(), [
            'user_id' => Auth::id(),
        ]);

        District::create($data);
        
        flash(['success', 'district created!']);

        if (request()->input('_submit') == 'redirect') {
            return response()->json(['redirect' => session()->pull('url.intended', route('admin.district'))]);
        }
        else {
            return response()->json(['reload_page' => true]);
        }
    }

    public function read($id)
    {
        $role = app(config('lap.models.role'))->findOrFail($id);

        return view('lap::roles.read', compact('role'));
    }

    public function updateForm($id)
    {
        $role = app(config('lap.models.role'))->findOrFail($id);
        $group_permissions = app(config('lap.models.permission'))->all()->groupBy('group');

        return view('lap::roles.update', compact('role', 'group_permissions'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $role = app(config('lap.models.role'))->findOrFail($id);
        $role->update(request()->all());
        $role->permissions()->sync(request()->input('permissions'));

        activity('Updated Role: ' . $role->name, request()->all(), $role);
        flash(['success', 'Role updated!']);

        if (request()->input('_submit') == 'redirect') {
            return response()->json(['redirect' => session()->pull('url.intended', route('admin.roles'))]);
        }
        else {
            return response()->json(['reload_page' => true]);
        }
    }

    public function delete($id)
    {
        $role = app(config('lap.models.role'))->findOrFail($id);
        $role->delete();

        activity('Deleted Role: ' . $role->name, $role->toArray());
        $flash = ['success', 'Role deleted!'];

        if (request()->input('_submit') == 'reload_datatables') {
            return response()->json([
                'flash' => $flash,
                'reload_datatables' => true,
            ]);
        }
        else {
            flash($flash);

            return redirect()->route('admin.roles');
        }
    }
}