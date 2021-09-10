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
                    <i class="bi bi-arrow-right"></i> Cadastro
                  </h5>
                </div>
                <div class="col-sm-4 text-right">
                  <button @click.prevent="createClient" class="btn btn-success btn-sm">
                    <i class="bi bi-save"></i> Salvar
                  </button>
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
                      <div class="form-group row">
                        <label
                          for="cpf"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          CPF</label
                        >
                        <div class="col-md-6">
                          <the-mask
                            type="text"
                            :class="`form-control ${
                              errors.cpf ? 'is-invalid' : ''
                            }`"
                            id="cpf"
                            :mask="'###.###.###-##'"
                            :masked="true"
                            :placeholder="'000.000.000-00'"
                            v-model="form.cpf"
                            autofocus
                          />
                          <div class="invalid-feedback" v-if="errors.cpf">
                            {{ errors.cpf[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="name"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Nome</label
                        >
                        <div class="col-md-6">
                          <input
                            type="text"
                            :class="`form-control ${
                              errors.name ? 'is-invalid' : ''
                            }`"
                            id="name"
                            v-model="form.name"
                            autofocus
                          />
                          <div class="invalid-feedback" v-if="errors.name">
                            {{ errors.name[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="birth"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Data Nasc.</label
                        >
                        <div class="col-md-6">
                          <the-mask
                            type="text"
                            :class="`form-control ${
                              errors.birth ? 'is-invalid' : ''
                            }`"
                            id="birth"
                            :mask="'##/##/####'"
                            :masked="true"
                            :placeholder="'dd/mm/yyyy'"
                            v-model="form.birth"
                            autofocus
                          />
                          <div class="invalid-feedback" v-if="errors.birth">
                            {{ errors.birth[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="phone"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Telefone</label
                        >
                        <div class="col-md-6">
                          <the-mask
                            type="text"
                            :class="`form-control ${
                              errors.phone ? 'is-invalid' : ''
                            }`"
                            id="phone"
                            :mask="'(##) #####-####'"
                            :masked="true"
                            v-model="form.phone"
                            :placeholder="'(00) 00000-0000'"
                            autofocus
                          />
                          <div class="invalid-feedback" v-if="errors.phone">
                            {{ errors.phone[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="email"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Email</label
                        >
                        <div class="col-md-6">
                          <input
                            type="email"
                            :class="`form-control ${
                              errors.email ? 'is-invalid' : ''
                            }`"
                            id="email"
                            v-model="form.email"
                          />
                          <div class="invalid-feedback" v-if="errors.email">
                            {{ errors.email[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="password"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Senha</label
                        >
                        <div class="col-md-6">
                          <input
                            type="password"
                            :class="`form-control ${
                              errors.password ? 'is-invalid' : ''
                            }`"
                            id="password"
                            v-model="form.password"
                          />
                          <div class="invalid-feedback" v-if="errors.password">
                            {{ errors.password[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="password_confirmation"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Confirmar senha</label
                        >
                        <div class="col-md-6">
                          <input
                            type="password"
                            :class="`form-control ${
                              errors.password_confirmation ? 'is-invalid' : ''
                            }`"
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                          />
                          <div
                            class="invalid-feedback"
                            v-if="errors.password_confirmation"
                          >
                            {{ errors.password_confirmation[0] }}
                          </div>
                        </div>
                      </div>
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
                      <div class="form-group row">
                        <label
                          for="cpf"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          CEP</label
                        >
                        <div class="col-md-6">
                          <div class="input-group">
                            <the-mask
                              type="text"
                              :class="`form-control ${
                                errors.cep ? 'is-invalid' : ''
                              }`"
                              id="cep"
                              :mask="'#####-###'"
                              :masked="true"
                              :placeholder="'00000-000'"
                              v-model="form.cep"
                              autofocus
                            />
                            <div class="invalid-feedback" v-if="errors.cep">
                              {{ errors.cep[0] }}
                            </div>

                            <div class="input-group-append">
                              <button
                                @click.prevent="getCep(form.cep)"
                                class="input-group-text"
                              >
                                buscar
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="logradouro"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Rua</label
                        >
                        <div class="col-md-6">
                          <input
                            type="text"
                            :class="`form-control ${
                              errors.logradouro ? 'is-invalid' : ''
                            }`"
                            id="logradouro"
                            v-model="form.logradouro"
                            autofocus
                          />
                          <div
                            class="invalid-feedback"
                            v-if="errors.logradouro"
                          >
                            {{ errors.logradouro[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="bairro"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Bairro</label
                        >
                        <div class="col-md-6">
                          <input
                            type="text"
                            :class="`form-control ${
                              errors.bairro ? 'is-invalid' : ''
                            }`"
                            id="bairro"
                            v-model="form.bairro"
                            autofocus
                          />
                          <div class="invalid-feedback" v-if="errors.bairro">
                            {{ errors.bairro[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="numero"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Numero</label
                        >
                        <div class="col-md-6">
                          <the-mask
                            type="text"
                            :class="`form-control ${
                              errors.numero ? 'is-invalid' : ''
                            }`"
                            :mask="'####'"
                            :masked="true"
                            id="numero"
                            v-model="form.numero"
                            autofocus
                          />
                          <div class="invalid-feedback" v-if="errors.numero">
                            {{ errors.numero[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="complemento"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Complemento</label
                        >
                        <div class="col-md-6">
                          <input
                            type="text"
                            :class="`form-control ${
                              errors.complemento ? 'is-invalid' : ''
                            }`"
                            id="complemento"
                            v-model="form.complemento"
                            autofocus
                          />
                          <div
                            class="invalid-feedback"
                            v-if="errors.complemento"
                          >
                            {{ errors.complemento[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="localidade"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          Cidade</label
                        >
                        <div class="col-md-6">
                          <input
                            type="text"
                            :class="`form-control ${
                              errors.localidade ? 'is-invalid' : ''
                            }`"
                            id="localidade"
                            v-model="form.localidade"
                            autofocus
                          />
                          <div
                            class="invalid-feedback"
                            v-if="errors.localidade"
                          >
                            {{ errors.localidade[0] }}
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="uf"
                          class="col-md-4 col-form-label text-md-right"
                        >
                          UF</label
                        >
                        <div class="col-md-6">
                          <the-mask
                            type="text"
                            :class="`form-control ${
                              errors.uf ? 'is-invalid' : ''
                            }`"
                            :mask="'AA'"
                            :masked="true"
                            id="uf"
                            v-model="form.uf"
                            autofocus
                          />
                          <div class="invalid-feedback" v-if="errors.uf">
                            {{ errors.uf[0] }}
                          </div>
                        </div>
                      </div>
                    </div>
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
import Menu from "../components/Menu.vue";
import apiAdmin from "../../../api/admin";
import { TheMask } from "vue-the-mask";
export default {
  name: "ClientCreateAdmin",
  components: { Menu, TheMask },
  data() {
    return {
      form: {
        cpf: "",
        name: "",
        birth: "",
        phone: "",
        email: "",
        password: "",
        password_confirmation: "",
        cep: "",
        logradouro: "",
        bairro: "",
        complemento: "",
        numero: "",
        localidade: "",
        uf: "",
      },
      errors: [],
    };
  },
  methods: {
    getCep(string) {
      if (string.length < 9) {
        this.$toastr.e("CEP imcompleto");
      } else {
        const cep = string.replace(/[^0-9]/g, "");
        apiAdmin
          .getCep(cep)
          .then((r) => {
            this.form.logradouro = r.data.logradouro;
            this.form.bairro = r.data.bairro;
            this.form.complemento = r.data.complemento;
            this.form.localidade = r.data.localidade;
            this.form.uf = r.data.uf;
          })
          .catch(() => {
            this.$toastr.e(
              "endereço não encontrado, informe o endereço manualmento."
            );
          });
      }
    },

    createClient() {
        apiAdmin
        .createCliente(this.form)
        .then(() => {
          this.$toastr.s("Cadastrado com sucesso!");
           this.voltar();
        })
        .catch((error) => {
          if (error.response.data.errors) {
            this.errors = error.response.data.errors;
          } else {
            this.$toastr.e(`${error.response.data.message}`);
          }
        });
    },

    async voltar() {
      await new Promise((t) => setTimeout(t, 2000));
      window.history.back();
    },
  },
};
</script>
