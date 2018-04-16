<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DesignRepository;

class DesignFrontController extends Controller
{
    protected $designRepository;
    
    protected $nbrPages;

    public function __construct(DesignRepository $designRepository)
    {
        $this->designRepository = $designRepository;
        $this->nbrPages = config('app.nbrPages.front.all');
    }

    public function index()
    {
        $items = $this->designRepository->getActiveWithUserOrderByDate($this->nbrPages);

        return view('front.common_template.index', compact('items'));
    }

    public function show(Request $request, $slug)
    {
        $user = $request->user();

        return view('front.common_template.show', array_merge($this->findUsRepository->getPostBySlug($slug), compact('user')));
    }
}
