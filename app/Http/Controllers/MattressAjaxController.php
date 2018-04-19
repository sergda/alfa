<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MattressRepository;

class MattressAjaxController extends Controller
{
    
    protected $mattressRepository;
    
    public function __construct(MattressRepository $repository)
    {
        $this->mattressRepository = $repository;

        $this->middleware('admin')->only('update');
        $this->middleware('admin')->only('updateActive');
        $this->middleware('admin')->only('updateIsMenu');
        $this->middleware('admin')->only('updateIsMain');
        $this->middleware('ajax');
    }

    public function updateActive(Request $request, $id)
    {
        $post = $this->mattressRepository->getById($id);

        $this->authorize('change', $post);
        
        $this->mattressRepository->updateActive($request->all(), $id);

        return response()->json();
    }

    public function updateIsMenu(Request $request, $id)
    {
        $this->mattressRepository->updateIsMenu($request->all(), $id);

        return response()->json();
    }

    public function updateIsMain(Request $request, $id)
    {
        $this->mattressRepository->updateIsMain($request->all(), $id);

        return response()->json();
    }
}
