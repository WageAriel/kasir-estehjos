import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiLock,
  mdiAlertCircle,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide,
  mdiResponsive,
  mdiPalette,
  mdiReact
} from '@mdi/js'

export default [
  {
    route: 'dashboard',
    icon: mdiMonitor,
    label: 'Dashboard'
  },
  {
    route: 'produk',
    label: 'Produk',
    icon: mdiTable
  },
  {
    route: 'kasir',
    label: 'Kasir',
    icon: mdiTable
  },
  {
    route: 'kategori',
    label: 'Kategori',
    icon: mdiTable
  },
  {
    route: 'transaction',
    label: 'Transaction',
    icon: mdiTable
  },
  {
    route: 'transactionDetail',
    label: 'Transaction Detail',
    icon: mdiTable
  },
 
  {
    label: 'Dropdown',
    icon: mdiViewList,
    menu: [
      {
        label: 'Item One'
      },
      {
        label: 'Item Two'
      }
    ]
  },
  {
    href: 'https://github.com/justboil/admin-one-vue-tailwind',
    label: 'GitHub',
    icon: mdiGithub,
    target: '_blank'
  },
  {
    href: 'https://github.com/justboil/admin-one-react-tailwind',
    label: 'React version',
    icon: mdiReact,
    target: '_blank'
  }
]
