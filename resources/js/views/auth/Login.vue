<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Entrar</div>

          <div class="card-body">
            <form>
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
                    :class="`form-control ${errors.email ? 'is-invalid' : ''}`"
                    id="email"
                    v-model="form.email"
                    autofocus
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

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button
                    @click.prevent="loginUser"
                    class="btn btn-success btn-sm"
                  >
                    Entrar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import api from "../../api/auth";
export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    loginUser() {
      api
        .login(this.form)
        .then(() => {
          window.location.href = "/#/";
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          this.form.password = null;
        });
    },
  },
};
</script>
