@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <a href="/employees" class="btn btn-link">Back</a>
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    <form method="post" action="/employees/{{$employee['id']}}" enctype="multipart/form-data">
                      @foreach($employee as $key => $value)
                        
                        @if($key!='photo'&& $key!='resume')
                          <div class="form-group">
                          <label style="text-transform: capitalize;" for="inputAddress">{{$key}} :</label>
                          <input type="text" name="{{$key}}" class="form-control" id="inputAddress" placeholder="Empty" value={{$value}}>
                        </div>
                        @endif


                      @endforeach

                      <button type="submit" class="btn btn-primary">Save</a>

                        <input type="hidden" name="_method" value="put" />
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
