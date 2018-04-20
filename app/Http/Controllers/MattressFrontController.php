<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MattressRepository;

class MattressFrontController extends Controller
{
    protected $mattressRepository;
    
    protected $nbrPages;

    public function __construct(MattressRepository $mattressRepository)
    {
        $this->mattressRepository = $mattressRepository;
        $this->nbrPages = config('app.nbrPages.front.all');
    }

    public function index()
    {
        $items = $this->mattressRepository->getActiveWithUserOrderByDate(1000000000);

        $title = 'Mattress';
        $description = 'Mattress';
        $keywords = 'Mattress';
        $table = 'mattress';

        return view('front.common_template.index', compact('items','title','description','keywords','table'));
    }

    public function show(Request $request, $slug)
    {
        $user = $request->user();

        return view('front.common_template.show', array_merge($this->mattressRepository->getPostBySlug($slug), compact('user')));
    }
}
