import axios from "axios";
import { HTTP } from "./config";
import authHeader from "./auth-header";

class NotiService {
  getNoti() {
    return axios.get(HTTP + "/invoice-tr", { headers: authHeader() }).then((res) => {
      return res.data;
    });
  }
}

export default new NotiService();
