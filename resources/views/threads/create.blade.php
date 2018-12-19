@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Create a New Thread</div>

          <div class="panel-body">
            <form action="/threads" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
              </div>

              <div class="form-group">
                <label for="channel_id">Choose a Channel:</label>
                <select class="form-control" name="channel_id" id="channel_id" required>
                  <option value="">Choose One...</option>
                  @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                      {{ $channel->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control"name="body" id="body" rows="8" value="{{ old('body') }}" required></textarea>
              </div>

              <div class="form-group">
                <button class="btn btn-primary" type="submit">Publish</button>
              </div>

              @if (count($errors))
                <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection