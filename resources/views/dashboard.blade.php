@include('header');
<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.left-btn { float: left; }
.right-btn { float: right; }
.table-bordered{
    margin-top:3%;
    width: 1500px;
    margin-left:7%;
}
#new-form{
    border: 3px solid black;
    width:600px;
    display: flex;
    align-items: center;
    justify-content: center;

}
</style>
</head>
<body>
<div class="left-btn">
    <h4><b>User Records</b></h4>
</div>
<div class="right-btn">
<button  type="button" onclick="toggle()" class="btn btn-primary btn-lg active">Add Employee</button>
</div>


<table class="table table-bordered" id="table">
<tr>
    <th>Avatar</th>
    <th>Name</th>
    <th>Email</th>
    <th>Experience</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
</tr>
</table>

<div class="new-form" id="new-form">
<form class="form-horizontal" role="form" id="form">
    @csrf
    <h3 style="text-align: center;padding-bottom:20px;">Add New Employee</h3>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="inputPassword3" placeholder="Full Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Date Of Joining</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="doj" id="inputPassword3" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Date Of Leaving</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="name" id="inputPassword3" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="file" id="inputPassword3" >
    </div>
  </div>
  <!-- <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" >Cancel</button>
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
</form>
</div>
<script type="text/javascript">
document.getElementById('new-form').style.visibility='hidden';
function toggle(){
    document.getElementById('new-form').style.visibility="visible";
    document.getElementById('table').style.opacity='0.5';
}
</script>
</body>
</html>
