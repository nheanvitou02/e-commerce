import axios from "axios";
import authHeader from "./auth-header";
import { HTTP } from "./config";

class userService {
  getPublic(url) {
    return axios.get(HTTP + url);
  }
  postPublic(url, payload) {
    return axios.post(HTTP + url, payload);
  }
  postPrivate(url, payload) {
    return axios.post(HTTP + url, payload, { headers: authHeader() });
  }
  getPrivate(url) {
    return axios.get(HTTP + url, { headers: authHeader() });
  }
}

export default new userService();
