<?php

namespace Modules\News\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\News;
use App\Category;
use Auth;
use Alert;
use Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = News::all();
        return view('news::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $cat = Category::all();
        return view('news::create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,jpeg,png'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('news::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('news::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $del = News::findOrFail(base64_decode($id));
        $this->deletePhoto($del['news_image']);
        if ($del->delete()) {
            # code...
            Alert::success('Berita Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Berita', 'Error');
            return redirect()->back();
        }
    }
}
