<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function categorias()
   {
      $categorias = DB::table('categorias')->orderBy('id', 'desc')->get();
      return response()->json($categorias);
   }

   public function categoriasSaveNew(Request $request){
      Categoria::create([
         'codigo' => $request->codigo,
         'nombre' => $request->nombre
      ]);
      return response()->json($request);
   }

   public function categoriasUpdate(Request $request){
      DB::table('categorias')->updateOrInsert(
         ['id' => $request->categoria['id']],
         ['codigo' => $request->categoria['codigo'], 'nombre' => $request->categoria['nombre']]
      );
      //      return response()->json($request->categoria['id']);
   }

   public function productosGetAll(){
      $productos = DB::table('productos')->orderBy('id', 'desc')->get();
      return response()->json($productos);
   }

   public function productosSave(Request $request){
      DB::table('productos')->updateOrInsert(
         ['id' => $request->producto['id']],
         [
            'codigo' => $request->producto['codigo'],
            'nombre' => $request->producto['nombre'],
            'categoria_id' => $request->producto['categoria_id'],
            'preciosinigv' => $request->producto['preciosinigv'],
            'precioconigv' => $request->producto['precioconigv'],
         ]
      );
   }

   public function index(){
      return view('productos/index');
   }
   public function create()
   {
      //
   }

   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param \App\Producto $producto
    * @return \Illuminate\Http\Response
    */
   public function show(Producto $producto)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Producto $producto
    * @return \Illuminate\Http\Response
    */
   public function edit(Producto $producto)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Producto $producto
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Producto $producto)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param \App\Producto $producto
    * @return \Illuminate\Http\Response
    */
   public function destroy(Producto $producto)
   {
      //
   }
}
