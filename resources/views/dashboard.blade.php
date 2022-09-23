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

        span.circle {
            background: #ADD8E6;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            color: #6e6e6e;
            display: inline-block;
            font-weight: bold;
            line-height: 40px;
            margin-right: 5px;
            text-align: center;
            width: 40px;
        }

        .buttons {
            width: 200px;
            margin: 0 auto;
            display: inline;
        }

        .action_btn {
            width: 200px;
            margin: 0 auto;
            display: inline;
        }
        .confirm_buttons{
            width:60px;
        }
        .popup{
            font-size:15px;
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
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body popup">
                        <form action="<?php echo url('postemployee'); ?>" method="POST" enctype="multipart/form-data">
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
                                        aria-describedby="emailHelp" name="fname" placeholder="Enter Name">

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
                                    <label class="form-check-label" style="margin-left:30px;"
                                        for="defaultCheck1">
                                        Still working
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="email1">Upload Image</label>
                                    <input type="file" class="form-control" id="email" name="image"
                                        aria-describedby="emailHelp">
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
        @foreach ($employees as $employee)
        {{-- <?php var_dump($employee['id']); ?> --}}
            <tr>
                <td>
                    @if (isset($employee['image_path']))
                        <img style="border-radius: 50%;height:40px;width:40px;"
                            src={{ URL::asset("/images/{$employee['image_path']}") }} alt="Avatar">
                    @else
                        <span class="circle">{{ ucfirst(mb_substr($employee['name'], 0, 1)) }}</span>
                    @endif
                </td>
                <td>{{ ucfirst($employee['name']) }}</td>
                <td>{{ $employee['email'] }}</td>
                <td>{{ $employee['joining_date'] }}</td>
                <td>
                    <button type="submit"  class="btn"  data-toggle="modal" data-target="#exampleModalCenter"
                        value="{{$employee['id']}}">

                        <span style="margin-top:10px;"  onclick="getId()" value={{$employee['id']}} class="glyphicon glyphicon-remove">
                            {{-- <p style="font-size:20px;">Remove</p> --}}
                            {{-- {{$employee['id']}} --}}
                        </span>
                    </button>

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-body text-center">
                                    Are you sure you want to delete ?
                                    <br><br>
                                    <form action="<?php echo url('delete');?>" method="POST">
                                        <input type="hidden" id="hidden">
                                        <?php var_dump($employee['id']); ?>
                                    <button type="submit"  class="btn btn-primary confirm_buttons" data-toggle="modal"
                                        data-target="#exampleModalCenter" >Yes</button>
                                    <button type="submit" class="btn btn-secondary confirm_buttons" data-toggle="modal"
                                        data-target="#exampleModalCenter">No</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
    </table>


    <script type="text/javascript">
        // document.getElementById('new-form').style.visibility = 'hidden';

        // function toggle() {
        //     document.getElementById('new-form').style.visibility = "visible";
        //     document.getElementById('table').style.opacity = '0.5';
        // }
        function getId(){
            $val = document.getElementById('remove_btn').value;
            alert($val);
        }
    </script>
</body>

</html>
