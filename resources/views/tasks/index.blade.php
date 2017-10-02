@extends("layouts.app")

@section("content")
  <div class="panel panel-default">
    <div class="panel-body">
      @include("common.errors")
      <form class="form-horizontal" action="{{ url("task") }}" method="post">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Task</label>
          <div class="col-sm-6">
            <input type="text" name="name" id="name" class="form-control" value="">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn bt-default">Add task</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>

  @if($tasks->count())
    <div class="panel panel-defaul">
        <div class="panel-heading">
          Current Tasks
        </div>
        <div class="panel-body">
          <table class="table table-striped">
            <thead>
              <th>Tasks</th>
              <th>&nbsp;</th>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
                <tr>
                  <td>{{ $task->name }}</td>
                  <td>
                    <form class="" action="{{ url("task/" . $task->id) }}" method="post">
                      <button type="submit" class="btn btn-danger" name="button">Delete</button>
                      {{ method_field("DELETE") }}
                      {{ csrf_field() }}
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  @endif
@endsection
