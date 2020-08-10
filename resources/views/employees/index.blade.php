@extends('layouts.app')
@section('content')
<div class="container">
   <a class="btn btn-primary"  style="margin-top: -10px" href="/employees-import">Import</a>
   <a class="btn btn-primary float-right" style="margin-top: -10px" href="/employees-export">Export</a>
  <h2 style="text-align: center;">Employee Details</h2>
  <a href="/employees/create" class="btn btn-primary float-right" style="margin-top: -10px">New Employee</a>
  <br><br>
  
  <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100% " id="table">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Photo</th>
        <th class="text-center">Firstname</th>
        <th class="text-center">Lastname</th>
        <th class="text-center">Email</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee)
      <tr>
        <td class="text-center">
          <a href="/employees/{{$employee->id}}"> {{$employee->id}}</a></td>
          <td><img class="img-thumbnail" alt="Cinque Terre" width="50" src="{{ Storage::url($employee->photo) }}"></td>
          <td class="text-center">{{$employee->firstname}}</td>
          <td class="text-center">{{$employee->lastname}}</td>
          <td class="text-center">{{$employee->email}}</td>
          <td class="text-center">
            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
              <a class="btn btn-primary" href="{{ route('employees.show',$employee->id) }}">Show</a>
              <a class="btn btn-primary"  href="{{ route('employees.edit',$employee->id) }}">Edit</a>
              <form action="{{ route('employees.edit',$employee->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="myFunction()" class="btn btn-primary">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <td colspan="6">
            <div class="float-right">
              {{$employees->links()}}
            </div>
          </td>
        </tr>
        </tfoot>
      </table>
      <div>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></script>
        <script src="//code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
         $('#table').DataTable(); } );
        </script>
        <script>
        function myFunction() {
          alert("Employee Data Deleted Successfully!");
        }
        </script
        @endsection