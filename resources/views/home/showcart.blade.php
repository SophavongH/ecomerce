<!DOCTYPE html>
<html>
   <head>
    <style>
        .center {
            margin: auto;
            width: 50%;
            padding: 30px;
            text-align: center;
        }
        .table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .th_deg{
            font-size= 25px;
            padding: 5px;
            background: skyblue;
        }
        .img_deg{
            height: 100px;
            width: 100px;
        }
        .total-deg{
            font-size: 20px;
            padding: 5px;
            background: skyblue;
        }
    </style>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
      <!-- why section -->

    @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="ture">x</button>
            {{ session()->get('message') }}
        </div>
    @endif

        <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Product Price</th>
                    <th class="th_deg">Product Image</th>
                    <th class="th_deg">Action</th>
                </tr>

                <?php $totalprice=0; ?>

                @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>${{$cart->price}}</td>
                    <td><img class="img_deg" src="/product/{{$cart->image}}" alt="" width="100px" height="100px"></td>
                    <td>
                        <a onclick="return confirm('Are You Sure To Remove This Product ?')" href="{{url('/remove_cart',$cart->id )}}" class="btn btn-danger">Remove Product</a>
                    </td>
                </tr>
                <?php $totalprice=$totalprice+($cart->price*$cart->quantity); ?>
                @endforeach

                
            </table>
        <div>  
                <h1 class="total-deg">Total Price : ${{$totalprice}} </h1>
        </div>
        
        <div>
            <h1 style="font-size: 25px; padding-botton: 15px; padding-top: 25px">Proceed to Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Make Payment</a>

            <!-- <a href="" class="btn btn-danger">Pay Using Card</a> -->
        </div>
        </div>
        @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>