<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Slider;
use Alert;
use Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Slider::all();
        return view('slider::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('slider::create');
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
            'image' => 'required',
            'active' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Slider::create([
                'slider_name' => $request->i_nama,
                'slider_slug' => str_slug($request->i_nama),
                'slider_img' => ($request->hasFile('image')) ? $this->savePhoto($request->file('image')) : 'images/placeholder.png',
                'is_active' => ($request->active == "on") ? 'Y' : 'N'
            ]);

            if ($create) {
                # code...
                Alert::success('Slider Berhasil Dibuat', 'Success');
                return redirect('home/slider');
            } else {
                Alert::error('Gagal Membuat Slider', 'Error');
                return redirect()->back();
            }
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('slider::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $slider = Slider::where('id', base64_decode($id))->first();
        return view('slider::edit', compact('slider'));
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
            'image' => 'required',
            'active' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            if ($request->hasFile('image')) {
                # code...
                $create = Slider::find(base64_decode($id));
                $this->deletePhoto($create['slider_img']);
                $create->slider_img = $this->savePhoto($request->file('image'));
                $create->slider_name = $request->i_nama;
                $create->slider_slug = str_slug($request->i_nama);
                $create->is_active = ($request->active == "on") ? 'Y' : 'N';
                $create->save();

                if ($create) {
                    # code...
                    Alert::success('Slider Berhasil Diupdate', 'Success');
                    return redirect('home/slider');
                } else {
                    Alert::error('Gagal Update Slider', 'Error');
                    return redirect()->back();
                }
            } else {
                $create = Slider::find(base64_decode($id));
                $create->slider_img = $create['slider_img'];
                $create->slider_name = $request->i_nama;
                $create->slider_slug = str_slug($request->i_nama);
                $create->is_active = ($request->active == "on") ? 'Y' : 'N';
                $create->save();

                if ($create) {
                    # code...
                    Alert::success('Slider Berhasil Diupdate', 'Success');
                    return redirect('home/slider');
                } else {
                    Alert::error('Gagal Update Slider', 'Error');
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
        $del = Slider::findOrFail(base64_decode($id));
        $del->deletePhoto($del['slider_img']);
        if ($del->delete()) {
            # code...
            Alert::success('Slider Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Slider', 'Error');
            return redirect()->back();
        }
    }

    protected function savePhoto($photo)
    {
        $destinationPath = 'images';
        $subdestinationPath = 'slider';
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
