@extends('layouts.master')

@section('content')

  @if( Cart::count() > 0 )
  <div class="px-4 px-lg-0">

<div class="pb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

        <!-- Shopping cart table -->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="border-0 bg-light">
                  <div class="p-2 px-3 text-uppercase">Product</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Price</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Quantity</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Remove</div>
                </th>
              </tr>
            </thead>
            <tbody>
                  @foreach(Cart::content() as $product)

              <tr>
                <th scope="row" class="border-0">
                  <div class="p-2">
                    <img src="{{ $product->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                    <div class="ml-3 d-inline-block align-middle">
                      <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $product->model->titre }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: </span>
                    </div>
                  </div>
                </th>
                <td class="border-0 align-middle"><strong>{{ $product->model->getPrix() }}</strong></td>
                <td class="border-0 align-middle"><strong>1</strong></td>
                <td class="border-0 align-middle">
                    

                    <form action="{{ route('cart.destroy', $product->rowId) }}" method="post">
                       @csrf 
                       @method('DELETE')
                       <button type="submit" class="text-light btn-danger"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></button>
                    </form>

                </td>
              </tr>

                  @endforeach
            </tbody>
          </table>
        </div>
        <!-- End -->
      </div>
    </div>

    <div class="row py-5 p-4 bg-white rounded shadow-sm">
      <div class="col-lg-6">
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
        <div class="p-4">
          <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
          <div class="input-group mb-4 border rounded-pill p-2">
            <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
            <div class="input-group-append border-0">
              <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
            </div>
          </div>
        </div>
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
        <div class="p-4">
          <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
          <textarea name="" cols="30" rows="2" class="form-control"></textarea>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détails de la commande</div>
        <div class="p-4">
          <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
          <ul class="list-unstyled mb-4">
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{ getPrice(Cart::subtotal()) }}</strong></li>
            {{--<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>--}}
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{ getPrice(Cart::tax()) }}</strong></li>
            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
              <h5 class="font-weight-bold">{{ getPrice(Cart::total()) }}</h5>
            </li>
          </ul><a href="{{ route('checkout.index') }}" class="btn btn-dark rounded-pill py-2 btn-block">Passer à la caisse</a>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
  @else

    <div class="col-md-12">
        <p>Votre Panier est vide.</p>
    </div>

  @endif

@endsection