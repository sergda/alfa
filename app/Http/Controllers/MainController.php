<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Repositories\MainRepository;

class MainController extends Controller
{
    protected $mainRepository;

    public function __construct(MainRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
        $this->middleware('redac');
    }

    public function index()
    {
        return redirect(route('main.order', [
            'name' => 'main.created_at',
            'sens' => 'asc',
        ]));
    }

    public function indexOrder(Request $request)
    {
        $statut = session('statut');

        $items = $this->mainRepository->getPostsWithOrder(
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
                'view' => view('back.main.table', compact('statut', 'items'))->render(),
                'links' => e($links->setPath('order')->links()),
            ];
        }

        $links->links();

        $order = new \stdClass;
        $order->name = $request->name;
        $order->sens = 'sort-' . $request->sens;

        return view('back.main.index', compact('items', 'links', 'order'));
    }
    
    public function create()
    {
        return view('back.main.create');
    }

    public function store(PostRequest $request)
    {
        $this->mainRepository->store($request->all(), $request->user()->id);

        return redirect('adm_main')->with('ok', trans('back/main.stored'));
    }

    public function edit($id)
    {
        $post = $this->mainRepository->getByIdWith($id);

        $this->authorize('change', $post);

        return view('back.main.edit', $this->mainRepository->getPostWith($post));
    }

    public function update(PostRequest $request, $id)
    {
        $post = $this->mainRepository->getById($id);

        $this->authorize('change', $post);

        $this->mainRepository->update($request->all(), $post);

        return redirect('adm_main')->with('ok', trans('back/main.updated'));
    }
    
    public function destroy($id)
    {
        $post = $this->mainRepository->getById($id);

        $this->authorize('change', $post);

        $this->mainRepository->destroy($post);

        return redirect('adm_main')->with('ok', trans('back/main.destroyed'));
    }
}
