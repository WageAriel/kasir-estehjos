import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";

import Dashboard from "./views/Dashboard.vue";
import Forms from "./views/Forms.vue";
import User from "./views/User.vue";
import Question from "./views/Question.vue";
import UIElements from "./views/UIElements.vue";
import Login from "./views/Login.vue";
import Modal from "./views/Modal.vue";
import Card from "./views/Card.vue";
import Blank from "./views/Blank.vue";
import NotFound from "./views/NotFound.vue";
import ProductView from "./views/ProductView.vue";
import CategoryView from "./views/CategoryView.vue";
import KasirView from "./views/KasirView.vue";
import LandingPage from './views/LandingPage.vue' // Import komponen LandingPage
import HomeView from "./views/Page/LandingView.vue";

const routes: RouteRecordRaw[] = [
  {
    path: "/",
    name: "LandingPage",
    component: HomeView,
    meta: { layout: "empty" },
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: { layout: "empty" },
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/product",
    name: "Product",
    component: ProductView,
  },
  {
    path: "/category",
    name: "Category",
    component: CategoryView,
  },
  {
    path: "/forms",
    name: "Forms",
    component: Forms,
  },
  {
    path: "/cards",
    name: "Cards",
    component: Card,
  },
  {
    path: "/user",
    name: "User",
    component: User,
  },
  {
    path: "/question",
    name: "Question",
    component: Question,
  },
  {
    path: "/kasir",
    name: "kasir",
    component: KasirView,
  },
  {
    path: "/modal",
    name: "Modal",
    component: Modal,
  },
  {
    path: "/blank",
    name: "Blank",
    component: Blank,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes: routes,
});

export default router;
