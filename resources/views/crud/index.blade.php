<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <title>Crud..!</title>
    <style>
        .btn.btn-sm {
            padding: 0.1rem 0.4rem;
            font-size: 12px;
            margin: 5px;
        }
        input {
            margin: 5px !important;
        }
        select#required {
            margin: 5px !important;
    }
    div#foreginKeyDiv {
        display: inline-grid;
    }
    </style>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome.css">
  </head>
  <body>
    <div class="container">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Crud Generate</h4>
                        <h5 class="card-subtitle">System creater</h5>
                    </div>
                </div>
                <a href="/migrate" class="btn btn-success float-right mb-5">Migrate</a>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    @foreach ($errors->all() as $error)
                        <strong>{{$error}}</strong>
                    @endforeach
                </div>

                @endif

                <form action="{{ url('jsonSave') }}" method="post">
                    @csrf
                    <input type="text" class="form-control" id="modelName" name="modelName"
                        placeholder="Model Name">

                    <div class="form-inline m-1" style="padding: 10px">
                        <input type="text" class="form-control" id="name" placeholder="field name">
                        <select name="type" id="type" class="form-control">
                            <option value="string">string</option>
                            {{-- <option value="email">email</option> --}}
                            <option value="integer">integer</option>
                            <option value="longtext">textarea</option>
                            <option value="number">number</option>
                            <option value="date">date</option>
                            <option value="time">time</option>
                            <option value="file">file</option>
                            <option value="password">password</option>
                            <option value="integer#unsigned">integer#unsigned</option>
                            <option value="bigint#unsigned">bigInteger#unsigned</option>
                        </select>

                        <select name="required" id="required" class="form-control">
                            <option value="not">Not required</option>
                            <option value="required">required</option>
                        </select>

                        <a href="#" class="btn btn-success btn-sm add-row "><i class="fa fa-plus"
                                aria-hidden="true"></i></a>
                        <input type="checkbox" name="" id="foreginKeyDivShow" >
                        <div id="foreginKeyDiv">
                            <input type="text" class="form-control" id="referencesTable"
                                placeholder="references table">
                            <input type="text" class="form-control" id="referencesField"
                                placeholder="references field">
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Required</th>
                                <th>References table</th>
                                <th>References field</th>
                            </tr>
                        </thead>
                        <tbody id="fieldTable">

                        </tbody>
                    </table>
                    <button type="button" class="delete-row btn btn-danger btn-sm"> <i class="fa fa-trash"
                            aria-hidden="true"></i> </button>

                    <hr>
                    <div class="form-inline m-1" style="padding: 10px">
                        <input type="text" class="form-control" id="rname" placeholder="function name">
                        <select id="rtype" class="form-control">
                            <option value="belongsTo">hasOne</option>
                            <option value="belongsTo">belongsTo</option>
                            <option value="hasManey">hasMany</option>
                        </select>

                        <input type="text" class="form-control" id="rclass" placeholder="App\class">

                        <a href="#" class="btn btn-success btn-sm " id="addReletionship"><i class="fa fa-plus"
                                aria-hidden="true"></i></a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>RType</th>
                                <th>RName</th>
                                <th>class</th>
                            </tr>
                        </thead>
                        <tbody id="reletion">

                        </tbody>
                    </table>
                    <button type="button" class="delete-row btn btn-danger btn-sm"> <i class="fa fa-trash"
                            aria-hidden="true"></i> </button>

                    <h4>Folder and Path:</h4>
                    <div class="form-group">
                      <input type="text"
                        class="form-control" name="view_path" id="view_path" value="admin" placeholder="view-path">
                    </div>
                    <div class="form-group">
                      <input type="text"
                        class="form-control" name="controller_namespace" value="Admin" id="controller-namespace"   placeholder="controller-namespace">
                    </div>
                    <div class="form-group">
                      <input type="text"
                        class="form-control" name="route_group" id="route_group" value="admin"  placeholder="route-group">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var i = 0;
            var totalString = '';
            $(".add-row").click(function(e) {
                e.preventDefault();
                var type = $("#type").val();
                var name = $("#name").val();
                var required = $("#required").val();
                var referencesTable = $("#referencesTable").val();
                var referencesField = $("#referencesField").val();
                if (type != '' && name != '') {
                    var hash = "#";
                    var res = name + hash + type + ';';
                    totalString += res;
                    $('#totalString').val(totalString);
                    var markup =
                        "<tr><td class='align-center'><input type='checkbox' name='record'></td><td class='align-center'><input type='text' value='" +
                        type +
                        "'  id='type' name='type[]' style='width: 60px;border:unset;'></td><td class='align-center'><input type='text' value='" +
                        name +
                        "'  id='name' name='name[]' style='width: 60px;border:unset;'></td> </td><td class='align-center'><input type='text' value='" +
                        required +
                        "'  id='required' name='required[]' style='width: 60px;border:unset;'></td><td class='align-center'><input type='text' value='" +
                        referencesTable +
                        "'  id='required' name='referencesTable[]' style='width: 60px;border:unset;'></td><td class='align-center'><input type='text' value='" +
                        referencesField +
                        "'  id='required' name='referencesField[]' style='width: 60px;border:unset;'></td></tr>";
                    $("#fieldTable").append(markup);
                }
                // $("#type").val('');
                $("#name").val('');
                // $("#required").val('');
                $("#referencesTable").val('');
                $("#referencesField").val('');
            });
            // Find and remove selected table rows
            $(".delete-row").click(function() {
                $("table tbody").find('input[name="record"]').each(function() {
                    if ($(this).is(":checked")) {
                        $(this).parents("tr").remove();
                    }
                });
            });
        });
        $('#addReletionship').click(function(e) {
            e.preventDefault();
            var rtype = $("#rtype").val();
            var rname = $("#rname").val();
            var rclass = $("#rclass").val();
            if (rtype != '' && rname != '' && rclass != '') {
            var rmarkup = "<tr><td><input type='checkbox' name='record'></td><td><input type='text' value='" +
                rtype +
                "'  id='type' name='rtype[]' style='border:unset;'></td><td><input type='text' value='" + rname +
                "'  id='name' name='rname[]' style='border:unset;'></td> </td></td><td><input type='text' value='" +
                rclass +
                "'  id='required' name='class[]' style='border:unset;'></td></tr>";
            $("#reletion").append(rmarkup);
            }
            $("#rname").val('');
            // $("#rtype").val('');
            $("#rclass").val('');

        });
        $("#foreginKeyDiv").hide();
        $("#foreginKeyDivShow").change(function(e) {
            e.preventDefault();
            // alert('click');
            if (this.checked) {
                $('#foreginKeyDiv').slideDown('show').show();
            } else {
                $("#foreginKeyDiv").slideUp("slow")
            }
        });
    </script>
</body>
</html>



