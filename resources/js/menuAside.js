import {
  mdiMonitor,
  mdiSquareEditOutline,
  mdiViewList,
  mdiResponsive,
  mdiBankTransfer,
} from '@mdi/js'

export default [
  {
    to: '/dashboard',
    icon: mdiMonitor,
    label: 'Dashboard'
  },
  {
    to: '/produk',
    icon: mdiMonitor,
    label: 'Produk'
  },
  {
    to: '/kategori',
    label: 'Kategori',
    icon: mdiSquareEditOutline
  },
  {
    label: 'Transaksi',
    icon: mdiViewList,
    menu: [
      {
        to: '/transaction',
        label: 'Transaction',
        icon: mdiBankTransfer
      },
      {
        to: '/transaction-detail',
        label: 'Detail',
        icon: mdiBankTransfer
      }
    ]
  },
  
  {
    to: '/kasir',
    label: 'Kasir',
    icon: mdiResponsive
  },
]
