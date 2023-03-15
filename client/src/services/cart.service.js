import axios from "axios";
import { HTTP } from "./config";
import authHeader from "./auth-header";

class CartService {
  addCart(cart) {
    return axios.post(HTTP + "/cart", cart, { headers: authHeader() });
  }

  getCart() {
    return axios.get(HTTP + "/cart", { headers: authHeader() }).then((res) => {
      if (res.data) {
        localStorage.setItem("cart", JSON.stringify(res.data));
      }
      return res.data;
    });
  }
}

export default new CartService();
