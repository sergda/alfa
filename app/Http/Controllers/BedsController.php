<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\BedsRepository;
use Intervention\Image;

class BedsController extends Controller
{
    protected $worldTcRepository;

    public function __construct(BedsRepository $BedsRepository)
    {
        $this->bedsRepository = $bedsRepository;
        $this->middleware('redac');
    }

    public function index()
    {
        return redirect(route('beds.order', [
            'name' => 'beds.created_at',
            'sens' => 'asc',
        ]));
    }

    public function indexOrder(Request $request)
    {
        $statut = session('statut');

        $items = $this->bedsRepository->getPostsWithOrder(
            config('app.nbrPages.back.beds'),
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
                'view' => view('back.beds.table', compact('statut', 'items'))->render(),
                'links' => e($links->setPath('order')->links()),
            ];
        }

        $links->links();

        $order = new \stdClass;
        $order->name = $request->name;
        $order->sens = 'sort-' . $request->sens;

        return view('back.beds.index', compact('items', 'links', 'order'));
    }
    
    public function create()
    {
        return view('back.beds.create');
    }

    public function store(PostRequest $request)
    {
        $this->bedsRepository->store($request->all(), $request->user()->id);

        return redirect('beds')->with('ok', trans('back/beds.stored'));
    }

    public function edit($id)
    {
        $post = $this->bedsRepository->getByIdWith($id);

        $this->authorize('change', $post);

        return view('back.beds.edit', $this->bedsRepository->getPostWith($post));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->bedsRepository->getById($id);

        $this->authorize('change', $post);

        $this->bedsRepository->update($request->all(), $post);

        return redirect('beds')->with('ok', trans('back/beds.updated'));
    }
    
    public function destroy($id)
    {
        $post = $this->bedsRepository->getById($id);

        $this->authorize('change', $post);

        $this->bedsRepository->destroy($post);

        return redirect('beds')->with('ok', trans('back/beds.destroyed'));
    }
}