<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Repositories\BedsRepository;

class BedsFrontController extends Controller
{
    protected $bedsRepository;
    
    protected $nbrPages;

    public function __construct(BedsRepository $bedsRepository)
    {
        $this->bedsRepository = $bedsRepository;
        $this->nbrPages = config('app.nbrPages.front.beds');
    }

    public function index()
    {
        $items = $this->bedsRepository->getActiveWithUserOrderByDate(1000000000);
        $title = 'Beds';
        $description = 'Beds';
        $keywords = 'Beds';
        $table = 'beds';

        return view('front.common_template.index', compact('items','title','description','keywords','table'));
    }

    public function show(Request $request, $slug)
    {
        $user = $request->user();

        return view('front.common_template.show', array_merge($this->bedsRepository->getPostBySlug($slug), compact('user')));
    }
}
