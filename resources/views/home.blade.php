@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @include('inc.messages')

                    <button type="button" 
                            class="btn btn-primary btn-lg" 
                            data-toggle="modal" 
                            data-target="#addModal" 
                            name="button">Add Bookmark</button>
                    <hr>
                    <h3>My Bookmarks</h3>
                    <ul class="list-group">
                    @if(isset($bookmarks))
                      @foreach($bookmarks as $bookmark)
                      <li class="list-group-item clearfix">
                        <a href="{{ $bookmark->url }}" target="_blank" style="position:absolute; top:30%">
                          {{ $bookmark->name }}
                          <span class="label label-default">{{ $bookmark->description }}</span>
                        </a>
                        <span class="pull-right button-group">
                          <button data-id="{{ $bookmark->id }}" type="button" class="delete-bookmark btn btn-danger" name="button">
                            <span class="glyphicon glyphicon-remove"></span>Delete</button>
                        </span>
                      </li>
                      @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add bookmark </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('bookmarks.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Bookmark Name </label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Bookmark URL</label>
            <input type="text" class="form-control" name="url">
      </div>
      <div class="form-group">
        <label>Website Description</label>
        <textarea class="form-control" name="description"></textarea>
      </div>
      <input type="submit" name="submit" value="Submit" class="btn btn-success">
    </div>
  </div>
</div>
@endsection
