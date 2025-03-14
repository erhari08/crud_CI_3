<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="<?= $this->security->get_csrf_hash(); ?>">

    <title>CI-3 CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php  ?></a>
    <img src="data:image/png;base64,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" height="50" />
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      </ul>
    </div>
  </div>
</nav>
<div class="card text-dark bg-light mb-3" style="max-width: 100%;">
  <div class="card-header">CREATE STUDENTS: </div>
  <div class="card-body">
    <div class="container">
        <div class="row">
          <div class="col-md-6">
          <h5 class="card-title">REGISTER FORM</h5>
          <form class="row g-3" action="#" method="POST" enctype="multipart/form-data" id="add_student_form" novalidate>
        <div class="col-md-6">
    <label for="" class="form-label">Name</label>
    <input type="name" class="form-control" name="name" required>
    <div class="invalid-feedback">Name is required!</div>

  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required>
    <div class="invalid-feedback">Email is required!</div>

  </div>
  <div class="col-md-6">
  <label for="" class="form-label">Gender : </label>

    <div class="form-check">
      <input class="form-check-input" type="radio"  name="gender" value="male" required>
      <label class="form-check-label" for=""> Male
 
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio"  name="gender"  value="female" required>
      <label class="form-check-label" for=""> Female
       
      </label>
    </div>
  </div>
  <div class="col-md-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" placeholder="" required>
    <div class="invalid-feedback">Address is required!</div>

  </div>
  
  <div class="col-md-12">
  <label for="formFileMultiple" class="form-label">Upload Photo</label>
  <input class="form-control" type="file" name="file"  required>
  <div class="invalid-feedback">Photo is required!</div>

</div>
<div class="col-md-12">
<br>

  <img src="" id="student_image"/>
</div>

<input type='submit' class="btn btn-success" value='Create' id='btnAdd'>

  <div class="col-md-12" id="showbtn">
  <br>


    <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
  </div>
</form>

          </div>
          <div class="col-md-6">
          <h5 class="card-title"> DATATABLE</h5>
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">gender</th>
      <th scope="col">image</th>
      <th scope="col">Settings</th>

    </tr>
  </thead>
  <tbody id="show_users">
    
  </tbody>
</table>
          </div>
        </div>
    </div>
  </div>
</div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  
      $('#add_student_form').submit(function(e){
        // var csrf_token = $('meta[name="csrf_token"]').attr('content'); // Get CSRF token

        e.preventDefault();
        const formData = new FormData(this);
        // formData.append('csrf_token', csrf_token); // Append CSRF token

        if (!this.checkValidity()) {
          e.preventDefault();
          $(this).addClass('was-validated');
        } else {
        $.ajax({
            url: '<?= base_url('adduser') ?>',
            method: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
             console.log(response);
             Swal.fire({
              title: "Student Created Successfully!",
              icon: "success"
            });
             $("#add_student_form")[0].reset();
             $("#add_student_form").removeClass('was-validated');
             fetchAllStudents();

            }
          });

        }
      })
      
      fetchAllStudents();

      function fetchAllStudents() {
        $.ajax({
          url: '<?= base_url('getallstudents') ?>',
          method: 'get',
          dataType: 'json',
          success: function(response) {
            $('#btnAdd').show();
            $("#show_users").html(response.message);
          }
        });
      }
        

      function editusers(id){
        $('#btnUpdate').show();
        $.ajax({
          url: '<?= base_url('edit') ?>/'+ id,
          method: 'get',
          dataType: 'json',
          success: function(response) {
            console.log(response.data);
            $("[name='name']").val(response.data.name);
            $("[name='address']").val(response.data.address);
            $("[name='gender']").val([response.data.gender]);
            $("[name='email']").val(response.data.email);
            $('#student_image').attr('src', 'uploads/'+response.data.photo);
            $('#btnAdd').hide();
            var something = $('<input/>').attr({ type: 'button', class:"btn btn-success", name:'updatebtn', value:'Update', onclick:"updateusers("+response.data.id+")" });
            $("#showbtn").append(something);

            // $("#show_users").html(response.message);"
          }
        });
      }


      function updateusers(id){
        var form = $("#add_student_form")[0]; 
        var formData = new FormData(form); 
        $.ajax({
            url: '<?= base_url('update') ?>/'+ id,
            method: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
             console.log(response);
             $('#btnAdd').show();
             $("#showbtn").html('');
             $('#student_image').attr('src', '');
             $("#add_student_form")[0].reset();
             $("#add_student_form").removeClass('was-validated');
             fetchAllStudents();
            }
          });

        
      }


      function delusers(id){
        $("#add_student_form")[0].reset();
        $("#add_student_form").removeClass('was-validated');

            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
              url: '<?= base_url('delete') ?>/'+ id,
              method: 'get',
              dataType: 'json',
              success: function(response) {
                console.log(response);
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                  });

                fetchAllStudents();
                $('#btnAdd').show();
                $("#showbtn").html('');
                $('#student_image').attr('src', '');

              }
            });
              
            }
          });
       

      }


      





    

    </script>
</body>
</html>