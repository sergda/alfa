<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CurbstonesRepository;

class CurbstonesFrontController extends Controller
{
    protected $repository;
    
    protected $nbrPages;

    public function __construct(CurbstonesRepository $repository)
    {
        $this->repository = $repository;
        $this->nbrPages = config('app.nbrPages.front.all');
    }

    public function index()
    {
        $items = $this->repository->getActiveWithUserOrderByDate(10000000000);

        $title = 'Curbstones';
        $description = 'Curbstones';
        $keywords = 'Curbstones';
        $table = 'curbstones';

        return view('front.common_template.index', compact('items','title','description','keywords','table'));
    }

    public function show(Request $request, $slug)
    {
        $user = $request->user();

        return view('front.common_template.show', array_merge($this->repository->getPostBySlug($slug), compact('user')));
    }
}
