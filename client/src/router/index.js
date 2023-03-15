import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ProductView from "../views/ProductView.vue";
import ContactView from "../views/ContactView.vue";
import DetailView from "../views/DetailView.vue";
import WishlistView from "../views/WishlistView.vue";
import CartView from "../views/CartView.vue";
import SignInView from "../views/auth/SignInView.vue";
import SignUpView from "../views/auth/SignUpView.vue";
import ChangePassView from "../views/auth/ChangePassView.vue";
import PageNotFound from "../views/PageNotFound.vue";
import ProfileView from "../views/ProfileView.vue";
import DetailOrderView from "../views/DetailOrderView.vue";
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),

  routes: [
    {
      path: "/",
      name: "home",
      meta: {
        title: "Home",
      },
      component: HomeView,
    },
    {
      path: "/products",
      name: "product",
      meta: {
        title: "Product",
      },
      component: ProductView,
    },
    {
      path: "/products/:id",
      name: "detail",
      meta: {
        title: "Detail",
      },
      component: DetailView,
    },
    {
      path: "/sign-in",
      name: "sign-in",
      meta: {
        title: "Sing In",
      },
      component: SignInView,
    },
    {
      path: "/sign-up",
      name: "sign-up",
      meta: {
        title: "Sign Up",
      },
      component: SignUpView,
    },
    {
      path: "/change-password",
      name: "change-password",
      meta: {
        title: "Change Password",
      },
      component: ChangePassView,
    },
    {
      path: "/carts",
      name: "cart",
      meta: {
        title: "Cart",
      },
      component: CartView,
    },
    {
      path: "/wishlists",
      name: "wishlist",
      meta: {
        title: "Wishlish",
      },
      component: WishlistView,
    },
    {
      path: "/contacts",
      name: "contact",
      meta: {
        title: "Contact",
      },
      component: ContactView,
    },
    {
      path: "/profiles",
      name: "profile",
      meta: {
        title: "Profile",
      },
      component: ProfileView,
    },
    {
      path: "/profiles/:id",
      name: "detail-order",
      meta: {
        title: "Detail Order",
      },
      component: DetailOrderView,
    },
    {
      path: "/:pathMatch(.*)*",
      name: "PageNotFound",
      meta: {
        title: "PageNotFound",
      },
      component: PageNotFound,
    },
  ],
});

export default router;

router.beforeEach((to, from, next) => {
  const publicPages = [
    "home",
    "product",
    "detail",
    "sign-in",
    "sign-up",
    "contact",
  ];
  const authRequired = !publicPages.includes(to.name);
  const loggedIn = localStorage.getItem("user");
  if (authRequired && !loggedIn) {
    next("/sign-in");
  } else {
    next();
  }
  document.title =
    `${to.meta.title} | We are the authorized reseller of ASUS, DXRACER, Razer and Lenovo gaming product in Cambodia. We focus on professional gaming products only.` ||
    "E-commerce";
});
