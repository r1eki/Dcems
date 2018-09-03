<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;
use App\News;
use App\Testimoni;
use Alert;

class PageController extends Controller
{
    //
    public function index()
    {
        $news = News::take(9)->get();
        $project = Project::take(3)->get();
        $client = Client::take(8)->get();
        $testimoni = Testimoni::take(3)->get();
    	return view('homepage.main', compact('project', 'client', 'news', 'testimoni'));
    }

    public function getTentang()
    {
    	return view('homepage.about');
    }

    public function getKontak()
    {
    	return view('homepage.kontak');
    }

    public function getClient()
    {
        $client = Client::all();
        return view('homepage.client', compact('client'));
    }

    public function getGallery()
    {
        $gallery = Project::paginate(10);
        return view('homepage.project', compact('gallery'));
    }
}