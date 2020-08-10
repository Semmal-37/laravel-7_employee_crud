@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <a href="/employees" class="btn btn-link">Back</a>
          <a href="/employees/{{$employee['id']}}/edit" class="btn btn-primary float-right">Edit</a>
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    <form>
                      @foreach($employee as $key => $value)
                        @if($key!='photo')
                          <div class="form-group">
                            <label for="inputAddress"  style="text-transform: capitalize;">{{str_replace('_', ' ', $key)}} :</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="empty" value={{$value}} disabled>
                          </div>
                        @elseif($key=='photo')
                          <div class="form-group">
                            <img class="img-thumbnail" alt="Cinque Terre" width="50" src="{{ Storage::url($value) }}">
                          </div>
                        @endif
                      @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
