@foreach ($items as $post)
    <tr {!! session('statut') == 'admin'? 'class="warning"' : '' !!}>
        <td class="text-primary"><strong>{{ $post->title }}</strong></td>
        <td>{{ $post->sort }}</td>
        <td>{{ $post->created_at }}</td> 
        <td>{!! Form::checkbox('active', $post->id, $post->active) !!}</td>
        <td>{!! Form::checkbox('is_main', $post->id, $post->is_main) !!}</td>
        <td>{!! link_to('mattress/' . $post->slug, trans('back/all.see'), ['class' => 'btn btn-success btn-block btn']) !!}</td>
        <td>{!! link_to_route('adm_mattress.edit', trans('back/all.edit'), [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
        <td>
            {!! Form::open(['method' => 'DELETE', 'route' => ['adm_mattress.destroy', $post->id]]) !!}
                {!! Form::destroyBootstrap(trans('back/all.destroy'), trans('back/all.destroy-warning')) !!}
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach