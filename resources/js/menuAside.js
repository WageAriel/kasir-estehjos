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

export default [{
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
        label: 'Transaksi',
        icon: mdiViewList,
        menu: [
        {
            route: 'transaksi',
            label: 'Transaksi',
            icon: mdiTable
        },
        {
            route: 'detail-transaksi',
            label: 'Detail Transaksi',
            icon: mdiTable
        },
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
