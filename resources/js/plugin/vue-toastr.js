import Vue from "vue";
import VueToastr from "vue-toastr";

const Toastr = Vue.use(VueToastr, {
  defaultTimeout: 5000,
  defaultPosition: "toast-bottom-right",
  defaultCloseOnHover: true,
  defaultClassNames: ["animated", "zoomInUp"]
});

export default Toastr;
