<!DOCTYPE html>
<html>
<head>
<title>pdf : view</title>
<link rel="stylesheet" href="{{asset('css/w3.css')}}">


</head>
<body>


<div class="w3-row">
<div class="w3-col l1  w3-center"></div>
<div class="w3-col l10 ">


    <div class="w3-container w3-green w3-center">

     <h4>  receipt</h4>
    </div>

                    <table class="w3-table w3-striped w3-bordered">

                      <tr>

                      <td>
                        Name
                      </td>
                        <td >{{$member_name}}</td>



                      </tr>

                            <tr>

                            <td>
                              Quantity
                            </td>
                              <td >{{$quantity}}</td>



                            </tr>
                            <tr>

                            <td>
                              units
                            </td>
                              <td >{{$units}}</td>



                            </tr>
                            <tr>

                            <td>
                              Time
                            </td>
                              <td >{{$created_at}}</td>



                            </tr>

                            </table>



</div>
<div class="w3-col l1 w3-red w3-center"></div>
</div><br><br>


</body>
</html>
