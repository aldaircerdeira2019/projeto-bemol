import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/home/Home.vue";
import ClientCreate from "../views/client/ClientCreate.vue";
import ClientShow from "../views/client/ClientShow.vue";
import ClientEdit from "../views/client/ClientEdit.vue";
import Login from "../views/auth/Login.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/login",
    name: "login",
    component: Login
  },
  {
    path: "/cliente/registrar",
    name: "client.create",
    component: ClientCreate
  },
  {
    path: "/cliente/:id",
    name: "client.show",
    component: ClientShow,
    meta: { authOnly: true }
  },
  {
    path: "/cliente/editar/:id",
    name: "client.edit",
    component: ClientEdit,
    meta: { authOnly: true }
  }
];

const router = new VueRouter({
  mode: "history",
  base: "/spa",
  routes
});

function isLoggedIn() {
  return localStorage.getItem("auth");
}

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.authOnly)) {
    if (!isLoggedIn()) {
      next({
        name: "login",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
