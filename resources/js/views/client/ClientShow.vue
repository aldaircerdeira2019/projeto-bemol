<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-8">
                <h5 class="mt-10 text-muted">
                  Cliente <i class="bi bi-arrow-right"></i> Perfil
                </h5>
              </div>
              <div class="col-sm-4 text-right">
                <router-link :to="{ name: 'client.edit',  params:{'id': client.id}}" class="btn btn-success btn-sm">
                  <i class="bi bi-pencil-square"></i> Editar
                </router-link>
              </div>
            </div>
          </div>
          <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a
                  class="nav-link active"
                  id="nav-01-tab"
                  data-toggle="tab"
                  href="#nav-01"
                  role="tab"
                  aria-controls="nav-01"
                  aria-selected="true"
                  >Meus Dados</a
                >
                <a
                  class="nav-link"
                  id="nav-02-tab"
                  data-toggle="tab"
                  href="#nav-02"
                  role="tab"
                  aria-controls="nav-02"
                  aria-selected="false"
                  >Endereço</a
                >
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div
                class="tab-pane fade show active"
                id="nav-01"
                role="tabpanel"
                aria-labelledby="nav-01-tab"
              >
                <div class="card py-4">
                  <div class="card-body">
                    <dl>
                      <dt>Nome:</dt>
                      <dd>{{ user.name }}</dd>

                      <dt>CPF:</dt>
                      <dd>{{ client.cpf }}</dd>

                      <dt>Data de nascimento:</dt>
                      <dd>{{ new Date(client.birth) | dateFormat("DD/MM/YYYY")}}</dd>

                      <dt>Telefone:</dt>
                      <dd>{{ client.phone }}</dd>

                      <dt>Email:</dt>
                      <dd>{{ user.email }}</dd>

                      <dt>Cadastrado em:</dt>
                      <dd>{{ new Date(client.created_at) | dateFormat("DD/MM/YYYY")}}</dd>
                    </dl>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="nav-02"
                role="tabpanel"
                aria-labelledby="nav-02-tab"
              >
                <div class="card">
                  <div class="card-body">
                    <dl>
                      <dt>CEP:</dt>
                      <dd>{{ addresse.cep }}</dd>

                      <dt>Rua:</dt>
                      <dd>{{ addresse.logradouro }}</dd>

                      <dt>Bairro:</dt>
                      <dd>{{ addresse.bairro }}</dd>

                      <dt>Numero:</dt>
                      <dd>{{ addresse.numero }}</dd>

                      <dt>Complemento:</dt>
                      <dd>{{ addresse.complemento }}</dd>

                      <dt>Cidade:</dt>
                      <dd>{{ addresse.localidade }}</dd>

                      <dt>Uf:</dt>
                      <dd>{{ addresse.uf }}</dd>

                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import api from "../../api/client";
export default {
  name: "ClientShow",
  data() {
    return {
      client: {},
      user: {},
      addresse: {},
    };
  },
  mounted() {
    this.getShow();
  },

  methods: {
    getShow() {
      api
        .showCliente(this.$route.params.id)
        .then((response) => {
          this.client = response.data;
          this.user = response.data.user;
          this.addresse = response.data.addresse;
        })
        .catch(() => {
          this.$toastr.e("Ocorreu um erro.");
        });
    },
  },
};
</script>
