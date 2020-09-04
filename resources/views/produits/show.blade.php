@extends('layouts.master')

@section('content')

<div class="col-md-12">
          <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h5 class="mb-0">{{ $produit->titre }}</h5> 
              <div class="mb-1 text-muted">{{ $produit->created_at->format('d/m/Y') }}</div>
              <p class="mb-auto">{{ $produit->sous_titre }}</p>
              <strong class="mb-auto"><font color="green">{{ $produit->getPrix() }}</font></strong>
                 <form action="{{ route('cart.store') }}" method="post">
                   @csrf
                   <input type="hidden" name="produit_id" value="{{ $produit->id }}">

                    <button type="submit" class="btn btn-dark">Ajouter au panier</button>
                 </form>
            </div>
            <div class="col-auto d-none d-lg-block">
               <img src="{{ $produit->image }}" alt="">
        </div>
      </div>

@endsection