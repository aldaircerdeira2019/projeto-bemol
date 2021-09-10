<template>
  <div>
    <div class="container">
      <div class="row">
        <Menu />
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-8">
                  <h5 class="mt-10 text-muted">
                    Administração <i class="bi bi-arrow-right"></i> Clientes
                  </h5>
                </div>
                <div class="col-sm-4 text-right">
                  <button class="btn btn-success btn-sm">
                    <i class="bi bi-save"></i> Novo
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-10">
                  <div class="input-group">
                    <label for="01" class="input-group-text">CPF</label>
                    <the-mask
                      type="text"
                      :mask="'###.###.###-##'"
                      :masked="true"
                      :placeholder="'000.000.000-00'"
                      v-model="params.cpf"
                      class="form-control"
                      id="01"
                    />
                    <label for="02" class="input-group-text">Nome</label>
                    <input
                      type="text"
                      v-model="params.name"
                      class="form-control"
                      id="02"
                    />
                    <div class="input-group-append">
                      <button
                        @click.prevent="getClients"
                        class="input-group-text btn btn-success"
                      >
                        buscar
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">CPF</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Data nasc.</th>
                      <th scope="col">Cadastrado</th>
                      <th scope="col">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(client, index) in clients.data"
                      :key="client.id"
                    >
                      <td scope="row">{{ index + 1 }}</td>
                      <td>{{ client.cpf }}</td>
                      <td>{{ client.user.name }}</td>
                      <td>
                        {{ new Date(client.birth) | dateFormat("DD/MM/YYYY") }}
                      </td>
                      <td>
                        {{
                          new Date(client.created_at) | dateFormat("DD/MM/YYYY")
                        }}
                      </td>
                      <td>
                        <div class="dropdown">
                          <button
                            class="btn btn-success dropdown-toggle"
                            type="button"
                            id="dropdownMenu2"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="bi bi-chevron-double-down"></i>
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenu2"
                          >
                            <button class="dropdown-item" type="button">
                              <i class="bi bi-eye-fill"></i>
                              Vizualizar
                            </button>
                            <button class="dropdown-item" type="button">
                              <i class="bi bi-pencil-square"></i>
                              Editar
                            </button>
                            <button class="dropdown-item" type="button">
                              <i class="bi bi-trash-fill"></i>
                              Excluir
                            </button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <pagination
                :data="clients"
                @pagination-change-page="getClients"
                :limit="2"
              >
                <span slot="prev-nav"
                  ><i class="bi bi-chevron-double-left"></i
                ></span>
                <span slot="next-nav"
                  ><i class="bi bi-chevron-double-right"></i
                ></span>
              </pagination>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Menu from "../components/Menu.vue";
import { TheMask } from "vue-the-mask";
import apiAdmin from "../../../api/admin";
export default {
  name: "Clients",
  components: { Menu, TheMask },
  data() {
    return {
      clients: {},
      params: {
        name: "",
        cpf: "",
        page: 1,
      },
    };
  },
  mounted() {
    this.getClients();
  },
  methods: {
    getClients(page = 1) {
      this.params.page = page;
      apiAdmin
        .getClients(this.params)
        .then((r) => {
          this.clients = r.data;
        })
        .catch((error) => {
          this.$toastr.e(`${error.response.data.message}`);
        });
    },
  },
};
</script>
