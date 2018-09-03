<?php

namespace Modules\NewsCategory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Category;
use Alert;
use Validator;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Category::all();
        return view('newscategory::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('newscategory::create');
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
            $create = Category::create([
                'category_name' => $request->i_nama,
                'category_slug' => str_slug($request->i_nama)
            ]);

            if ($create) {
                # code...
                Alert::success('Kategori Berhasil Ditambahkan', 'Success');
                return redirect('home/news/category');
            } else {
                Alert::error('Gagal Menambahkan Kategori', 'Error');
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
        return view('newscategory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $cat = Category::where('id', base64_decode($id))->first();
        return view('newscategory::edit', compact('cat'));
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
            $create = Category::find(base64_decode($id));
            $create->category_name = $request->i_nama;
            $create->category_slug = str_slug($request->i_nama);
            $create->save();

            if ($create) {
                # code...
                Alert::success('Kategori Berhasil Diupdate', 'Success');
                return redirect('home/news/category');
            } else {
                Alert::error('Gagal Update Kategori', 'Error');
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
        $del = Category::findOrFail(base64_decode($id));
        if ($del->delete()) {
            # code...
            Alert::success('Kategori Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Kategori', 'Error');
            return redirect()->back();
        }
    }
}
