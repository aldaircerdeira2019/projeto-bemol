require("./bootstrap");
import App from "./views/main/App";
import router from "./router/index";
import Toastr from "./plugin/vue-toastr";
import DateFormat from "./plugin/vue-filter-date-format";
import SimpleAlert from "./plugin/alert";

window.Vue = require("vue").default;
Vue.prototype.$acl = false;
Vue.component("pagination", require("laravel-vue-pagination"));

const app = new Vue({
  el: "#app",
  components: { App },
  router,
  Toastr,
  DateFormat,
  SimpleAlert
});
