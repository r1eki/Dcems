<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Project;
use App\Service;
use Auth;
use Alert;
use Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Project::all();
        return view('project::index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $service = Service::select('id', 'service_name')->get();
        return view('project::create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'service' => 'required',
            'i_nama' => 'required',
            'image' => 'required'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            $create = Project::create([
                'service_id' => $request->service,
                'project_name' => $request->i_nama,
                'project_slug' => str_slug($request->i_nama),
                'project_img' => ($request->hasFile('image')) ? $this->savePhoto($request->file('image')) : 'images/placeholder.png'
            ]);

            if ($create) {
                # code...
                Alert::success('Project Berhasil Ditambahkan', 'Success');
                return redirect('home/portfolio');
            } else {
                Alert::error('Gagal Menambahkan Project', 'Error');
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
        return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $service = Service::select('id', 'service_name')->get();
        $project = Project::where('id', base64_decode($id))->first();
        return view('project::edit', compact('service', 'project'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'service' => 'required',
            'i_nama' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ]);

        if ($valid->fails()) {
            # code...
            Alert::info('Form Tidak Lengkap', 'Info');
            return redirect()->back();
        } else {
            if ($request->hasFile('image')) {
                # code...
                $create = Project::find(base64_decode($id));
                $this->deletePhoto($create['project_img']);
                $create->project_name = $request->i_nama;
                $create->project_slug = str_slug($request->i_nama);
                $create->project_img = $this->savePhoto($request->file('image'));
                $create->service_id = $request->service;
                $create->save();

                if ($create) {
                    # code...
                    Alert::success('Project Berhasil Diupdate', 'Success');
                    return redirect('home/portfolio');
                } else {
                    Alert::error('Gagal Update Project', 'Error');
                    return redirect()->back();
                }
            } else {
                # code...
                $create = Project::find(base64_decode($id));
                $create->project_name = $request->i_nama;
                $create->project_slug = str_slug($request->i_nama);
                $create->project_img = $create['project_img'];
                $create->service_id = $request->service;
                $create->save();

                if ($create) {
                    # code...
                    Alert::success('Project Berhasil Diupdate', 'Success');
                    return redirect('home/portfolio');
                } else {
                    Alert::error('Gagal Update Project', 'Error');
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
        $del = Project::findOrFail(base64_decode($id));
        $this->deletePhoto($del['project_img']);
        if ($del->delete()) {
            # code...
            Alert::success('Project Berhasil Dihapus', 'Success');
            return redirect()->back();
        } else {
            Alert::error('Gagal Menghapus Project', 'Error');
            return redirect()->back();
        }
    }

    protected function savePhoto($photo)
    {
        $destinationPath = 'images';
        $subdestinationPath = 'project';
        $extension = $photo->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $photo->move($destinationPath. '/' . $subdestinationPath , $fileName);
        $create['project_img'] = $destinationPath. '/' . $subdestinationPath . '/' . $fileName;

        return $create['project_img'];
    }

    protected function deletePhoto($photo)
    {
        File::delete($photo);
        return $photo;
    }
}
