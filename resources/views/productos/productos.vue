<template>
  <div class="card">
    <div class="card-header pl-2 pr-2">
      <div class="d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight">
          <input type="text" class="form-control" placeholder="Buscar Producto">
        </div>
        <div class="bd-highlight">
          <button class="btn btn-primary d-inline-block ml-1"><i class="fa fa-search"></i> Buscar</button>
          <button class="btn btn-secondary d-inline-block mr-4" @click="openModal"><i class="fa fa-list"></i> Categorias</button>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Categorias de Productos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-sm table-striped">
                <tr>
                  <td>#</td>
                  <td>Codigo</td>
                  <td>Nombre</td>
                  <td>Acciones</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>DGTRF4587</td>
                  <td>Arroz Costenio Graneadito 5 KG</td>
                  <td class="m-0">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>DGTRF4587</td>
                  <td>Arroz Costenio Graneadito 5 KG</td>
                  <td class="m-0">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
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

      <!-- Tabla Productos -->
      <table class="table table-sm table-striped">
        <thead>
        <tr>
          <th scope="col">Codigo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio con IGV</th>
          <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td class="py-sm-1">
            <button class="btn btn-primary btn-sm p-1"><i class="fa fa-edit"></i> Editar</button>
          </td>
        </tr>
        <tr>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td>@fat</td>
        </tr>
        <tr>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
          <td>@twitter</td>
        </tr>
        </tbody>
      </table>

    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {

    }
  },
  methods: {
    openModal: function () {
      $('#exampleModal').modal('show');
    }
  }
}
</script>
