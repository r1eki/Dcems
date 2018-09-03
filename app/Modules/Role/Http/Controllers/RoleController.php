<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Role;
use Alert;
use Validator;
use Cache;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Role::all();
        return view('role::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('role::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'i_nama' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Role::create([
                'name' => $request->i_nama
            ]);

            if ($create) {
                # code...
                Alert::success('Role Berhasil Dibuat', 'Success');
                return redirect('home/roles');
            } else {
                Alert::error('Gagal Membuat Role Baru', 'Error');
                return redirect()->back();
            }
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        return view('role::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::where('id', base64_decode($id))->first();
        return view('role::edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'i_nama' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Role::find(base64_decode($id));
            $create->name = $request->i_nama;
            $create->save();

            if ($create) {
                # code...
                Alert::success('Role Berhasil Diupdate', 'Success');
                return redirect('home/roles');
            } else {
                Alert::error('Gagal Update Role', 'Error');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $del = Role::findOrFail(base64_decode($id));
        if ($del->delete()) {
            # code...
            Alert::success('Role Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Role', 'Error');
            return redirect()->back();
        }
    }
}
