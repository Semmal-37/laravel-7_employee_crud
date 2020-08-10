@extends('layouts.app')

@section('content')
 <style>
   .error {
    color: red;
   }
 </style>
   <div class="container" style="width: 855px;margin:0 auto;">
                   <a href="/employees" class="btn btn-primary ">Back</a>
 <h2 style="text-align: center;">Fill Your Employee Details</h2>
      <form id="employeeForm">
          {{ csrf_field() }}

          <div class="form-group">
              <label for="firstname">Firstname</label>
                  <input required name="firstname" type="text" class="form-control" id="firstname" placeholder="Firstname">
          </div>

          <div class="form-group">
              <label for="lastname">Lastname</label>
                  <input required name="lastname" type="text" class="form-control" id="lastname"placeholder="Lastname">
          </div>

          <div class="form-group">
              <label for="date_of_birth">Date Of Birth</label>
                <input required name="date_of_birth" type="date" class="form-control" id="date_of_birth" placeholder="D.O.B">
          </div>

          <div class="form-group">
              <label for="date_of_birth">Education Qualification</label>
                  <input required name="education_qualification" type="text" class="form-control" id="education_qualification" placeholder="Education Qualification">
          </div>

          <div class="form-group">
              <label for="address">Address</label>
                  <input required name="address"class="form-control" id="address" placeholder="Address">
          </div>

          <div class="form-group">
              <label for="email">Email</label>
                  <input required name="email" type="email" class="form-control" id="email" placeholder="Email">
          </div>

          <div class="form-group">
              <label for="phone">Phone</label>
                  <input required name="phone" class="form-control" id="phone" placeholder="Phone">
          </div>

          <div class="form-group">
              <label for="photo">Photo</label>
                  <input name="photo" type="file" id="photo" class="form-control-file">
          </div>

           <div class="form-group">
              <label for="resume" class="col-sm-3 col-form-label">Resume</label>
                  <input name="resume" type="file" id="resume" class="form-control-file">
          </div>

          <div class="form-group">
              <div class="offset-sm-3 col-sm-9">
                  <button id="btn-submit"  style="margin-left: 110px;"type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>

      </form>
  </div>

<script type="text/javascript">
       
    $(document).ready(function() {
        $("#btn-submit").click(function(e){
            e.preventDefault();
            if(!$("#employeeForm").valid()){
              return;
            }
            // var _token = $("input[name='_token']").val();
            // var firstname = $("input[name='firstname']").val();
            // var lastname = $("input[name='lastname']").val();
            // var date_of_birth = $("input[name='date_of_birth']").val();
            // var education_qualification = $("input[name='education_qualification']").val();
            // var address = $("textarea[name='address']").val();
            // var email = $("input[name='email']").val();
            // var phone = $("input[name='phone']").val();
            // var photo = $("input[name='photo']").val();
            // var resume = $("input[name='resume']").val();
            var formData = new FormData($('form#employeeForm')[0]);
            $.ajax({
                data: FormData,
                url: "/employees",
                type:'POST',
                contentType: false,
                processData: false,
                data: formData,
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
       
        }); 
       
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>
@endsection
