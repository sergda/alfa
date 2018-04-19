<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BedsRepository;

class BedsAjaxController extends Controller
{
    
    protected $bedsRepository;
    
    public function __construct(BedsRepository $bedsRepository)
    {
        $this->bedsRepository = $bedsRepository;

        $this->middleware('admin')->only('update');
        $this->middleware('admin')->only('updateActive');
        $this->middleware('admin')->only('updateIsMenu');
        $this->middleware('ajax');
    }

    public function updateActive(Request $request, $id)
    {
        $post = $this->bedsRepository->getById($id);

        $this->authorize('change', $post);
        
        $this->bedsRepository->updateActive($request->all(), $id);

        return response()->json();
    }

    public function updateIsMenu(Request $request, $id)
    {
        $this->bedsRepository->updateIsMenu($request->all(), $id);

        return response()->json();
    }
}
