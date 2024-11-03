import { createRouter, createWebHistory } from "vue-router";

import Dashboard from "@/Pages/Dashboard.vue";
import Forms from "@/Pages/Forms.vue";
import User from "@/Pages/User.vue";
import Question from "@/Pages/Question.vue";
import UIElements from "@/Pages/UIElements.vue";
import Login from "@/Pages/Login.vue";
import Modal from "@/Pages/Modal.vue";
import Card from "@/Pages/Card.vue";
import Blank from "@/Pages/Blank.vue";
// import NotFound from "./views/NotFound.vue";

const routes = [
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
  routes,
});

export default router;
