@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-8">

        {{-- Header Productos--}}
        <div class="d-flex bd-highlight">
          <div class="mr-auto bd-highlight d-flex align-items-center">
            <h3>Lista de Productos</h3>
          </div>
          <div class="bd-highlight">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
              </ol>
            </nav>
          </div>
        </div>

        <productos></productos>

      </div>
    </div>
  </div>
@endsection
