import Vue from "vue";
import VueFilterDateFormat from "vue-filter-date-format";

const DateFormat = Vue.use(VueFilterDateFormat, {
  dayOfWeekNames: [
    "Domingo",
    "Segunda",
    "Terça",
    "Quarta",
    "Quinta",
    "Sexta",
    "Sábado"
  ],
  dayOfWeekNamesShort: ["Do", "Se", "Te", "Qa", "Qi", "Sx", "Sa"],
  monthNames: [
    "Janeiro",
    "Fevereiro",
    "Março",
    "Abril",
    "Maio",
    "Junho",
    "Julho",
    "Agosto",
    "Setembro",
    "Outubro",
    "Novembro",
    "Dezembro"
  ],
  monthNamesShort: [
    "jan",
    "fev",
    "mar",
    "abr",
    "maio",
    "jun",
    "jul",
    "ago",
    "set",
    "out",
    "nov",
    "dez"
  ]
});

export default DateFormat;
