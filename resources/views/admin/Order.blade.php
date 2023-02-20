<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
         
        }
        .table_deg{
            width: 90%;
            margin: auto;
            padding-top: 50px;
            border: 1px solid white;
            text-align: center;
        }
        .th_deg{
            background-color: skyblue;
            
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
        
        <div class= "main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg"> All Orders </h1>

                <table class="table_deg">
                    <tr class= "th_deg" >
                        
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Satust</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Action</th>
                        
                    </tr>
                        @foreach($order as $order)
                    <tr>
                        <td>{{$order ->name}}</td>
                        <td>{{$order ->email}}</td>
                        <td>{{$order ->phone}}</td>
                        <td>{{$order ->address}}</td>
                        <td>{{$order ->product_tittle}}</td>
                        <td>{{$order ->quantity}}</td>
                        <td>{{$order ->price}}</td>
                        <td>{{$order ->payment_status}}</td>
                        <td>{{$order ->delivery_status}}</td>
                        <td>
                            <img src="{{asset('product/'.$order->image)}}" style="width: 100px; height: 100px;">
                        </td>

                        <td>
                            @if($order ->delivery_status == "pending")
                            <a href="{{url('delivered',$order -> id)}}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary" >Delivered</a>
                            @else
                            <p>Delivered</p>
                            @endif
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