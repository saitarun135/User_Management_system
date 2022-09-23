@include('header');
<!DOCTYPE html>
<html>

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .left-btn {
            float: left;
        }

        .right-btn {
            float: right;
        }

        .table-bordered {
            margin-top: 3%;
            width: 1500px;
            margin-left: 7%;
        }

        #new-form {
            border: 3px solid black;
            width: 600px;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        table {
            font-family: "Times New Roman";
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h4 class="" style="font-size:20px;font-weight:35px;">User Records</h4>
            </div>
            <div class="col-6 text-right">
                <button type="button" style="font-size:20px;font-weight:28px;" class="btn btn-primary"
                    data-toggle="modal" data-target="#exampleModal">
                    Add New Employee
                </button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo url('postemployee'); ?>" method="POST">
                            @csrf
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="email1">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        aria-describedby="emailHelp" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="email1">Full Name</label>
                                    <input type="text" class="form-control" id="fname"
                                        aria-describedby="emailHelp"  name="fname" placeholder="Enter Name">

                                </div>
                                <div class="form-group">
                                    <label for="email1">Date Of Joining</label>
                                    <input type="date" class="form-control" name="doj" id="doj"
                                        aria-describedby="emailHelp">

                                </div>
                                <div class="form-group">
                                    <label for="password1">Date Of Leaving</label>
                                    <input type="date" class="form-control" id="password1" name="dol">
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" style="margin-top:10px;" type="checkbox"
                                        name="current_date" id="defaultCheck1">
                                    <label class="form-check-label" style="font-size:17px;margin-left:30px;"
                                        for="defaultCheck1">
                                        Still working
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="email1">Upload Image</label>
                                    <input type="file" class="form-control" id="email"
                                        name="image" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>

                            </div>
                        </form>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="right-btn">
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


    <script type="text/javascript">
        document.getElementById('new-form').style.visibility = 'hidden';

        function toggle() {
            document.getElementById('new-form').style.visibility = "visible";
            document.getElementById('table').style.opacity = '0.5';
        }
    </script>
</body>

</html>
