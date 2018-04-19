<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PouffesRepository;

class PouffesAjaxController extends Controller
{
    
    protected $repository;
    
    public function __construct(PouffesRepository $repository)
    {
        $this->repository = $repository;

        $this->middleware('admin')->only('update');
        $this->middleware('admin')->only('updateActive');
        $this->middleware('admin')->only('updateIsMenu');
        $this->middleware('admin')->only('updateIsMain');
        $this->middleware('ajax');
    }

    public function updateActive(Request $request, $id)
    {
        $post = $this->repository->getById($id);

        $this->authorize('change', $post);
        
        $this->repository->updateActive($request->all(), $id);

        return response()->json();
    }

    public function updateIsMenu(Request $request, $id)
    {
        $this->repository->updateIsMenu($request->all(), $id);

        return response()->json();
    }

    public function updateIsMain(Request $request, $id)
    {
        $this->repository->updateIsMain($request->all(), $id);

        return response()->json();
    }
}
