import { createStore } from "vuex";
import AuthService from "../services/auth.service";
import cartService from "../services/cart.service";
import notiService from "../services/noti.service";
import wishlistService from "../services/wishlist.service";

const user = JSON.parse(localStorage.getItem("user"));
const wishlist = JSON.parse(localStorage.getItem("wishlist"));
const cart = JSON.parse(localStorage.getItem("cart"));

const initialState = user
  ? {
      status: { loggedIn: true },
      user: user.user,
      cart: cart,
      wishlist: wishlist,
      noti: 0,
    }
  : {
      status: { loggedIn: false },
      user: { name: "", email: "" },
      cart: [],
      wishlist: [],
      noti: 0,
    };

const store = createStore({
  namespaced: true,
  state: initialState,
  actions: {
    login({ commit }, user) {
      return AuthService.login(user).then(
        (user) => {
          commit("loginSuccess", user);
          return Promise.resolve(user);
        },
        (error) => {
          commit("loginFailure");
          return Promise.reject(error);
        }
      );
    },
    logout({ commit }) {
      AuthService.logout();
      commit("logout");
    },
    register({ commit }, user) {
      return AuthService.register(user).then(
        (user) => {
          commit("registerSuccess", user);
          return Promise.resolve(user);
        },
        (error) => {
          commit("registerFailure");
          return Promise.reject(error);
        }
      );
    },
    addWishlist({ commit }, wishlist) {
      return wishlistService.addWishlist(wishlist);
    },
    getWishlist({ commit }) {
      return wishlistService.getWishlist().then((wishlist) => {
        commit("getWishlistSuccess", wishlist);
        return Promise.resolve(wishlist);
      });
    },
    addCart({ commit }, cart) {
      return cartService.addCart(cart);
    },
    getCart({ commit }) {
      return cartService.getCart().then((cart) => {
        commit("getCartSuccess", cart);
        return Promise.resolve(cart);
      });
    },
    getNoti({ commit }) {
      return notiService.getNoti().then((noti) => {
        commit("getNotiSuccess", noti);
        return Promise.resolve(noti);
      });
    },
  },
  mutations: {
    loginSuccess(state, user) {
      state.status.loggedIn = true;
      state.user = user;
    },
    loginFailure(state) {
      state.status.loggedIn = false;
    },
    logout(state) {
      state.status.loggedIn = false;
      state.user = { name: "", email: "" };
      state.wishlist = [];
      state.cart = [];
      state.noti = 0;
    },
    registerSuccess(state, user) {
      state.status.loggedIn = true;
      state.user = user;
    },
    registerFailure(state) {
      state.status.loggedIn = false;
    },
    getWishlistSuccess(state, wishlist) {
      state.wishlist = wishlist;
    },
    getCartSuccess(state, cart) {
      state.cart = cart;
    },
    getNotiSuccess(state, noti) {
      state.noti = noti;
    },
  },
});

export default store;
