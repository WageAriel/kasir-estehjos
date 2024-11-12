import { createRouter, createWebHashHistory } from 'vue-router'
import Landing from '../Pages/Views/Page/LandingView.vue'
import Pemesanan from '../Pages/Views/Page/pemesananView.vue'
import Home from '../Pages/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'landing',
    component: Landing,
    meta: {
      title: 'Landing'
    }
  },
  {
    path: '/pemesanan',
    name: 'pemesanan',
    component: Pemesanan,
    meta: {
      title: 'Pemesanan'
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
