<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DesignRepository;

class DesignAjaxController extends Controller
{

    protected $designRepository;
    
    public function __construct(DesignRepository $designRepository)
    {
        $this->designRepository = $designRepository;

        $this->middleware('admin')->only('update');
        $this->middleware('admin')->only('updateActive');
        $this->middleware('admin')->only('updateIsMenu');
        $this->middleware('ajax');
    }

    public function updateActive(Request $request, $id)
    {
        $post = $this->designRepository->getById($id);

        $this->authorize('change', $post);
        
        $this->designRepository->updateActive($request->all(), $id);

        return response()->json();
    }

    public function updateIsMenu(Request $request, $id)
    {
        $this->designRepository->updateIsMenu($request->all(), $id);

        return response()->json();
    }
}
