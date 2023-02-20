<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css" >
            .div_center
            {
                text-align: center;
                padding-top: 40px;
            }
            .h1_font
            {
                font-size: 40px;
                padding-bottom: 40px;
            }
            .input_color
            {
                color: black;
              
            }
            .center
            {
                margin : auto;
                width: 50%;
                text-align: center;
                margin-top: 30px;
                border: 3px solid white;
            }
    </style>
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="ture">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                    <div class="div_center">
                        <h1 class="h1_font">Add Category</h1>
                        <form action="{{url('/add_category')}} " method= "POST"> 
                            @csrf
                            <input type="text" name="category" placeholder="Enter Category Name" class="input_color">
                            <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                        </form> 
                    </div>
                    <table class="center ">
                        <tr>   
                            
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>

                        @foreach($data as $data)

                        <tr>
                            <td>{{$data->category_name}}</td>
                            <td>
                                <a onclick="return confirm ('Are You Sure To Delete This') " class="btn btn-danger" href="{{url('delete_category' ,$data->id)}}"> Delete </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>