@extends('back.template')

@section('main')

  @include('back.partials.entete', ['title' => trans('back/admin.testblock-report'), 'icon' => 'user', 'fil' => link_to('user/sort', trans('back/users.Users')) . ' / ' . trans('back/admin.testblock-report')])

  <div class="row col-lg-12">
    <div class="table-responsive">
      <table class="table">
        <thead>
            <tr>
                <th>{{ trans('back/users.name') }}</th>
                <th>{{ trans('back/users.latest-blog-title') }}</th>
                <th>{{ trans('back/users.testblocks-count') }}</th>
                <th>{{ trans('back/users.latest-blog-date') }}</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($authors as $author)
            <tr>
                <td class="text-primary">
                    <strong>{{ $author->username }}</strong>
                </td>
                <td>{{ $author->testblocks->first()->title }}</td>
                <td>{{ $author->testblocks_count }}</td>
                <td>{{ $author->testblocks->first()->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
