<?php

namespace Modules\Testimoni\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Testimoni;
use Auth;
use Alert;
use Validator;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Testimoni::select('testi_id', 'testi_name', 'testimoni', 'office')->get();
        return view('testimoni::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('testimoni::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'testi_name' => 'required',
            'testimoni' => 'required',
            'office' => 'required'
        ]);

        if ($valid->fails()) {
            Alert::info('Form Tidak lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Testimoni::create([
                'testi_name' => $request->testi_name,
                'testimoni' => $request->testimoni,
                'office' => $request->office
            ]);

            if ($create) {
                Alert::success('Testimoni berhasil ditambahkan', 'Info');
                return redirect('home/testimoni');
            } else {
                Alert::error('Gagal Menambahkan Testimoni', 'Error');
                return redirect()->back();
            }
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($testi_id)
    {
        return view('testimoni::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($testi_id)
    {
        $testimoni = Testimoni::where('testi_id', base64_decode($testi_id))->first();
        return view('testimoni::edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $testi_id)
    {
        $create = Testimoni::find(base64_decode($testi_id));
        $create->testi_name = $request->testi_name;
        $create->testimoni = $request->testimoni;
        $create->office = $request->office;
        $create->save();

        if($create) {
            Alert::success('Testimoni berhasil diupdate', 'Success');
            return redirect('home/testimoni');
        } else {
            Alert::error('Gagal Update Client', 'Error');
            return redirect()->bback();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($testi_id)
    {
        $del = Testimoni::findOrFail(base64_decode($testi_id));
        if($del->delete()) {
            Alert::success('Testimoni berhasil dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Testimoni', 'Error');
            return redirect()->back();
        }
    }
}
