<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Service;
use Alert;
use Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Service::all();
        return view('service::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('service::create');
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
            'keterangan' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Service::create([
                'service_name' => $request->i_nama,
                'service_slug' => str_slug($request->i_nama),
                'service_desc' => $request->keterangan,
                'service_icon' => ($request->hasFile('image')) ? $this->savePhoto($request->file('image')) : 'images/placeholder.png'
            ]);

            if ($create) {
                # code...
                Alert::success('Layanan Berhasil Ditambahkan', 'Success');
                return redirect('home/services');
            } else {
                Alert::error('Gagal Menambahkan Layanan', 'Error');
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
        return view('service::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $service = Service::where('id', base64_decode($id))->first();
        return view('service::edit', compact('service'));
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
            'keterangan' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Service::find(base64_decode($id));
            $create->service_name = $request->i_nama;
            $create->service_slug = str_slug($request->i_nama);
            $create->service_desc = $request->keterangan;
            $create->service_icon = ($request->hasFile('image')) ? $this->savePhoto($request->file('image')) : $create['service_icon'];
            $create->save();

            if ($create) {
                # code...
                Alert::success('Layanan Berhasil Diupdate', 'Success');
                return redirect('home/services');
            } else {
                Alert::error('Gagal Update Layanan', 'Error');
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
        $del = Service::findOrFail(base64_decode($id));
        if ($del->delete()) {
            # code...
            Alert::success('Layanan Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Layanan', 'Error');
            return redirect()->back();
        }
    }

    protected function savePhoto($photo)
    {
        $destinationPath = 'images';
        $subdestinationPath = 'service';
        $extension = $photo->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $photo->move($destinationPath. '/' . $subdestinationPath , $fileName);
        $create['service_icon'] = $destinationPath. '/' . $subdestinationPath . '/' . $fileName;

        return $create['service_icon'];
    }

    protected function deletePhoto($photo)
    {
        File::delete($photo);
        return $photo;
    }
}
