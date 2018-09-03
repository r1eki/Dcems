<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\User;
use Ramsey\Uuid\Uuid;
use Alert;
use Validator;
use Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = User::all();

        return view('user::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'i_nama' => 'required',
            'i_username' => 'required',
            'i_email' => 'required',
            'i_password' => 'required',
            'gender' => 'required',
            'i_phone' => 'required',
            'i_date' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = User::create([
                'uuid' => Uuid::uuid4()->getHex(),
                'name' => $request->i_nama,
                'email' => $request->i_email,
                'password' => bcrypt($request->i_password),
                'role_id' => 1,
                'username' => $request->i_username,
                'gender' => $request->gender,
                'phone' => $request->i_phone,
                'birthdate' => $request->i_date
            ]);

            if ($create) {
                # code...
                Alert::success('User Berhasil Dibuat', 'Success');
                return redirect('home/user');
            } else {
                Alert::error('Gagal Menambahkan User', 'Error');
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
        $data = Cache::remember('users', 22*60, function() {
            return User::where('id', base64_decode($id))->get();
        });

        return view('user::show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data = User::where('id', base64_decode($id))->first();
        return view('user::edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'i_nama' => 'required',
            'i_username' => 'required',
            'i_email' => 'required',
            'i_password' => 'required',
            'gender' => 'required',
            'i_phone' => 'required',
            'i_date' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = User::find(base64_decode($id));
            $create->name = $request->i_nama;
            $create->email = $request->i_email;
            $create->username = $request->i_username;
            $create->password = $request->i_password;
            $create->gender = $request->gender;
            $create->phone = $request->i_phone;
            $create->birthdate = $request->i_date;
            $create->save();

            if ($create) {
                # code...
                Alert::success('User Berhasil Dibuat', 'Success');
                return redirect('home/user');
            } else {
                Alert::error('Gagal Menambahkan User', 'Error');
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
        $del = User::findOrFail(base64_decode($id));
        if ($del->delete()) {
            # code...
            Alert::success('User Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus User', 'Error');
            return redirect()->back();
        }
    }
}
