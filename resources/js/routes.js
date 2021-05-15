import dashboard from './components/dashboard';

import SewaList from './components/Sewa/List';
import SewaCreate from './components/Sewa/Create';
import SewaDetails from './components/Sewa/Details';
import SewaEdit from './components/Sewa/Update';

import PebayaranList from './components/pembayaran/List';
import PembayaranCreate from './components/pembayaran/Create';

export const routes = [{
        name: 'dashboard',
        path: '/vue/dashboard',
        component: dashboard
    },
    //____________________________________
    {
        name: 'SewaList',
        path: '/vue/sewa',
        component: SewaList
    },
    {
        name: 'SewaCreate',
        path: '/vue/sewa/create',
        component: SewaCreate
    },
    {
        name: 'SewaDetails',
        path: '/vue/sewa/detail/:id',
        component: SewaDetails
    },
    {
        name: 'SewaEdit',
        path: '/vue/sewa/edit/:id',
        component: SewaEdit
    },
     //____________________________________
    {
        name: 'PebayaranList',
        path: '/vue/pembayaran',
        component: PebayaranList
    },
    {
        name: 'PembayaranCreate',
        path: '/vue/pembayaran/create',
        component: PembayaranCreate
    },
];