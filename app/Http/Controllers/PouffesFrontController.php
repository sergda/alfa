<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PouffesRepository;

class PouffesFrontController extends Controller
{
    protected $repository;
    
    protected $nbrPages;

    public function __construct(PouffesRepository $repository)
    {
        $this->repository = $repository;
        $this->nbrPages = config('app.nbrPages.front.all');
    }

    public function index()
    {
        $items = $this->repository->getActiveWithUserOrderByDate($this->nbrPages);

        return view('front.common_template.index', compact('items'));
    }

    public function show(Request $request, $slug)
    {
        $user = $request->user();

        return view('front.common_template.show', array_merge($this->repository->getPostBySlug($slug), compact('user')));
    }
}
