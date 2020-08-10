@extends('layouts.app')

@section('content')
   <div class="container">
   		<form class="form form-horizontal" method="post" action="/employees-import" enctype="multipart/form-data">
   			<div class="form-group">
   				<input type="file" name="employee_file">
   			</div>

   			<button type="submit" class="btn btn-primary">Import</a>
			@csrf
   		</form>
   </div>
@endsection
