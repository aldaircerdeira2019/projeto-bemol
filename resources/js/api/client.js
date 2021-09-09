import axios from "axios";

const rota = 'http://localhost:8000/api/';

let api = {

  createCliente(params) {
    return axios.post(rota + "cliente", params);
  },

  showCliente(id) {
    return axios.get(rota + 'cliente/' + id);
  },

  editCliente(id) {
    return axios.get(rota + 'cliente/' + id + '/edit');
  },

  updateCliente(id, params) {
    return axios.put(rota + 'cliente/' + id , params);
  },


  getCep(cep) {
    return axios.get(`https://viacep.com.br/ws/${cep}/json/`);
  },
};

export default api;
