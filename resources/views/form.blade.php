<!DOCTYPE html>
<html>
<head>
    <title>Egycon Tickets Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status-success'))
    <div class="alert alert-success">
        {{ session('status-success') }}
    </div>
  @endif
  @if(session('status-failure'))
    <div class="alert alert-danger">
        {{ session('status-failure') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
    EGYCON Tickets System
    </div>
    <div class="card-body">
      <form name="form-data" id="form-data" method="post" action="{{url('form-data')}}" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
        <input type="file" id="myFile" name="picture" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" name="email" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone</label>
          <input type="text" name="phone_number" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>