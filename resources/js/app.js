// Bootstrap
import './bootstrap';
import '@popperjs/core';

// window.phoenix = window.phoenix || {};
// window.phoenix.utils = window.phoenix.utils || {};

// Font Awesome e Iconos
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@iconscout/unicons/css/line.css';

// Dependencias requeridas por Phoenix Template
import _ from 'lodash';
window._ = _;

// Chart.js
import Chart from 'chart.js/auto';
window.Chart = Chart;

// Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
window.Swiper = Swiper;

// ECharts
import * as echarts from 'echarts';
window.echarts = echarts;

// Day.js para manejo de fechas (requerido por Phoenix)
import dayjs from 'dayjs';
window.dayjs = dayjs;

import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// Plugins
import cookiesPlugin from '@/plugins/cookiePlugin';
import feather from 'feather-icons';

const appName = import.meta.env.VITE_APP_NAME || 'TOEKN WRC';

createInertiaApp({
  title: title => `${title} - ${appName}`,
  resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const vueApp = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, props.initialPage.props.ziggy)
      // .use(cookiesPlugin)
    vueApp.mount(el)

    feather.replace();
    router.on('navigate', () => feather.replace());

  },
  progress: { color: '#f1d600' },
});