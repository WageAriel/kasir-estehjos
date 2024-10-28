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

const routes: RouteRecordRaw[] = [
  {
    path: "/",
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
    path: "/ui-elements",
    name: "UIElements",
    component: UIElements,
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
