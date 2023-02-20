<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
            .div_center
            {
                text-align: center;
                padding-top: 40px;
            }
            .font_size
            {
                font-size: 40px;
                padding-bottom: 40px;
            }
            .text_color
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
            label
            {
                display: inline-block;
                width: 200px;
            }
            .div_design
            {
               padding-bottom: 15px;
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
                    <h1 class="font_size">Add Product </h1>


                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="div_design">
                        <label for="">Product Title:</label>
                        <input class="text_color" type="text" name="title" placeholder= "Write a Title" required="" >
                    </div>
                    <div class="div_design">
                        <label for="">Product Description:</label>
                        <input class="text_color" type="text" name="description" placeholder= "Write a Description" required="">
                    </div>
                    <div class="div_design">
                        <label for="">Product Price:</label>
                        <input class="text_color" type="number" name="price" placeholder= "Write a price" required="">
                    </div>
                    <div class="div_design">
                        <label for="">Discount Price:</label>
                        <input class="text_color" type="number" name="dis_price" placeholder= "Write a Discout is apply " >
                    </div>
                    <div class="div_design">
                        <label for="">Product Quantity:</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder= "Write a quantity" required="">
                    </div>
                    
                    <div class="div_design">
                        <label for="">Product Category:</label>
                        <select class="text_color" name="category" required="">
                            <option value=" " selected=" ">Add a Category here</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>    
                    </div>
                    <div class="div_design">
                        <label for="">Product Image here:</label>
                        <input type="file" name="image" required="">
                    </div>
                    <div class="div_design">
                        <input type="submit" value="Add Product" class="btn btn-primary">
                    </div>
                </div>

                </form>
            </div>
         </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>