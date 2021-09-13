@extends('products.layout')

{{$currentProduct=$products[0];}}

@section('content')
<div class="jumbotron  container">
    <div class="container">
      <h1 class="display-4">Produts</h1>
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>

    <div class="col-sm">

        <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button"> Create</a>

    </div>


    <div class="container">
        @if ($msg=Session::get('message'))
        <div class="alert alert-primary "role="alert">
            {{$msg}}

        </div>

        @endif

    </div>
  </div>

  <div class="jumbotron  container  "style="padding: 1%">
    <div>
        <h6>add new product</h6>
    </div>

    <form action="{{route('products.store')}}" method="POST">
      @csrf
      @method('post')
         <div class="row">

      <div class="col-sm" >

           <input type="text" name="product_name"  class="form-control" placeholder="product name" >
      </div>
      <div class="col-sm">

           <input type="text" name="product_amount" class="form-control" placeholder="product amount">
      </div>
      <div class="col-sm">

           <input type="text" name="product_price" class="form-control" placeholder="product price">
      </div>
      <div class="col-sm">


          <button type="submit" class="btn btn-primary">Save</button>
      </form>
     </div>
      </div>
      </form>
      </div>


<div class="container">
    <table class="table table-striped table-sm">
        <thead class="thead-dark ">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Amount</th>
            <th scope="col">Product Price</th>

            <th scope="col">Action</th>


          </tr>
        </thead>
        <tbody style="height: 9%">
            @php
                $i=0;
            @endphp
            @foreach ( $products as $item)
            <tr >
                <th scope="row">{{++$i}}</th>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_amount}}</td>
                <td>{{$item->product_price}}</td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-success btn-lg" href="{{route('products.edit',$item->id)}}" role="button">Edit</a>


                        </div>
                        <div class="col-sm">
                            <form action="{{route('products.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>


                        </div>


                    </div>
                </td>
              </tr>
            @endforeach


        </tbody>
      </table>
      {!!$products->links()!!}
</div>
@endsection
