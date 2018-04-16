<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MainRepository;

class MainAjaxController extends Controller
{

    protected $mainRepository;
    
    public function __construct(MainRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;

        $this->middleware('admin')->only('update');
        $this->middleware('admin')->only('updateActive');
        $this->middleware('admin')->only('updateIsMenu');
        $this->middleware('ajax');
    }

    public function updateActive(Request $request, $id)
    {
        $post = $this->mainRepository->getById($id);

        $this->authorize('change', $post);
        
        $this->mainRepository->updateActive($request->all(), $id);

        return response()->json();
    }
    
    public function updateIsMenu(Request $request, $id)
    {
        $this->mainRepository->updateIsMenu($request->all(), $id);

        return response()->json();
    }
}
