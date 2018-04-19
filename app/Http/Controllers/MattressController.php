<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\MattressRepository;
use Intervention\Image;

class MattressController extends Controller
{
    protected $mattressRepository;

    public function __construct(MattressRepository $mattressRepository)
    {
        $this->mattressRepository = $mattressRepository;
        $this->middleware('redac');
    }

    public function index()
    {
        return redirect(route('mattress.order', [
            'name' => 'mattress.created_at',
            'sens' => 'asc',
        ]));
    }

    public function indexOrder(Request $request)
    {
        $statut = session('statut');

        $items = $this->mattressRepository->getPostsWithOrder(
            config('app.nbrPages.back.all'),
            $statut == 'admin' ? null : $request->user()->id,
            $request->name,
            $request->sens
        );

        $links = $items->appends([
            'name' => $request->name,
            'sens' => $request->sens
        ]);

        if ($request->ajax()) {
            return [
                'view' => view('back.mattress.table', compact('statut', 'items'))->render(),
                'links' => e($links->setPath('order')->links()),
            ];
        }

        $links->links();

        $order = new \stdClass;
        $order->name = $request->name;
        $order->sens = 'sort-' . $request->sens;

        return view('back.mattress.index', compact('items', 'links', 'order'));
    }
    
    public function create()
    {
        return view('back.mattress.create');
    }

    public function store(PostRequest $request)
    {
        $this->mattressRepository->store($request->all(), $request->user()->id);

        return redirect('adm_mattress')->with('ok', trans('back/mattress.stored'));
    }

    public function edit($id)
    {
        $post = $this->mattressRepository->getByIdWith($id);

        $this->authorize('change', $post);

        return view('back.mattress.edit', $this->mattressRepository->getPostWith($post));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->mattressRepository->getById($id);

        $this->authorize('change', $post);

        $this->mattressRepository->update($request->all(), $post);

        return redirect('adm_mattress')->with('ok', trans('back/mattress.updated'));
    }
    
    public function destroy($id)
    {
        $post = $this->mattressRepository->getById($id);

        $this->authorize('change', $post);

        $this->mattressRepository->destroy($post);

        return redirect('adm_mattress')->with('ok', trans('back/mattress.destroyed'));
    }
}