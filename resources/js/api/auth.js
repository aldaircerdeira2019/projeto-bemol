import axios from "axios";

const rota = 'http://localhost:8000/api/';

let api = {
  login(params) {
    return axios.post(rota + "login", params);
  },
  authenticated() {
    return axios.get(rota + "authenticated");
  },
  logout() {
    return axios.post(rota + "logout");
  },
};

export default api;
