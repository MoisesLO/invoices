<template>
   <div class="card">
      <div class="card-header pl-2 pr-2">
         <div class="d-flex bd-highlight">
            <div class="flex-grow-1 bd-highlight">
               <input type="text" class="form-control" placeholder="Buscar Producto">
            </div>
            <div class="bd-highlight">
               <button class="btn btn-primary d-inline-block ml-1"><i class="fa fa-search"></i></button>
               <button class="btn btn-success" @click="productoNewEstado"><i class="fa fa-plus"></i> Nuevo</button>
               <button class="btn btn-secondary d-inline-block mr-4" @click="openModal"><i class="fa fa-list"></i>
                  Categorias
               </button>
            </div>
            <div class="bd-highlight">

               <ul class="pagination p-0 m-0">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
               </ul>
            </div>
         </div>



         <!-- Modal Categorias -->
         <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-list-alt"></i> Categorias de
                        Productos</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <table class="table table-sm table-striped">
                        <tr class="bg-light">
                           <td >#</td>
                           <td style="width: 25%">Codigo</td>
                           <td>Nombre Categoria</td>
                           <td>Acciones</td>
                        </tr>
                        <tr>
                           <td><i class="fa fa-plus-circle"></i></td>
                           <td>
                              <input type="text" class="form-control form-control-sm" v-model="categoria.codigo" placeholder="Codigo">
                           </td>
                           <td>
                              <input type="text" class="form-control form-control-sm" v-model="categoria.nombre" placeholder="Nombre">
                           </td>
                           <td>
                              <button class="btn btn-success btn-sm" @click="saveNewCategoria">
                                 <i class="fa fa-plus"></i> Crear
                              </button>
                           </td>
                        </tr>
                        <tr v-for="(categoria, index) in categorias">
                           <td>{{ index +1 }}</td>
                           <!-- Codigo-->
                           <td v-if="categoria.edit == '0'">{{ categoria.codigo }}</td>
                           <td v-else><input type="text" class="form-control form-control-sm" v-model="categoria.codigo" @keyup.enter="saveUpdateCategoria(index)" placeholder="Codigo"></td>
                           <!-- Nombre -->
                           <td v-if="categoria.edit == '0'">{{ categoria.nombre.substring(0,30) }}</td>
                           <td v-else>
                              <input type="text" class="form-control form-control-sm" v-model="categoria.nombre" @keyup.enter="saveUpdateCategoria(index)" placeholder="Nombre">
                           </td>
                           <td class="m-0">
                              <!-- Edit Save-->
                              <button class="btn btn-primary btn-sm" @click="editCategoria(index)" v-if="categoria.edit == '0'">
                                 <i class="fa fa-edit"></i>
                              </button>
                              <button class="btn btn-success btn-sm" @click="saveUpdateCategoria(index)" v-else>
                                 <i class="fa fa-save"></i>
                              </button>
                              <button class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Modal Categorias -->

      </div>
      <div class="card-body">
<!--         {{ $data.productoNew }}-->
         <!-- Tabla Productos -->
         <table class="table table-sm table-striped">
            <thead>
            <tr>
               <th>#</th>
               <th>Codigo</th>
               <th>Nombre</th>
               <th>Categoria</th>
               <th>Precio (+Igv)</th>
               <th>IGV</th>
               <th>Precio (- Igv)</th>
               <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-show="!!!productoNewActive">
               <td class="align-middle"><i class="fa fa-plus"></i></td>
               <td>
                  <input type="text" class="form-control" v-model="productoNew.codigo" placeholder="Codigo">
               </td>
               <td>
                  <input type="text" class="form-control" v-model="productoNew.nombre" placeholder="Nombre">
               </td>
               <td>
                  <select class="form-control w-100 select2bs4" v-model="productoNew.categoria_id" v-select='productoNew.categoria_id'>
                     <option v-for="(categoria, index) in categorias" v-bind:value="categoria.id">
                        {{categoria.id}}.- {{categoria.nombre}}
                     </option>
                  </select>
               </td>
               <td>
                  <input type="text" class="form-control" v-model="productoNew.precioconigv" @input="productoChangePrice" placeholder="0.00">
               </td>
               <td>
                  <input type="text" class="form-control" v-model="productoNew.igv" placeholder="IGV" disabled>
               </td>
               <td>
                  <input type="text" class="form-control" v-model="productoNew.preciosinigv" placeholder="Total">
               </td>
               <td class="py-sm-1 align-middle">
                  <button class="btn btn-sm btn-success" @click="productoNewSave">
                     <i class="fa fa-plus"></i>
                  </button>
               </td>
            </tr>
            <tr v-for="(producto, index) in productos">
               <td>{{index+1}}</td>
               <!-- Codigo -->
               <td v-if="producto.edit == '1'"><input type="text" class="form-control" v-model="producto.codigo" placeholder="Codigo"></td>
               <td v-else>{{producto.codigo}}</td>

               <!-- Nombre -->
               <td v-if="producto.edit == '1'"><input type="text" class="form-control" v-model="producto.nombre" placeholder="Nombre"></td>
               <td v-else>{{producto.nombre}}</td>

               <!-- Categoria -->
               <select class="form-control w-100 select2bs5">
                  <option v-for="(categoria, index) in categorias">
                     {{categoria.id}}.- {{categoria.nombre}}
                  </option>
               </select>
<!--               <td v-show="producto.edit == '0'">{{ producto.categoria_id}}</td>-->

               <td>72.00</td>
               <td>18.00</td>
               <td>100.00</td>
               <td class="py-sm-1">
                  <button class="btn btn-primary btn-sm p-1" @click="productoEdit(index)" v-if="producto.edit == '0'">
                     <i class="fa fa-edit"></i>
                  </button>
                  <button class="btn btn-success btn-sm p-1" @click="productoSave(index)" v-else>
                     <i class="fa fa-edit"></i>
                  </button>
               </td>
            </tr>
            </tbody>
         </table>

      </div>
   </div>
</template>

<script>
   export default {
      data() {
         return {
            categoria: {
               id: "",
               codigo: "",
               nombre: ""
            },
            categorias: {},
            productoNewActive: true,
            productos: {},
            productoNew: {
               id: '',
               codigo: '',
               nombre: '',
               descripcion: '',
               categoria_id: 0,
               preciosinigv: null,
               precioconigv: null,
               igv: null,
               total: 0.00,
            }
         }
      },
      methods: {
         productoSave: function(i){
            this.productos[i].edit = '0';
         },
         productoEdit: function(i){
            this.productos[i].edit = '1';
            console.log(this.productos[i]);
         },
         redondear: function(m){
            var t = Math.pow(10, 2);
            return (Math.round((num * t) + (2>0?1:0)*(Math.sign(num) * (10 / Math.pow(100, 2)))) / t).toFixed(2);
         },
         productoChangePrice: function () {
            this.productoNew.igv = (this.productoNew.precioconigv * 0.18).toFixed(2);
            this.productoNew.preciosinigv = (this.productoNew.precioconigv - this.productoNew.igv).toFixed(2);
            console.log(this.productoNew.preciosinigv)
         },
         selectCategoria: function(){
            console.log('selecciono')
         },
         saveNewCategoria: function () {
            axios.post('categorias/update',{ categoria: this.categoria}).then(res => {
               this.categoria.id = "";
               this.categoria.codigo = "";
               this.categoria.nombre = "";
               this.openCategorias();
            });
         },
         saveUpdateCategoria: function(index){
            this.categorias[index].edit = '0';
            axios.post('categorias/update', {categoria: this.categorias[index]}).then(res => {
               console.log(res.data);
            });

         },
         editCategoria: function(index){
            this.categorias[index].edit = '1';
            // console.log(this.categorias[index]);
         },
         openCategorias: function(){
            axios.post('categorias').then(res => {
               this.categorias = res.data;
               console.log(res.data)
            })
         },
         openModal: function () {
            $('#exampleModal').modal('show');
            this.openCategorias();
         },
         productosGetAll: function () {
            axios.post('productos').then(res => {
               this.productos = res.data;
               // console.log(res.data);
            });
            // console.log(this.productos)
         },
         productoNewEstado: function () {
            if (!!!this.productoNewActive == false){
               this.productoNewActive = false;
               this.productoNew.codigo = '';
               this.productoNew.nombre = '';
               this.productoNew.descripcion = '';
               this.productoNew.categoria_id = null;
               this.productoNew.preciosinigv = null;
               this.productoNew.precioconigv = null;
               this.productoNew.igv = null;
               this.productoNew.total = null;
            }else{
               this.productoNewActive = true;
            }
            // console.log(!!!this.productoNewActive)
         },
         productoNewSave: function () {
            axios.post('productos/save', {producto: this.productoNew}).then(res => {
               this.productoNewActive = true;
               // console.log(res.data);
            })
            console.log(this.productoNew)
         },

      },
      directives: {
         select: {
            twoWay: true,
            bind: function (el, binding, vnode) {
               $(el).select2().on("select2:select", (e) => {
                  // v-model looks for
                  //  - an event named "change"
                  //  - a value with property path "$event.target.value"
                  el.dispatchEvent(new Event('change', { target: e.target }));
               });
            },
         }
      },
      mounted() {
         this.productosGetAll();
         this.openCategorias();
      }
   }

</script>
