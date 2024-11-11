import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '@/Pages/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      title: 'Home'
    }
  },
  {
    meta: {
      title: 'Dashboard'
    },
    path: '/dashboard',
    name: 'dashboard',
    component: Home
  },
  {
    meta: {
      title: 'Produk'
    },
    path: '/produk',
    name: 'produk',
    component: () => import('@/Pages/ProdukView.vue')
  },
  {
    meta: {
      title: 'Kategori'
    },
    path: '/kategori',
    name: 'kategori',
    component: () => import('@/Pages/KategoriView.vue')
  },
  {
    meta: {
      title: 'Transaction'
    },
    path: '/transaction',
    name: 'transaction',
    component: () => import('@/Pages/TransactionView.vue')
  },
  {
    meta: {
      title: 'Transaction Detail'
    },
    path: '/transaction-detail',
    name: 'transaction-detail',
    component: () => import('@/Pages/TransactionDetailView.vue')
  },
  {
    meta: {
      title: 'Kasir'
    },
    path: '/kasir',
    name: 'kasir',
    component: () => import('@/Pages/KasirView.vue')
  }
];


const router = createRouter({
  history: createWebHashHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || { top: 0 }
  }
})

export default router
