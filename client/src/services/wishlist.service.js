import axios from "axios";
import { HTTP } from "./config";
import authHeader from "./auth-header";

class WishlistService {
  addWishlist(wishlist) {
    return axios.post(HTTP + "/wishlist", wishlist, { headers: authHeader() });
  }

  getWishlist() {
    return axios.get(HTTP + "/wishlist", { headers: authHeader() }).then((res) => {
      if (res.data) {
        localStorage.setItem("wishlist", JSON.stringify(res.data));
      }
      return res.data;
    });
  }
}

export default new WishlistService();
