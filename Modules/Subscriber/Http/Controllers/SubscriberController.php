<?php

namespace Modules\Subscriber\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Subscriber;
use Alert;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Subscriber::all();
        return view('subscriber::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('subscriber::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('subscriber::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('subscriber::edit');
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
    public function destroy()
    {
    }
}
