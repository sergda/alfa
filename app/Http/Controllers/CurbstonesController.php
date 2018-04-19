<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\CurbstonesRepository;
use Intervention\Image;

class CurbstonesController extends Controller
{
    protected $repository;

    public function __construct(CurbstonesRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('redac');
    }

    public function index()
    {
        return redirect(route('curbstones.order', [
            'name' => 'curbstones.created_at',
            'sens' => 'asc',
        ]));
    }

    public function indexOrder(Request $request)
    {
        $statut = session('statut');

        $items = $this->repository->getPostsWithOrder(
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
                'view' => view('back.curbstones.table', compact('statut', 'items'))->render(),
                'links' => e($links->setPath('order')->links()),
            ];
        }

        $links->links();

        $order = new \stdClass;
        $order->name = $request->name;
        $order->sens = 'sort-' . $request->sens;

        return view('back.curbstones.index', compact('items', 'links', 'order'));
    }
    
    public function create()
    {
        return view('back.curbstones.create');
    }

    public function store(PostRequest $request)
    {
        $this->repository->store($request->all(), $request->user()->id);

        return redirect('adm_curbstones')->with('ok', trans('back/curbstones.stored'));
    }

    public function edit($id)
    {
        $post = $this->repository->getByIdWith($id);

        $this->authorize('change', $post);

        return view('back.curbstones.edit', $this->repository->getPostWith($post));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->repository->getById($id);

        $this->authorize('change', $post);

        $this->repository->update($request->all(), $post);

        return redirect('adm_curbstones')->with('ok', trans('back/curbstones.updated'));
    }
    
    public function destroy($id)
    {
        $post = $this->repository->getById($id);

        $this->authorize('change', $post);

        $this->repository->destroy($post);

        return redirect('adm_curbstones')->with('ok', trans('back/curbstones.destroyed'));
    }
}