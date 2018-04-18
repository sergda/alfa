<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\DesignRepository;

class DesignController extends Controller
{
    protected $designRepository;

    public function __construct(DesignRepository $designRepository)
    {
        $this->designRepository = $designRepository;
        $this->middleware('redac');
    }

    public function index()
    {
        return redirect(route('design.order', [
            'name' => 'design.created_at',
            'sens' => 'asc',
        ]));
    }

    public function indexOrder(Request $request)
    {
        $statut = session('statut');

        $items = $this->designRepository->getPostsWithOrder(
            config('app.nbrPages.back.design'),
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
                'view' => view('back.design.table', compact('statut', 'items'))->render(),
                'links' => e($links->setPath('order')->links()),
            ];
        }

        $links->links();

        $order = new \stdClass;
        $order->name = $request->name;
        $order->sens = 'sort-' . $request->sens;

        return view('back.design.index', compact('items', 'links', 'order'));
    }
    
    public function create()
    {
        return view('back.design.create');
    }

    public function store(PostRequest $request)
    {
        $this->designRepository->store($request->all(), $request->user()->id);

        return redirect('adm_design')->with('ok', trans('back/design.stored'));
    }

    public function edit($id)
    {
        $post = $this->designRepository->getByIdWith($id);

        $this->authorize('change', $post);

        return view('back.design.edit', $this->designRepository->getPostWith($post));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->designRepository->getById($id);

        $this->authorize('change', $post);

        $this->designRepository->update($request->all(), $post);

        return redirect('adm_design')->with('ok', trans('back/all.updated'));
    }
    
    public function destroy($id)
    {
        $post = $this->designRepository->getById($id);

        $this->authorize('change', $post);

        $this->designRepository->destroy($post);

        return redirect('adm_design')->with('ok', trans('back/all.destroyed'));
    }
}
