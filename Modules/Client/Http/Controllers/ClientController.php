<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Client;
use Auth;
use Alert;
use Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Client::select('client_name', 'id', 'client_slug', 'client_logo')->orderBy('client_name', 'asc')->get();
        return view('client::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('client::create');
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
            'image' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Client::create([
                'client_name' => $request->i_nama,
                'client_slug' => str_slug($request->i_nama),
                'client_logo' => ($request->hasFile('image')) ? $this->savePhoto($request->file('image')) : ''
            ]);

            if ($create) {
                # code...
                Alert::success('Client Berhasil Ditambahkan', 'Success');
                return redirect('home/clients');
            } else {
                Alert::error('Gagal Menambahkan Client', 'Error');
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
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::where('id', base64_decode($id))->first();
        return view('client::edit', compact('client'));
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
            'image' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            if ($request->hasFile('image')) {
                # code...
                $create = Client::find(base64_decode($id));
                $this->deletePhoto($create['client_logo']);
                $create->client_name = $request->i_nama;
                $create->client_slug = str_slug($request->i_nama);
                $create->client_logo = $this->savePhoto($request->file('image'));
                $create->save();

                if ($create) {
                    # code...
                    Alert::success('Client Berhasil Diupdate', 'Success');
                    return redirect()->back();
                } else {
                    Alert::error('Gagal Update Client', 'Error');
                    return redirect()->back();
                }
            } else {
                $create = Client::find(base64_decode($id));
                $create->client_name = $request->i_nama;
                $create->client_slug = str_slug($request->i_nama);
                $create->client_logo = $create['client_logo'];
                $create->save();

                if ($create) {
                    # code...
                    Alert::success('Client Berhasil Diupdate', 'Success');
                    return redirect()->back();
                } else {
                    Alert::error('Gagal Update Client', 'Error');
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $del = Client::findOrFail(base64_decode($id));
        $this->deletePhoto($del['client_logo']);
        if ($del->delete()) {
            # code...
            Alert::success('Client Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Client', 'Error');
            return redirect()->back();
        }
    }

    protected function savePhoto($photo)
    {
        $destinationPath = 'images';
        $subdestinationPath = 'client';
        $extension = $photo->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $photo->move($destinationPath. '/' . $subdestinationPath , $fileName);
        $create['client_logo'] = $destinationPath. '/' . $subdestinationPath . '/' . $fileName;

        return $create['client_logo'];
    }

    protected function deletePhoto($photo)
    {
        File::delete($photo);
        return $photo;
    }
}
