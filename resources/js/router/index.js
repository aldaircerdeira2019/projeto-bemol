import Vue from "vue";
import VueRouter from "vue-router";
import Home from '../views/home/Home.vue';
import ClientCreate from '../views/client/ClientCreate.vue';


Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/cliente/registrar',
    name: 'client.create',
    component: ClientCreate
  },
];

const router = new VueRouter({
  mode: "history",
  base: '/spa',
  routes
});


export default router
