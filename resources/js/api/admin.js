import axios from "axios";

const rota = "http://localhost:8000/api/";

let api = {
  getClients(params) {
    return axios.get(rota + "admin/clients", { params });
  },
  showCliente(id) {
    return axios.get(rota + "admin/clients/" + id);
  },

  getCep(cep) {
    return axios.get(`https://viacep.com.br/ws/${cep}/json/`);
  }
};

export default api;
