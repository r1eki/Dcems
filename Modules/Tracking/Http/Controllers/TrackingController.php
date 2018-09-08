<?php

namespace Modules\Tracking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('tracking::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $tracking_cat = Tracking::All();

        return view('tracking::create', compact('tracking_cat'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'tracking_id' => 'required',
            'fullname'    => 'required',
            'location'    => 'required',
            'no_resi'     => 'required'
        ]};

        Post::create[{
            'tracking_id'   => request('tracking_id'),
            'fullname'      => request('fullname'),
            'location'      => request('location'),
            'no_resi'       => request('no_resi'),
            'tracking_cat'  => request('tracking_cat')
        }];

        return->redirect()->('tracking.index')->withInfo('Data Tracking Berhasil Ditambahkan');

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(tracking $tracking)
    {
        return view('tracking::show', compact('tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(tracking $tracking)
    {
        return view('tracking::edit', compact('tracking','category'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $request->update([
        'fullname'      => request('fullname'),
        'location'      => request('location'),
        '$timestaps'    => request('$timestaps')
        )];
    
        return->redirect()->route('tracking.index')->withInfo('Data Tracking berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
        $tracking->delete();

        return->redirect()->route('tracking.index')->withDanger('Data Tracking berhasil di hapus');
    }
}
