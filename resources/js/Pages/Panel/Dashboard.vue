<script setup>
import '@template/vendor/echarts/echarts.min.js';
import '@template/vendor/chart/chart.umd.js';
// import '@template/assets/js/dashboards/stock-dashboard.js';
import '@template/vendor/swiper/swiper-bundle.min.js';

import AppLayout from '@/Layouts/AppLayout.vue';
import imgBrand3Apple from '@template/assets/img/brand3/apple.png';
import imgBramd3LightApple from '@template/assets/img/brand3/light_apple_logo.svg';
import imgBrand3Tesla from '@template/assets/img/brand3/tesla.png';
import imgBrand3DarkTesla from '@template/assets/img/brand3/dark_tesla.png';
import imgBrand3Nvidia from '@template/assets/img/brand3/nvidia.png';
import imgBrand3Google from '@template/assets/img/brand3/google.png';
import imgBrand3Amd from '@template/assets/img/brand3/amd.png';
import imgBrand3DarkAmd from '@template/assets/img/brand3/dark_amd.png';
import imgBrand3Microsoft from '@template/assets/img/brand3/microsoft.png';
import imgBrand3Intel from '@template/assets/img/brand3/intel.png';
import imgBrand3DarkIntel from '@template/assets/img/brand3/dark_intel.png';
import { onMounted, ref } from 'vue';

const isPhoenixReady = ref(false);

onMounted(() => {
  const checkPhoenix = () => {
    if (window.phoenix && window.phoenix.utils) {
      isPhoenixReady.value = true;
      loadStockDashboard();
    } else {
      setTimeout(checkPhoenix, 100);
    }
  };

  checkPhoenix();
});

const loadStockDashboard = () => {
  const script = document.createElement('script');
  script.src = '/assets/js/dashboards/stock-dashboard.js';
  script.onload = () => {
    // console.log('Stock dashboard loaded successfully');
  };
  document.body.appendChild(script);
};

</script>

<template>
  <AppLayout title="Trining now">
    <div class="contents">
      <h2 class="mb-4 text-body-emphasis">Stock trading</h2>

      <div class="swiper-theme-container w-100">
        <div class="swiper theme-slider" data-swiper='{"spaceBetween":24,"loop":true,"centeredSlides":true,"slidesPerView":"auto","autoplay":{"delay":0},"freeMode":true,"speed":6500,"grabCursor":true}'>
          <div class="swiper-wrapper swiper-continuous-autoplay">
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">S&amp;P 500</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-success">
                          +0.97%
                          <span class="ms-1 fas fa-chevron-up"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$5,751.13</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-chart" data-echarts='{"data":[70,50,85,45,200,193,196,210,198,210,103,120,84,95,130,123,214,245,287,348,356,390]}'>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">Dow 30</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-danger">
                          -0.5%
                          <span class="ms-1 fas fa-chevron-down"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$42,080.37</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-mixed-chart" data-echarts='{"data":[-100,190,200,-200,-190,300,-110,100,-100,250,200,190,-80,50,40,200,-200,200,150,160,300,-100]}'>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">Nasdaq</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-success">
                          +1.45%
                          <span class="ms-1 fas fa-chevron-up"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$42,080.37</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-chart" data-echarts='{"data":[400,450,500,490,600,550,400,350,200,250,180,350,320,330,320,450,480,350,345,200,320,400]}'></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">FTSE 100</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-danger">
                          -1.36%
                          <span class="ms-1 fas fa-chevron-down"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$8,190.61</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-inverted-chart" data-echarts='{"data":[-500,-300,-250,-280,-150,-250,-300,-180,-145,-250,-46,-250,-90,-80,-85,-150,-250,-180,-175,-50]}'></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">Crude Oil</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-danger">
                          -0.64%
                          <span class="ms-1 fas fa-chevron-down"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$6,705.13</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-inverted-chart" data-echarts='{"data":[-600,-500,-450,-480,-450,-350,-400,-680,-145,-650,-546,-450,-590,-380,-585,-250,-550,-680,-375,-250]}'></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">Russell</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-success">
                          +9.09%
                          <span class="ms-1 fas fa-chevron-up"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$2,275.88</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-chart" data-echarts='{"data":[500,450,600,690,700,550,400,350,200,250,180,350,320,330,320,450,480,450,445,300,420,600]}'></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">VIX</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-danger">
                          -9.99%
                          <span class="ms-1 fas fa-chevron-down"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$24.28</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-inverted-chart" data-echarts='{"data":[-600,-500,-450,-480,-450,-350,-400,-680,-145,-650,-546,-450,-590,-380,-585,-250,-550,-680,-375,-250]}'> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide stock-overview-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-between-center gap-2 gap-lg-3">
                    <div class="flex-1">
                      <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0 text-body-tertiary text-nowrap">DAX</h5>
                        <div class="badge badge-phoenix fs-10 d-flex align-items-center badge-phoenix-success">
                          +1.56%
                          <span class="ms-1 fas fa-chevron-up"></span>
                        </div>
                      </div>
                      <h4 class="mb-0">$22,676.41</h4>
                    </div>
                    <div class="overview-echart echart-stock-overview-chart" data-echarts='{"data":[500,450,600,690,700,550,400,350,200,250,180,350,320,330,320,450,480,450,445,300,420,600]}'></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 py-5 border-top mt-4">
        <h3 class="mb-4 text-body-emphasis">Top Stock</h3>
        <div class="row gx-5">
          <div class="col-12 col-xl-5 col-xxl-4 mb-4 mb-xl-0 top-stock-card-container">
            <div class="search-box w-100 mb-3 pe-xl-3">
              <form class="position-relative">
                <input class="form-control search-input search" type="search" placeholder="Enter Company or Symbol name" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
            </div>
            <div class="scrollbar top-stock-tab w-100 pe-xl-3">
              <ul class="nav gap-3 gap-xl-2 flex-nowrap flex-xl-column" id="companyTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link card company-card active" id="tab-apple" href="stock.html#apple-tab" data-bs-toggle="tab" aria-current="page" aria-controls="apple-tab" aria-selected="true" role="tab">
                    <div class="card-body p-0">
                      <div class="d-flex gap-3 gap-xl-2 gap-xxl-3 align-items-center">
                        <img class="d-dark-none img-fluid" :src="imgBrand3Apple" />
                        <img class="d-light-none img-fluid" :src="imgBramd3LightApple" alt="brand" />
                        <div class="d-flex gap-3 flex-between-center flex-1">
                          <div>
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-nowrap">Apple Inc</h6>
                            <h4 class="mb-0"> $225.77</h4>
                          </div>
                          <div class="text-end">
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-uppercase">AAPL</h6>
                            <h6 class="fw-semibold lh-sm text-success"> +4.08(1.84%)</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link card company-card" id="tab-tesla" href="stock.html#tesla-tab" data-bs-toggle="tab" aria-current="page" aria-controls="tesla-tab" aria-selected="false" role="tab">
                    <div class="card-body p-0">
                      <div class="d-flex gap-3 gap-xl-2 gap-xxl-3 align-items-center">
                        <img class="d-dark-none img-fluid" :src="imgBrand3Tesla" alt="brand" />
                        <img class="d-light-none img-fluid" :src="imgBrand3DarkTesla" alt="brand" />
                        <div class="d-flex gap-3 flex-between-center flex-1">
                          <div>
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-nowrap">Tesla Inc</h6>
                            <h4 class="mb-0"> $240.83</h4>
                          </div>
                          <div class="text-end">
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-uppercase">TSLA</h6>
                            <h6 class="fw-semibold lh-sm text-danger"> -1.47(0.6%)</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link card company-card" id="tab-nvidia" href="stock.html#nvidia-tab" data-bs-toggle="tab" aria-current="page" aria-controls="nvidia-tab" aria-selected="false" role="tab">
                    <div class="card-body p-0">
                      <div class="d-flex gap-3 gap-xl-2 gap-xxl-3 align-items-center">
                        <img class="img-fluid" :src="imgBrand3Nvidia" alt="brand" />
                        <div class="d-flex gap-3 flex-between-center flex-1">
                          <div>
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-nowrap">NVIDIA corp</h6>
                            <h4 class="mb-0"> $132.89</h4>
                          </div>
                          <div class="text-end">
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-uppercase">NVDA</h6>
                            <h6 class="fw-semibold lh-sm text-success"> +5.17(4.05%)</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link card company-card" id="tab-alphabet" href="stock.html#alphabet-tab" data-bs-toggle="tab" aria-current="page" aria-controls="alphabet-tab" aria-selected="false" role="tab">
                    <div class="card-body p-0">
                      <div class="d-flex gap-3 gap-xl-2 gap-xxl-3 align-items-center">
                        <img class="img-fluid" :src="imgBrand3Google" alt="brand" />
                        <div class="d-flex gap-3 flex-between-center flex-1">
                          <div>
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-nowrap">Alphabet Inc</h6>
                            <h4 class="mb-0"> $165.7</h4>
                          </div>
                          <div class="text-end">
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-uppercase">GOOG</h6>
                            <h6 class="fw-semibold lh-sm text-success"> +1.31(0.8%)</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link card company-card" id="tab-amd" href="stock.html#amd-tab" data-bs-toggle="tab" aria-current="page" aria-controls="amd-tab" aria-selected="false" role="tab">
                    <div class="card-body p-0">
                      <div class="d-flex gap-3 gap-xl-2 gap-xxl-3 align-items-center">
                        <img class="d-dark-none img-fluid" :src="imgBrand3Amd" alt="brand" />
                          <img class="d-light-none img-fluid" :src="imgBrand3DarkAmd" alt="brand" />
                        <div class="d-flex gap-3 flex-between-center flex-1">
                          <div>
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-nowrap">AMD Inc.</h6>
                            <h4 class="mb-0"> $172.8</h4>
                          </div>
                          <div class="text-end">
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-uppercase">AMD</h6>
                            <h6 class="fw-semibold lh-sm text-success"> +1.83(1.07%)</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link card company-card" id="tab-microsoft" href="stock.html#microsoft-tab" data-bs-toggle="tab" aria-current="page" aria-controls="microsoft-tab" aria-selected="false" role="tab">
                    <div class="card-body p-0">
                      <div class="d-flex gap-3 gap-xl-2 gap-xxl-3 align-items-center">
                        <img class="img-fluid" :src="imgBrand3Microsoft" alt="brand" />
                        <div class="d-flex gap-3 flex-between-center flex-1">
                          <div>
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-nowrap">Microsoft corp</h6>
                            <h4 class="mb-0"> $414.71</h4>
                          </div>
                          <div class="text-end">
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-uppercase">MSFT</h6>
                            <h6 class="fw-semibold lh-sm text-success"> +5.17(1.26%)</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link card company-card" id="tab-intel" href="stock.html#intel-tab" data-bs-toggle="tab" aria-current="page" aria-controls="intel-tab" aria-selected="false" role="tab">
                    <div class="card-body p-0">
                      <div class="d-flex gap-3 gap-xl-2 gap-xxl-3 align-items-center">
                        <img class="d-dark-none img-fluid" :src="imgBrand3Intel" alt="brand" />
                          <img class="d-light-none img-fluid" :src="imgBrand3DarkIntel" alt="brand" />
                        <div class="d-flex gap-3 flex-between-center flex-1">
                          <div>
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-nowrap">Intel</h6>
                            <h4 class="mb-0"> $23.32</h4>
                          </div>
                          <div class="text-end">
                            <h6 class="fw-semibold text-body-secondary mb-2 lh-sm text-uppercase">INTEL</h6>
                            <h6 class="fw-semibold lh-sm text-success"> +0.94(4.2%)</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-xl-7 col-xxl-8 ps-xl-0 flex-1">
            <div class="tab-content" id="topStocksTabContent">
              <div class="tab-pane fade active show" id="apple-tab" role="tabpanel" aria-labelledby="tab-apple">
                <div class="row justify-content-between g-3 mb-5">
                  <div class="col-auto">
                    <h4 class="text-body-tertiary mb-2 lh-sm">AAPL</h4>
                    <h3 class="text-body-highlight d-flex gap-2 flex-between-center lh-sm mb-0">
                      $225.77
                      <span class="badge badge-phoenix fs-10 d-flex flex-between-center badge-phoenix-success">
                        1.84% <span class="ms-1 fas fa-chevron-up"></span>
                      </span>
                    </h3>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center gap-2">
                      <a class="btn btn-sm btn-phoenix-primary" href="#!">
                        View full stock details
                        <span class="ms-2 fas fa-up-right-from-square"></span>
                      </a>
                      <button class="btn btn-sm btn-phoenix-secondary">
                        <span class="fas fa-clock"> </span>
                      </button>
                      <button class="btn btn-sm btn-phoenix-secondary">
                        <span class="fas fa-eye"> </span>
                      </button>
                    </div>
                  </div>
                </div>
                <ul class="nav nav-underline optionChainTableHeader mb-4 gap-0" id="companyStatesTab-0" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link pt-0 active pe-2" id="chart-tab-0" href="stock.html#tab-chart-0" data-bs-toggle="tab" role="tab" aria-controls="tab-chart-0" aria-selected="true">Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link pt-0 px-3" id="option-chain-tab-0" href="stock.html#tab-optionChain-0" data-bs-toggle="tab" role="tab" aria-controls="tab-optionChain-0" aria-selected="false">Option Chain</a>
                  </li>
                  <li class="nav-item flex-1">
                    <a class="nav-link disabled h-100" id="empty-div-0" href="stock.html#!" data-bs-toggle="tab" role="tab" aria-selected="false"></a>
                  </li>
                </ul>
                <div class="tab-content" id="companyStatesTabContent-0">
                  <div class="tab-pane fade show active" id="tab-chart-0" role="tabpanel" aria-labelledby="chart-tab-0">
                    <div class="scrollbar mb-4">
                      <div class="btn-group stock-btn-group btn-group-sm text-nowrap" role="group" aria-label="top-stock-chart-filter">
                        <button class="btn btn-phoenix-secondary fw-bolder active">1 D
                          <span class="d-none d-sm-inline d-xl-none d-xxl-inline">ay</span>
                        </button>
                        <button class="btn btn-phoenix-secondary fw-bolder">5 D
                          <span class="d-none d-sm-inline d-xl-none d-xxl-inline">ays</span>
                        </button>
                        <button class="btn btn-phoenix-secondary fw-bolder">3 M
                          <span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span>
                        </button>
                        <button class="btn btn-phoenix-secondary fw-bolder">6 M
                          <span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span>
                        </button>
                        <button class="btn btn-phoenix-secondary fw-bolder">1 Y
                          <span class="d-none d-sm-inline d-xl-none d-xxl-inline">ear</span>
                        </button>
                        <button class="btn btn-phoenix-secondary fw-bolder">5 Y
                          <span class="d-none d-sm-inline d-xl-none d-xxl-inline">ears</span>
                        </button>
                        <button class="btn btn-phoenix-secondary fw-bolder">Max</button>
                      </div>
                    </div>
                    <div class="top-stock-chart">
                      <canvas id="top-stock-apple-chart" style="width: 100%; min-height: 36.5rem; max-height: 36.5rem;"></canvas>
                    </div>
                  </div>
                  <div class="tab-pane fade" role="tabpanel" id="tab-optionChain-0" aria-labelledby="option-chain-tab-0">
                    <div class="swiper-theme-container optionChainTableHeader nav nav-underline">
                      <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":5,"breakpoints":{"0":{"slidesPerView":1.5},"560":{"slidesPerView":2.5},"768":{"slidesPerView":3.5},"1200":{"slidesPerView":3},"1560":{"slidesPerView":4},"1800":{"slidesPerView":5}},"grabCursor":true,"navigation":true}'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100 active"><span class="fs-8">May 17, 24
                              </span><span class="text-body-tertiary fs-9 fw-semibold">(4 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">May 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(11 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 01, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(18 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 08, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(25 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 15, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(32 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(41 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 31, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(48 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jul 07, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(56 Days)</span></button></div>
                        </div>
                        <div class="swiper-nav">
                          <div class="swiper-button-next"> <span class="fas fa-chevron-right nav-icon"></span></div>
                          <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive scrollbar">
                      <table class="table text-center mb-0">
                        <thead>
                          <tr>
                            <th colspan="5">Calls</th>
                            <th class="bg-body-highlight border-x border-translucent">Strike Price </th>
                            <th colspan="5">Puts</th>
                          </tr>
                          <tr class="fs-10 text-uppercase">
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                            <th class="bg-body-highlight border-x border-translucent" style="min-width: 7.5rem;">IV
                              19.4%</th>
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">12.50</td>
                            <td class="text-info-dark lh-sm">12.75</td>
                            <td class="lh-sm">12.30</td>
                            <td class="lh-sm">0.977</td>
                            <td class="lh-sm">0.008</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              174</td>
                            <td class="text-info-dark lh-sm">0.06 </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="lh-sm">0.06 </td>
                            <td class="lh-sm">-0.023 </td>
                            <td class="lh-sm">0.008 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">10.15</td>
                            <td class="text-info-dark lh-sm">10.25</td>
                            <td class="lh-sm">10.25</td>
                            <td class="lh-sm">0.964</td>
                            <td class="lh-sm">0.014</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">5
                            </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="text-info-dark lh-sm">0.08 </td>
                            <td class="lh-sm">0.07 </td>
                            <td class="lh-sm">-0.035 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">7.65</td>
                            <td class="text-info-dark lh-sm">8.05</td>
                            <td class="lh-sm">7.80</td>
                            <td class="lh-sm">0.937</td>
                            <td class="lh-sm">0.024</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              172.5</td>
                            <td class="text-info-dark lh-sm">0.12 </td>
                            <td class="text-info-dark lh-sm">0.13 </td>
                            <td class="lh-sm">0.12 </td>
                            <td class="lh-sm">-0.064 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">5.30</td>
                            <td class="text-info-dark lh-sm">5.45</td>
                            <td class="lh-sm">5.35</td>
                            <td class="lh-sm">0.871</td>
                            <td class="lh-sm">0.034</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              175</td>
                            <td class="text-info-dark lh-sm">0.26 </td>
                            <td class="text-info-dark lh-sm">0.27 </td>
                            <td class="lh-sm">0.27 </td>
                            <td class="lh-sm">-0.130 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">3.25</td>
                            <td class="text-info-dark lh-sm">3.30</td>
                            <td class="lh-sm">3.28</td>
                            <td class="lh-sm">0.732</td>
                            <td class="lh-sm">0.044</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              177.5</td>
                            <td class="text-info-dark lh-sm">0.66 </td>
                            <td class="text-info-dark lh-sm">0.67 </td>
                            <td class="lh-sm">0.66 </td>
                            <td class="lh-sm">-0.269 </td>
                            <td class="lh-sm">0.078 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              180</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.65</td>
                            <td class="text-info-dark lh-sm">0.66</td>
                            <td class="lh-sm">0.65</td>
                            <td class="lh-sm">0.487</td>
                            <td class="lh-sm">0.063</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              182.5</td>
                            <td class="text-info-dark lh-sm">3.10 </td>
                            <td class="text-info-dark lh-sm">3.00 </td>
                            <td class="lh-sm">3.10 </td>
                            <td class="lh-sm">-0.431 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.22</td>
                            <td class="text-info-dark lh-sm">0.23</td>
                            <td class="lh-sm">0.23</td>
                            <td class="lh-sm">0.234</td>
                            <td class="lh-sm">0.072</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              185</td>
                            <td class="text-info-dark lh-sm">5.05 </td>
                            <td class="text-info-dark lh-sm">5.25 </td>
                            <td class="lh-sm">5.15 </td>
                            <td class="lh-sm">-0.987 </td>
                            <td class="lh-sm">0.023 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.08</td>
                            <td class="text-info-dark lh-sm">0.09</td>
                            <td class="lh-sm">0.08</td>
                            <td class="lh-sm">0.123</td>
                            <td class="lh-sm">0.084</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              187.5</td>
                            <td class="text-info-dark lh-sm">7.45 </td>
                            <td class="text-info-dark lh-sm">7.70 </td>
                            <td class="lh-sm">7.90 </td>
                            <td class="lh-sm">-0.897 </td>
                            <td class="lh-sm">0.087 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.04</td>
                            <td class="text-info-dark lh-sm">0.05</td>
                            <td class="lh-sm">0.04</td>
                            <td class="lh-sm">0.012</td>
                            <td class="lh-sm">0.088</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              190</td>
                            <td class="text-info-dark lh-sm">9.90 </td>
                            <td class="text-info-dark lh-sm">10.15 </td>
                            <td class="lh-sm">10.05 </td>
                            <td class="lh-sm">-0.988 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              192</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tesla-tab" role="tabpanel" aria-labelledby="tab-tesla">
                <div class="row justify-content-between g-3 mb-5">
                  <div class="col-auto">
                    <h4 class="text-body-tertiary mb-2 lh-sm">TSLA</h4>
                    <h3 class="text-body-highlight d-flex gap-2 flex-between-center lh-sm mb-0"> $240.83<span class="badge badge-phoenix fs-10 d-flex flex-between-center badge-phoenix-danger"> 0.6%<span class="ms-1 fas fa-chevron-down"></span></span></h3>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center gap-2"><a class="btn btn-sm btn-phoenix-primary"
                        href="../apps/stock/stock-details.html">View full stock details<span class="ms-2 fas fa-up-right-from-square"></span></a><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-clock"> </span></button><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-eye"> </span></button></div>
                  </div>
                </div>
                <ul class="nav nav-underline optionChainTableHeader mb-4 gap-0" id="companyStatesTab-1" role="tablist">
                  <li class="nav-item"> <a class="nav-link pt-0 active pe-2" id="chart-tab-1"
                      href="stock.html#tab-chart-1" data-bs-toggle="tab" role="tab" aria-controls="tab-chart-1"
                      aria-selected="true">Chart</a>
                    </li>
                  <li class="nav-item"> <a class="nav-link pt-0 px-3" id="option-chain-tab-1"
                      href="stock.html#tab-optionChain-1" data-bs-toggle="tab" role="tab"
                      aria-controls="tab-optionChain-1" aria-selected="false">Option Chain</a>
                    </li>
                  <li class="nav-item flex-1"> <a class="nav-link disabled h-100" id="empty-div-1" href="stock.html#!" data-bs-toggle="tab" role="tab" aria-selected="false"></a>
                </li>
                </ul>
                <div class="tab-content" id="companyStatesTabContent-1">
                  <div class="tab-pane fade show active" id="tab-chart-1" role="tabpanel" aria-labelledby="chart-tab-1">
                    <div class="scrollbar mb-4">
                      <div class="btn-group stock-btn-group btn-group-sm text-nowrap" role="group" aria-label="top-stock-chart-filter"><button class="btn btn-phoenix-secondary fw-bolder active">1
                          D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ay</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ays</span></button><button class="btn btn-phoenix-secondary fw-bolder">3 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">6 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">1 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ear</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ears</span></button><button class="btn btn-phoenix-secondary fw-bolder">Max</button></div>
                    </div>
                    <div class="top-stock-chart"> <canvas id="top-stock-tesla-chart" style="width: 100%; min-height: 36.5rem; max-height: 36.5rem;"></canvas></div>
                  </div>
                  <div class="tab-pane fade" role="tabpanel" id="tab-optionChain-1" aria-labelledby="option-chain-tab-1">
                    <div class="swiper-theme-container optionChainTableHeader nav nav-underline">
                      <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":5,"breakpoints":{"0":{"slidesPerView":1.5},"560":{"slidesPerView":2.5},"768":{"slidesPerView":3.5},"1200":{"slidesPerView":3},"1560":{"slidesPerView":4},"1800":{"slidesPerView":5}},"grabCursor":true,"navigation":true}'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100 active"><span class="fs-8">May 17, 24
                              </span><span class="text-body-tertiary fs-9 fw-semibold">(4 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">May 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(11 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 01, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(18 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 08, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(25 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 15, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(32 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(41 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 31, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(48 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jul 07, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(56 Days)</span></button></div>
                        </div>
                        <div class="swiper-nav">
                          <div class="swiper-button-next"> <span class="fas fa-chevron-right nav-icon"></span></div>
                          <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive scrollbar">
                      <table class="table text-center mb-0">
                        <thead>
                          <tr>
                            <th colspan="5">Calls</th>
                            <th class="bg-body-highlight border-x border-translucent">Strike Price </th>
                            <th colspan="5">Puts</th>
                          </tr>
                          <tr class="fs-10 text-uppercase">
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                            <th class="bg-body-highlight border-x border-translucent" style="min-width: 7.5rem;">IV
                              19.4%</th>
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">12.50</td>
                            <td class="text-info-dark lh-sm">12.75</td>
                            <td class="lh-sm">12.30</td>
                            <td class="lh-sm">0.977</td>
                            <td class="lh-sm">0.008</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              174</td>
                            <td class="text-info-dark lh-sm">0.06 </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="lh-sm">0.06 </td>
                            <td class="lh-sm">-0.023 </td>
                            <td class="lh-sm">0.008 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">10.15</td>
                            <td class="text-info-dark lh-sm">10.25</td>
                            <td class="lh-sm">10.25</td>
                            <td class="lh-sm">0.964</td>
                            <td class="lh-sm">0.014</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">5
                            </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="text-info-dark lh-sm">0.08 </td>
                            <td class="lh-sm">0.07 </td>
                            <td class="lh-sm">-0.035 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">7.65</td>
                            <td class="text-info-dark lh-sm">8.05</td>
                            <td class="lh-sm">7.80</td>
                            <td class="lh-sm">0.937</td>
                            <td class="lh-sm">0.024</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              172.5</td>
                            <td class="text-info-dark lh-sm">0.12 </td>
                            <td class="text-info-dark lh-sm">0.13 </td>
                            <td class="lh-sm">0.12 </td>
                            <td class="lh-sm">-0.064 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">5.30</td>
                            <td class="text-info-dark lh-sm">5.45</td>
                            <td class="lh-sm">5.35</td>
                            <td class="lh-sm">0.871</td>
                            <td class="lh-sm">0.034</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              175</td>
                            <td class="text-info-dark lh-sm">0.26 </td>
                            <td class="text-info-dark lh-sm">0.27 </td>
                            <td class="lh-sm">0.27 </td>
                            <td class="lh-sm">-0.130 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">3.25</td>
                            <td class="text-info-dark lh-sm">3.30</td>
                            <td class="lh-sm">3.28</td>
                            <td class="lh-sm">0.732</td>
                            <td class="lh-sm">0.044</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              177.5</td>
                            <td class="text-info-dark lh-sm">0.66 </td>
                            <td class="text-info-dark lh-sm">0.67 </td>
                            <td class="lh-sm">0.66 </td>
                            <td class="lh-sm">-0.269 </td>
                            <td class="lh-sm">0.078 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              180</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.65</td>
                            <td class="text-info-dark lh-sm">0.66</td>
                            <td class="lh-sm">0.65</td>
                            <td class="lh-sm">0.487</td>
                            <td class="lh-sm">0.063</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              182.5</td>
                            <td class="text-info-dark lh-sm">3.10 </td>
                            <td class="text-info-dark lh-sm">3.00 </td>
                            <td class="lh-sm">3.10 </td>
                            <td class="lh-sm">-0.431 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.22</td>
                            <td class="text-info-dark lh-sm">0.23</td>
                            <td class="lh-sm">0.23</td>
                            <td class="lh-sm">0.234</td>
                            <td class="lh-sm">0.072</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              185</td>
                            <td class="text-info-dark lh-sm">5.05 </td>
                            <td class="text-info-dark lh-sm">5.25 </td>
                            <td class="lh-sm">5.15 </td>
                            <td class="lh-sm">-0.987 </td>
                            <td class="lh-sm">0.023 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.08</td>
                            <td class="text-info-dark lh-sm">0.09</td>
                            <td class="lh-sm">0.08</td>
                            <td class="lh-sm">0.123</td>
                            <td class="lh-sm">0.084</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              187.5</td>
                            <td class="text-info-dark lh-sm">7.45 </td>
                            <td class="text-info-dark lh-sm">7.70 </td>
                            <td class="lh-sm">7.90 </td>
                            <td class="lh-sm">-0.897 </td>
                            <td class="lh-sm">0.087 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.04</td>
                            <td class="text-info-dark lh-sm">0.05</td>
                            <td class="lh-sm">0.04</td>
                            <td class="lh-sm">0.012</td>
                            <td class="lh-sm">0.088</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              190</td>
                            <td class="text-info-dark lh-sm">9.90 </td>
                            <td class="text-info-dark lh-sm">10.15 </td>
                            <td class="lh-sm">10.05 </td>
                            <td class="lh-sm">-0.988 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              192</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nvidia-tab" role="tabpanel" aria-labelledby="tab-nvidia">
                <div class="row justify-content-between g-3 mb-5">
                  <div class="col-auto">
                    <h4 class="text-body-tertiary mb-2 lh-sm">NVDA</h4>
                    <h3 class="text-body-highlight d-flex gap-2 flex-between-center lh-sm mb-0"> $132.89<span class="badge badge-phoenix fs-10 d-flex flex-between-center badge-phoenix-success"> 4.05%<span class="ms-1 fas fa-chevron-up"></span></span></h3>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center gap-2"><a class="btn btn-sm btn-phoenix-primary"
                        href="../apps/stock/stock-details.html">View full stock details<span class="ms-2 fas fa-up-right-from-square"></span></a><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-clock"> </span></button><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-eye"> </span></button></div>
                  </div>
                </div>
                <ul class="nav nav-underline optionChainTableHeader mb-4 gap-0" id="companyStatesTab-2" role="tablist">
                  <li class="nav-item"> <a class="nav-link pt-0 active pe-2" id="chart-tab-2"
                      href="stock.html#tab-chart-2" data-bs-toggle="tab" role="tab" aria-controls="tab-chart-2"
                      aria-selected="true">Chart</a>
                    </li>
                  <li class="nav-item"> <a class="nav-link pt-0 px-3" id="option-chain-tab-2"
                      href="stock.html#tab-optionChain-2" data-bs-toggle="tab" role="tab"
                      aria-controls="tab-optionChain-2" aria-selected="false">Option Chain</a>
                    </li>
                  <li class="nav-item flex-1"> <a class="nav-link disabled h-100" id="empty-div-2" href="stock.html#!" data-bs-toggle="tab" role="tab" aria-selected="false"></a>
                </li>
                </ul>
                <div class="tab-content" id="companyStatesTabContent-2">
                  <div class="tab-pane fade show active" id="tab-chart-2" role="tabpanel" aria-labelledby="chart-tab-2">
                    <div class="scrollbar mb-4">
                      <div class="btn-group stock-btn-group btn-group-sm text-nowrap" role="group" aria-label="top-stock-chart-filter"><button class="btn btn-phoenix-secondary fw-bolder active">1
                          D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ay</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ays</span></button><button class="btn btn-phoenix-secondary fw-bolder">3 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">6 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">1 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ear</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ears</span></button><button class="btn btn-phoenix-secondary fw-bolder">Max</button></div>
                    </div>
                    <div class="top-stock-chart"> <canvas id="top-stock-nvidia-chart" style="width: 100%; min-height: 36.5rem; max-height: 36.5rem;"></canvas></div>
                  </div>
                  <div class="tab-pane fade" role="tabpanel" id="tab-optionChain-2" aria-labelledby="option-chain-tab-2">
                    <div class="swiper-theme-container optionChainTableHeader nav nav-underline">
                      <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":5,"breakpoints":{"0":{"slidesPerView":1.5},"560":{"slidesPerView":2.5},"768":{"slidesPerView":3.5},"1200":{"slidesPerView":3},"1560":{"slidesPerView":4},"1800":{"slidesPerView":5}},"grabCursor":true,"navigation":true}'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100 active"><span class="fs-8">May 17, 24
                              </span><span class="text-body-tertiary fs-9 fw-semibold">(4 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">May 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(11 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 01, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(18 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 08, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(25 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 15, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(32 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(41 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 31, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(48 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jul 07, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(56 Days)</span></button></div>
                        </div>
                        <div class="swiper-nav">
                          <div class="swiper-button-next"> <span class="fas fa-chevron-right nav-icon"></span></div>
                          <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive scrollbar">
                      <table class="table text-center mb-0">
                        <thead>
                          <tr>
                            <th colspan="5">Calls</th>
                            <th class="bg-body-highlight border-x border-translucent">Strike Price </th>
                            <th colspan="5">Puts</th>
                          </tr>
                          <tr class="fs-10 text-uppercase">
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                            <th class="bg-body-highlight border-x border-translucent" style="min-width: 7.5rem;">IV
                              19.4%</th>
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">12.50</td>
                            <td class="text-info-dark lh-sm">12.75</td>
                            <td class="lh-sm">12.30</td>
                            <td class="lh-sm">0.977</td>
                            <td class="lh-sm">0.008</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              174</td>
                            <td class="text-info-dark lh-sm">0.06 </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="lh-sm">0.06 </td>
                            <td class="lh-sm">-0.023 </td>
                            <td class="lh-sm">0.008 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">10.15</td>
                            <td class="text-info-dark lh-sm">10.25</td>
                            <td class="lh-sm">10.25</td>
                            <td class="lh-sm">0.964</td>
                            <td class="lh-sm">0.014</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">5
                            </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="text-info-dark lh-sm">0.08 </td>
                            <td class="lh-sm">0.07 </td>
                            <td class="lh-sm">-0.035 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">7.65</td>
                            <td class="text-info-dark lh-sm">8.05</td>
                            <td class="lh-sm">7.80</td>
                            <td class="lh-sm">0.937</td>
                            <td class="lh-sm">0.024</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              172.5</td>
                            <td class="text-info-dark lh-sm">0.12 </td>
                            <td class="text-info-dark lh-sm">0.13 </td>
                            <td class="lh-sm">0.12 </td>
                            <td class="lh-sm">-0.064 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">5.30</td>
                            <td class="text-info-dark lh-sm">5.45</td>
                            <td class="lh-sm">5.35</td>
                            <td class="lh-sm">0.871</td>
                            <td class="lh-sm">0.034</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              175</td>
                            <td class="text-info-dark lh-sm">0.26 </td>
                            <td class="text-info-dark lh-sm">0.27 </td>
                            <td class="lh-sm">0.27 </td>
                            <td class="lh-sm">-0.130 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">3.25</td>
                            <td class="text-info-dark lh-sm">3.30</td>
                            <td class="lh-sm">3.28</td>
                            <td class="lh-sm">0.732</td>
                            <td class="lh-sm">0.044</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              177.5</td>
                            <td class="text-info-dark lh-sm">0.66 </td>
                            <td class="text-info-dark lh-sm">0.67 </td>
                            <td class="lh-sm">0.66 </td>
                            <td class="lh-sm">-0.269 </td>
                            <td class="lh-sm">0.078 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              180</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.65</td>
                            <td class="text-info-dark lh-sm">0.66</td>
                            <td class="lh-sm">0.65</td>
                            <td class="lh-sm">0.487</td>
                            <td class="lh-sm">0.063</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              182.5</td>
                            <td class="text-info-dark lh-sm">3.10 </td>
                            <td class="text-info-dark lh-sm">3.00 </td>
                            <td class="lh-sm">3.10 </td>
                            <td class="lh-sm">-0.431 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.22</td>
                            <td class="text-info-dark lh-sm">0.23</td>
                            <td class="lh-sm">0.23</td>
                            <td class="lh-sm">0.234</td>
                            <td class="lh-sm">0.072</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              185</td>
                            <td class="text-info-dark lh-sm">5.05 </td>
                            <td class="text-info-dark lh-sm">5.25 </td>
                            <td class="lh-sm">5.15 </td>
                            <td class="lh-sm">-0.987 </td>
                            <td class="lh-sm">0.023 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.08</td>
                            <td class="text-info-dark lh-sm">0.09</td>
                            <td class="lh-sm">0.08</td>
                            <td class="lh-sm">0.123</td>
                            <td class="lh-sm">0.084</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              187.5</td>
                            <td class="text-info-dark lh-sm">7.45 </td>
                            <td class="text-info-dark lh-sm">7.70 </td>
                            <td class="lh-sm">7.90 </td>
                            <td class="lh-sm">-0.897 </td>
                            <td class="lh-sm">0.087 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.04</td>
                            <td class="text-info-dark lh-sm">0.05</td>
                            <td class="lh-sm">0.04</td>
                            <td class="lh-sm">0.012</td>
                            <td class="lh-sm">0.088</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              190</td>
                            <td class="text-info-dark lh-sm">9.90 </td>
                            <td class="text-info-dark lh-sm">10.15 </td>
                            <td class="lh-sm">10.05 </td>
                            <td class="lh-sm">-0.988 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              192</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="alphabet-tab" role="tabpanel" aria-labelledby="tab-alphabet">
                <div class="row justify-content-between g-3 mb-5">
                  <div class="col-auto">
                    <h4 class="text-body-tertiary mb-2 lh-sm">GOOG</h4>
                    <h3 class="text-body-highlight d-flex gap-2 flex-between-center lh-sm mb-0"> $165.7<span class="badge badge-phoenix fs-10 d-flex flex-between-center badge-phoenix-success"> 0.8%<span class="ms-1 fas fa-chevron-up"></span></span></h3>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center gap-2"><a class="btn btn-sm btn-phoenix-primary"
                        href="../apps/stock/stock-details.html">View full stock details<span class="ms-2 fas fa-up-right-from-square"></span></a><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-clock"> </span></button><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-eye"> </span></button></div>
                  </div>
                </div>
                <ul class="nav nav-underline optionChainTableHeader mb-4 gap-0" id="companyStatesTab-3" role="tablist">
                  <li class="nav-item"> <a class="nav-link pt-0 active pe-2" id="chart-tab-3"
                      href="stock.html#tab-chart-3" data-bs-toggle="tab" role="tab" aria-controls="tab-chart-3"
                      aria-selected="true">Chart</a>
                    </li>
                  <li class="nav-item"> <a class="nav-link pt-0 px-3" id="option-chain-tab-3"
                      href="stock.html#tab-optionChain-3" data-bs-toggle="tab" role="tab"
                      aria-controls="tab-optionChain-3" aria-selected="false">Option Chain</a>
                    </li>
                  <li class="nav-item flex-1"> <a class="nav-link disabled h-100" id="empty-div-3" href="stock.html#!" data-bs-toggle="tab" role="tab" aria-selected="false"></a>
                </li>
                </ul>
                <div class="tab-content" id="companyStatesTabContent-3">
                  <div class="tab-pane fade show active" id="tab-chart-3" role="tabpanel" aria-labelledby="chart-tab-3">
                    <div class="scrollbar mb-4">
                      <div class="btn-group stock-btn-group btn-group-sm text-nowrap" role="group" aria-label="top-stock-chart-filter"><button class="btn btn-phoenix-secondary fw-bolder active">1
                          D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ay</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ays</span></button><button class="btn btn-phoenix-secondary fw-bolder">3 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">6 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">1 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ear</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ears</span></button><button class="btn btn-phoenix-secondary fw-bolder">Max</button></div>
                    </div>
                    <div class="top-stock-chart"> <canvas id="top-stock-alphabet-chart" style="width: 100%; min-height: 36.5rem; max-height: 36.5rem;"></canvas></div>
                  </div>
                  <div class="tab-pane fade" role="tabpanel" id="tab-optionChain-3" aria-labelledby="option-chain-tab-3">
                    <div class="swiper-theme-container optionChainTableHeader nav nav-underline">
                      <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":5,"breakpoints":{"0":{"slidesPerView":1.5},"560":{"slidesPerView":2.5},"768":{"slidesPerView":3.5},"1200":{"slidesPerView":3},"1560":{"slidesPerView":4},"1800":{"slidesPerView":5}},"grabCursor":true,"navigation":true}'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100 active"><span class="fs-8">May 17, 24
                              </span><span class="text-body-tertiary fs-9 fw-semibold">(4 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">May 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(11 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 01, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(18 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 08, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(25 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 15, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(32 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(41 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 31, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(48 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jul 07, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(56 Days)</span></button></div>
                        </div>
                        <div class="swiper-nav">
                          <div class="swiper-button-next"> <span class="fas fa-chevron-right nav-icon"></span></div>
                          <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive scrollbar">
                      <table class="table text-center mb-0">
                        <thead>
                          <tr>
                            <th colspan="5">Calls</th>
                            <th class="bg-body-highlight border-x border-translucent">Strike Price </th>
                            <th colspan="5">Puts</th>
                          </tr>
                          <tr class="fs-10 text-uppercase">
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                            <th class="bg-body-highlight border-x border-translucent" style="min-width: 7.5rem;">IV
                              19.4%</th>
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">12.50</td>
                            <td class="text-info-dark lh-sm">12.75</td>
                            <td class="lh-sm">12.30</td>
                            <td class="lh-sm">0.977</td>
                            <td class="lh-sm">0.008</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              174</td>
                            <td class="text-info-dark lh-sm">0.06 </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="lh-sm">0.06 </td>
                            <td class="lh-sm">-0.023 </td>
                            <td class="lh-sm">0.008 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">10.15</td>
                            <td class="text-info-dark lh-sm">10.25</td>
                            <td class="lh-sm">10.25</td>
                            <td class="lh-sm">0.964</td>
                            <td class="lh-sm">0.014</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">5
                            </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="text-info-dark lh-sm">0.08 </td>
                            <td class="lh-sm">0.07 </td>
                            <td class="lh-sm">-0.035 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">7.65</td>
                            <td class="text-info-dark lh-sm">8.05</td>
                            <td class="lh-sm">7.80</td>
                            <td class="lh-sm">0.937</td>
                            <td class="lh-sm">0.024</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              172.5</td>
                            <td class="text-info-dark lh-sm">0.12 </td>
                            <td class="text-info-dark lh-sm">0.13 </td>
                            <td class="lh-sm">0.12 </td>
                            <td class="lh-sm">-0.064 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">5.30</td>
                            <td class="text-info-dark lh-sm">5.45</td>
                            <td class="lh-sm">5.35</td>
                            <td class="lh-sm">0.871</td>
                            <td class="lh-sm">0.034</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              175</td>
                            <td class="text-info-dark lh-sm">0.26 </td>
                            <td class="text-info-dark lh-sm">0.27 </td>
                            <td class="lh-sm">0.27 </td>
                            <td class="lh-sm">-0.130 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">3.25</td>
                            <td class="text-info-dark lh-sm">3.30</td>
                            <td class="lh-sm">3.28</td>
                            <td class="lh-sm">0.732</td>
                            <td class="lh-sm">0.044</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              177.5</td>
                            <td class="text-info-dark lh-sm">0.66 </td>
                            <td class="text-info-dark lh-sm">0.67 </td>
                            <td class="lh-sm">0.66 </td>
                            <td class="lh-sm">-0.269 </td>
                            <td class="lh-sm">0.078 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              180</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.65</td>
                            <td class="text-info-dark lh-sm">0.66</td>
                            <td class="lh-sm">0.65</td>
                            <td class="lh-sm">0.487</td>
                            <td class="lh-sm">0.063</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              182.5</td>
                            <td class="text-info-dark lh-sm">3.10 </td>
                            <td class="text-info-dark lh-sm">3.00 </td>
                            <td class="lh-sm">3.10 </td>
                            <td class="lh-sm">-0.431 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.22</td>
                            <td class="text-info-dark lh-sm">0.23</td>
                            <td class="lh-sm">0.23</td>
                            <td class="lh-sm">0.234</td>
                            <td class="lh-sm">0.072</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              185</td>
                            <td class="text-info-dark lh-sm">5.05 </td>
                            <td class="text-info-dark lh-sm">5.25 </td>
                            <td class="lh-sm">5.15 </td>
                            <td class="lh-sm">-0.987 </td>
                            <td class="lh-sm">0.023 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.08</td>
                            <td class="text-info-dark lh-sm">0.09</td>
                            <td class="lh-sm">0.08</td>
                            <td class="lh-sm">0.123</td>
                            <td class="lh-sm">0.084</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              187.5</td>
                            <td class="text-info-dark lh-sm">7.45 </td>
                            <td class="text-info-dark lh-sm">7.70 </td>
                            <td class="lh-sm">7.90 </td>
                            <td class="lh-sm">-0.897 </td>
                            <td class="lh-sm">0.087 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.04</td>
                            <td class="text-info-dark lh-sm">0.05</td>
                            <td class="lh-sm">0.04</td>
                            <td class="lh-sm">0.012</td>
                            <td class="lh-sm">0.088</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              190</td>
                            <td class="text-info-dark lh-sm">9.90 </td>
                            <td class="text-info-dark lh-sm">10.15 </td>
                            <td class="lh-sm">10.05 </td>
                            <td class="lh-sm">-0.988 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              192</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="amd-tab" role="tabpanel" aria-labelledby="tab-amd">
                <div class="row justify-content-between g-3 mb-5">
                  <div class="col-auto">
                    <h4 class="text-body-tertiary mb-2 lh-sm">AMD</h4>
                    <h3 class="text-body-highlight d-flex gap-2 flex-between-center lh-sm mb-0"> $172.8<span class="badge badge-phoenix fs-10 d-flex flex-between-center badge-phoenix-success"> 1.07%<span class="ms-1 fas fa-chevron-up"></span></span></h3>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center gap-2"><a class="btn btn-sm btn-phoenix-primary"
                        href="../apps/stock/stock-details.html">View full stock details<span class="ms-2 fas fa-up-right-from-square"></span></a><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-clock"> </span></button><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-eye"> </span></button></div>
                  </div>
                </div>
                <ul class="nav nav-underline optionChainTableHeader mb-4 gap-0" id="companyStatesTab-4" role="tablist">
                  <li class="nav-item"> <a class="nav-link pt-0 active pe-2" id="chart-tab-4"
                      href="stock.html#tab-chart-4" data-bs-toggle="tab" role="tab" aria-controls="tab-chart-4"
                      aria-selected="true">Chart</a>
                    </li>
                  <li class="nav-item"> <a class="nav-link pt-0 px-3" id="option-chain-tab-4"
                      href="stock.html#tab-optionChain-4" data-bs-toggle="tab" role="tab"
                      aria-controls="tab-optionChain-4" aria-selected="false">Option Chain</a>
                    </li>
                  <li class="nav-item flex-1"> <a class="nav-link disabled h-100" id="empty-div-4" href="stock.html#!" data-bs-toggle="tab" role="tab" aria-selected="false"></a>
                </li>
                </ul>
                <div class="tab-content" id="companyStatesTabContent-4">
                  <div class="tab-pane fade show active" id="tab-chart-4" role="tabpanel" aria-labelledby="chart-tab-4">
                    <div class="scrollbar mb-4">
                      <div class="btn-group stock-btn-group btn-group-sm text-nowrap" role="group" aria-label="top-stock-chart-filter"><button class="btn btn-phoenix-secondary fw-bolder active">1
                          D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ay</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ays</span></button><button class="btn btn-phoenix-secondary fw-bolder">3 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">6 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">1 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ear</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ears</span></button><button class="btn btn-phoenix-secondary fw-bolder">Max</button></div>
                    </div>
                    <div class="top-stock-chart"> <canvas id="top-stock-amd-chart" style="width: 100%; min-height: 36.5rem; max-height: 36.5rem;"></canvas></div>
                  </div>
                  <div class="tab-pane fade" role="tabpanel" id="tab-optionChain-4" aria-labelledby="option-chain-tab-4">
                    <div class="swiper-theme-container optionChainTableHeader nav nav-underline">
                      <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":5,"breakpoints":{"0":{"slidesPerView":1.5},"560":{"slidesPerView":2.5},"768":{"slidesPerView":3.5},"1200":{"slidesPerView":3},"1560":{"slidesPerView":4},"1800":{"slidesPerView":5}},"grabCursor":true,"navigation":true}'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100 active"><span class="fs-8">May 17, 24
                              </span><span class="text-body-tertiary fs-9 fw-semibold">(4 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">May 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(11 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 01, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(18 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 08, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(25 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 15, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(32 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(41 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 31, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(48 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jul 07, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(56 Days)</span></button></div>
                        </div>
                        <div class="swiper-nav">
                          <div class="swiper-button-next"> <span class="fas fa-chevron-right nav-icon"></span></div>
                          <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive scrollbar">
                      <table class="table text-center mb-0">
                        <thead>
                          <tr>
                            <th colspan="5">Calls</th>
                            <th class="bg-body-highlight border-x border-translucent">Strike Price </th>
                            <th colspan="5">Puts</th>
                          </tr>
                          <tr class="fs-10 text-uppercase">
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                            <th class="bg-body-highlight border-x border-translucent" style="min-width: 7.5rem;">IV
                              19.4%</th>
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">12.50</td>
                            <td class="text-info-dark lh-sm">12.75</td>
                            <td class="lh-sm">12.30</td>
                            <td class="lh-sm">0.977</td>
                            <td class="lh-sm">0.008</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              174</td>
                            <td class="text-info-dark lh-sm">0.06 </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="lh-sm">0.06 </td>
                            <td class="lh-sm">-0.023 </td>
                            <td class="lh-sm">0.008 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">10.15</td>
                            <td class="text-info-dark lh-sm">10.25</td>
                            <td class="lh-sm">10.25</td>
                            <td class="lh-sm">0.964</td>
                            <td class="lh-sm">0.014</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">5
                            </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="text-info-dark lh-sm">0.08 </td>
                            <td class="lh-sm">0.07 </td>
                            <td class="lh-sm">-0.035 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">7.65</td>
                            <td class="text-info-dark lh-sm">8.05</td>
                            <td class="lh-sm">7.80</td>
                            <td class="lh-sm">0.937</td>
                            <td class="lh-sm">0.024</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              172.5</td>
                            <td class="text-info-dark lh-sm">0.12 </td>
                            <td class="text-info-dark lh-sm">0.13 </td>
                            <td class="lh-sm">0.12 </td>
                            <td class="lh-sm">-0.064 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">5.30</td>
                            <td class="text-info-dark lh-sm">5.45</td>
                            <td class="lh-sm">5.35</td>
                            <td class="lh-sm">0.871</td>
                            <td class="lh-sm">0.034</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              175</td>
                            <td class="text-info-dark lh-sm">0.26 </td>
                            <td class="text-info-dark lh-sm">0.27 </td>
                            <td class="lh-sm">0.27 </td>
                            <td class="lh-sm">-0.130 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">3.25</td>
                            <td class="text-info-dark lh-sm">3.30</td>
                            <td class="lh-sm">3.28</td>
                            <td class="lh-sm">0.732</td>
                            <td class="lh-sm">0.044</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              177.5</td>
                            <td class="text-info-dark lh-sm">0.66 </td>
                            <td class="text-info-dark lh-sm">0.67 </td>
                            <td class="lh-sm">0.66 </td>
                            <td class="lh-sm">-0.269 </td>
                            <td class="lh-sm">0.078 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              180</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.65</td>
                            <td class="text-info-dark lh-sm">0.66</td>
                            <td class="lh-sm">0.65</td>
                            <td class="lh-sm">0.487</td>
                            <td class="lh-sm">0.063</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              182.5</td>
                            <td class="text-info-dark lh-sm">3.10 </td>
                            <td class="text-info-dark lh-sm">3.00 </td>
                            <td class="lh-sm">3.10 </td>
                            <td class="lh-sm">-0.431 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.22</td>
                            <td class="text-info-dark lh-sm">0.23</td>
                            <td class="lh-sm">0.23</td>
                            <td class="lh-sm">0.234</td>
                            <td class="lh-sm">0.072</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              185</td>
                            <td class="text-info-dark lh-sm">5.05 </td>
                            <td class="text-info-dark lh-sm">5.25 </td>
                            <td class="lh-sm">5.15 </td>
                            <td class="lh-sm">-0.987 </td>
                            <td class="lh-sm">0.023 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.08</td>
                            <td class="text-info-dark lh-sm">0.09</td>
                            <td class="lh-sm">0.08</td>
                            <td class="lh-sm">0.123</td>
                            <td class="lh-sm">0.084</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              187.5</td>
                            <td class="text-info-dark lh-sm">7.45 </td>
                            <td class="text-info-dark lh-sm">7.70 </td>
                            <td class="lh-sm">7.90 </td>
                            <td class="lh-sm">-0.897 </td>
                            <td class="lh-sm">0.087 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.04</td>
                            <td class="text-info-dark lh-sm">0.05</td>
                            <td class="lh-sm">0.04</td>
                            <td class="lh-sm">0.012</td>
                            <td class="lh-sm">0.088</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              190</td>
                            <td class="text-info-dark lh-sm">9.90 </td>
                            <td class="text-info-dark lh-sm">10.15 </td>
                            <td class="lh-sm">10.05 </td>
                            <td class="lh-sm">-0.988 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              192</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="microsoft-tab" role="tabpanel" aria-labelledby="tab-microsoft">
                <div class="row justify-content-between g-3 mb-5">
                  <div class="col-auto">
                    <h4 class="text-body-tertiary mb-2 lh-sm">MSFT</h4>
                    <h3 class="text-body-highlight d-flex gap-2 flex-between-center lh-sm mb-0"> $414.71<span class="badge badge-phoenix fs-10 d-flex flex-between-center badge-phoenix-success"> 1.26%<span class="ms-1 fas fa-chevron-up"></span></span></h3>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center gap-2"><a class="btn btn-sm btn-phoenix-primary"
                        href="../apps/stock/stock-details.html">View full stock details<span class="ms-2 fas fa-up-right-from-square"></span></a><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-clock"> </span></button><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-eye"> </span></button></div>
                  </div>
                </div>
                <ul class="nav nav-underline optionChainTableHeader mb-4 gap-0" id="companyStatesTab-5" role="tablist">
                  <li class="nav-item"> <a class="nav-link pt-0 active pe-2" id="chart-tab-5"
                      href="stock.html#tab-chart-5" data-bs-toggle="tab" role="tab" aria-controls="tab-chart-5"
                      aria-selected="true">Chart</a>
                    </li>
                  <li class="nav-item"> <a class="nav-link pt-0 px-3" id="option-chain-tab-5"
                      href="stock.html#tab-optionChain-5" data-bs-toggle="tab" role="tab"
                      aria-controls="tab-optionChain-5" aria-selected="false">Option Chain</a>
                    </li>
                  <li class="nav-item flex-1"> <a class="nav-link disabled h-100" id="empty-div-5" href="stock.html#!" data-bs-toggle="tab" role="tab" aria-selected="false"></a>
                </li>
                </ul>
                <div class="tab-content" id="companyStatesTabContent-5">
                  <div class="tab-pane fade show active" id="tab-chart-5" role="tabpanel" aria-labelledby="chart-tab-5">
                    <div class="scrollbar mb-4">
                      <div class="btn-group stock-btn-group btn-group-sm text-nowrap" role="group" aria-label="top-stock-chart-filter"><button class="btn btn-phoenix-secondary fw-bolder active">1
                          D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ay</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ays</span></button><button class="btn btn-phoenix-secondary fw-bolder">3 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">6 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">1 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ear</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ears</span></button><button class="btn btn-phoenix-secondary fw-bolder">Max</button></div>
                    </div>
                    <div class="top-stock-chart"> <canvas id="top-stock-microsoft-chart" style="width: 100%; min-height: 36.5rem; max-height: 36.5rem;"></canvas></div>
                  </div>
                  <div class="tab-pane fade" role="tabpanel" id="tab-optionChain-5" aria-labelledby="option-chain-tab-5">
                    <div class="swiper-theme-container optionChainTableHeader nav nav-underline">
                      <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":5,"breakpoints":{"0":{"slidesPerView":1.5},"560":{"slidesPerView":2.5},"768":{"slidesPerView":3.5},"1200":{"slidesPerView":3},"1560":{"slidesPerView":4},"1800":{"slidesPerView":5}},"grabCursor":true,"navigation":true}'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100 active"><span class="fs-8">May 17, 24
                              </span><span class="text-body-tertiary fs-9 fw-semibold">(4 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">May 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(11 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 01, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(18 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 08, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(25 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 15, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(32 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(41 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 31, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(48 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jul 07, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(56 Days)</span></button></div>
                        </div>
                        <div class="swiper-nav">
                          <div class="swiper-button-next"> <span class="fas fa-chevron-right nav-icon"></span></div>
                          <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive scrollbar">
                      <table class="table text-center mb-0">
                        <thead>
                          <tr>
                            <th colspan="5">Calls</th>
                            <th class="bg-body-highlight border-x border-translucent">Strike Price </th>
                            <th colspan="5">Puts</th>
                          </tr>
                          <tr class="fs-10 text-uppercase">
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                            <th class="bg-body-highlight border-x border-translucent" style="min-width: 7.5rem;">IV
                              19.4%</th>
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">12.50</td>
                            <td class="text-info-dark lh-sm">12.75</td>
                            <td class="lh-sm">12.30</td>
                            <td class="lh-sm">0.977</td>
                            <td class="lh-sm">0.008</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              174</td>
                            <td class="text-info-dark lh-sm">0.06 </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="lh-sm">0.06 </td>
                            <td class="lh-sm">-0.023 </td>
                            <td class="lh-sm">0.008 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">10.15</td>
                            <td class="text-info-dark lh-sm">10.25</td>
                            <td class="lh-sm">10.25</td>
                            <td class="lh-sm">0.964</td>
                            <td class="lh-sm">0.014</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">5
                            </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="text-info-dark lh-sm">0.08 </td>
                            <td class="lh-sm">0.07 </td>
                            <td class="lh-sm">-0.035 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">7.65</td>
                            <td class="text-info-dark lh-sm">8.05</td>
                            <td class="lh-sm">7.80</td>
                            <td class="lh-sm">0.937</td>
                            <td class="lh-sm">0.024</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              172.5</td>
                            <td class="text-info-dark lh-sm">0.12 </td>
                            <td class="text-info-dark lh-sm">0.13 </td>
                            <td class="lh-sm">0.12 </td>
                            <td class="lh-sm">-0.064 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">5.30</td>
                            <td class="text-info-dark lh-sm">5.45</td>
                            <td class="lh-sm">5.35</td>
                            <td class="lh-sm">0.871</td>
                            <td class="lh-sm">0.034</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              175</td>
                            <td class="text-info-dark lh-sm">0.26 </td>
                            <td class="text-info-dark lh-sm">0.27 </td>
                            <td class="lh-sm">0.27 </td>
                            <td class="lh-sm">-0.130 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">3.25</td>
                            <td class="text-info-dark lh-sm">3.30</td>
                            <td class="lh-sm">3.28</td>
                            <td class="lh-sm">0.732</td>
                            <td class="lh-sm">0.044</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              177.5</td>
                            <td class="text-info-dark lh-sm">0.66 </td>
                            <td class="text-info-dark lh-sm">0.67 </td>
                            <td class="lh-sm">0.66 </td>
                            <td class="lh-sm">-0.269 </td>
                            <td class="lh-sm">0.078 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              180</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.65</td>
                            <td class="text-info-dark lh-sm">0.66</td>
                            <td class="lh-sm">0.65</td>
                            <td class="lh-sm">0.487</td>
                            <td class="lh-sm">0.063</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              182.5</td>
                            <td class="text-info-dark lh-sm">3.10 </td>
                            <td class="text-info-dark lh-sm">3.00 </td>
                            <td class="lh-sm">3.10 </td>
                            <td class="lh-sm">-0.431 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.22</td>
                            <td class="text-info-dark lh-sm">0.23</td>
                            <td class="lh-sm">0.23</td>
                            <td class="lh-sm">0.234</td>
                            <td class="lh-sm">0.072</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              185</td>
                            <td class="text-info-dark lh-sm">5.05 </td>
                            <td class="text-info-dark lh-sm">5.25 </td>
                            <td class="lh-sm">5.15 </td>
                            <td class="lh-sm">-0.987 </td>
                            <td class="lh-sm">0.023 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.08</td>
                            <td class="text-info-dark lh-sm">0.09</td>
                            <td class="lh-sm">0.08</td>
                            <td class="lh-sm">0.123</td>
                            <td class="lh-sm">0.084</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              187.5</td>
                            <td class="text-info-dark lh-sm">7.45 </td>
                            <td class="text-info-dark lh-sm">7.70 </td>
                            <td class="lh-sm">7.90 </td>
                            <td class="lh-sm">-0.897 </td>
                            <td class="lh-sm">0.087 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.04</td>
                            <td class="text-info-dark lh-sm">0.05</td>
                            <td class="lh-sm">0.04</td>
                            <td class="lh-sm">0.012</td>
                            <td class="lh-sm">0.088</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              190</td>
                            <td class="text-info-dark lh-sm">9.90 </td>
                            <td class="text-info-dark lh-sm">10.15 </td>
                            <td class="lh-sm">10.05 </td>
                            <td class="lh-sm">-0.988 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              192</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="intel-tab" role="tabpanel" aria-labelledby="tab-intel">
                <div class="row justify-content-between g-3 mb-5">
                  <div class="col-auto">
                    <h4 class="text-body-tertiary mb-2 lh-sm">INTEL</h4>
                    <h3 class="text-body-highlight d-flex gap-2 flex-between-center lh-sm mb-0"> $23.32<span class="badge badge-phoenix fs-10 d-flex flex-between-center badge-phoenix-success"> 4.2%<span class="ms-1 fas fa-chevron-up"></span></span></h3>
                  </div>
                  <div class="col-auto">
                    <div class="d-flex align-items-center gap-2"><a class="btn btn-sm btn-phoenix-primary"
                        href="../apps/stock/stock-details.html">View full stock details<span class="ms-2 fas fa-up-right-from-square"></span></a><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-clock"> </span></button><button class="btn btn-sm btn-phoenix-secondary"> <span class="fas fa-eye"> </span></button></div>
                  </div>
                </div>
                <ul class="nav nav-underline optionChainTableHeader mb-4 gap-0" id="companyStatesTab-6" role="tablist">
                  <li class="nav-item"> <a class="nav-link pt-0 active pe-2" id="chart-tab-6"
                      href="stock.html#tab-chart-6" data-bs-toggle="tab" role="tab" aria-controls="tab-chart-6"
                      aria-selected="true">Chart</a>
                    </li>
                  <li class="nav-item"> <a class="nav-link pt-0 px-3" id="option-chain-tab-6"
                      href="stock.html#tab-optionChain-6" data-bs-toggle="tab" role="tab"
                      aria-controls="tab-optionChain-6" aria-selected="false">Option Chain</a>
                    </li>
                  <li class="nav-item flex-1"> <a class="nav-link disabled h-100" id="empty-div-6" href="stock.html#!" data-bs-toggle="tab" role="tab" aria-selected="false"></a>
                </li>
                </ul>
                <div class="tab-content" id="companyStatesTabContent-6">
                  <div class="tab-pane fade show active" id="tab-chart-6" role="tabpanel" aria-labelledby="chart-tab-6">
                    <div class="scrollbar mb-4">
                      <div class="btn-group stock-btn-group btn-group-sm text-nowrap" role="group" aria-label="top-stock-chart-filter"><button class="btn btn-phoenix-secondary fw-bolder active">1
                          D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ay</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 D<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ays</span></button><button class="btn btn-phoenix-secondary fw-bolder">3 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">6 M<span class="d-none d-sm-inline d-xl-none d-xxl-inline">onths</span></button><button class="btn btn-phoenix-secondary fw-bolder">1 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ear</span></button><button class="btn btn-phoenix-secondary fw-bolder">5 Y<span class="d-none d-sm-inline d-xl-none d-xxl-inline">ears</span></button><button class="btn btn-phoenix-secondary fw-bolder">Max</button></div>
                    </div>
                    <div class="top-stock-chart"> <canvas id="top-stock-intel-chart" style="width: 100%; min-height: 36.5rem; max-height: 36.5rem;"></canvas></div>
                  </div>
                  <div class="tab-pane fade" role="tabpanel" id="tab-optionChain-6" aria-labelledby="option-chain-tab-6">
                    <div class="swiper-theme-container optionChainTableHeader nav nav-underline">
                      <div class="swiper theme-slider" data-swiper='{"loop":true,"slidesPerView":5,"breakpoints":{"0":{"slidesPerView":1.5},"560":{"slidesPerView":2.5},"768":{"slidesPerView":3.5},"1200":{"slidesPerView":3},"1560":{"slidesPerView":4},"1800":{"slidesPerView":5}},"grabCursor":true,"navigation":true}'>
                        <div class="swiper-wrapper">
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100 active"><span class="fs-8">May 17, 24
                              </span><span class="text-body-tertiary fs-9 fw-semibold">(4 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">May 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(11 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 01, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(18 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 08, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(25 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 15, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(32 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 24, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(41 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jun 31, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(48 Days)</span></button></div>
                          <div class="swiper-slide nav-item"><button class="nav-link text-center text-nowrap w-100"><span class="fs-8">Jul 07, 24 </span><span class="text-body-tertiary fs-9 fw-semibold">(56 Days)</span></button></div>
                        </div>
                        <div class="swiper-nav">
                          <div class="swiper-button-next"> <span class="fas fa-chevron-right nav-icon"></span></div>
                          <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive scrollbar">
                      <table class="table text-center mb-0">
                        <thead>
                          <tr>
                            <th colspan="5">Calls</th>
                            <th class="bg-body-highlight border-x border-translucent">Strike Price </th>
                            <th colspan="5">Puts</th>
                          </tr>
                          <tr class="fs-10 text-uppercase">
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                            <th class="bg-body-highlight border-x border-translucent" style="min-width: 7.5rem;">IV
                              19.4%</th>
                            <th style="min-width: 6.688rem;">BID</th>
                            <th style="min-width: 6.688rem;">ASK </th>
                            <th style="min-width: 6.688rem;">last </th>
                            <th style="min-width: 6.688rem;">delta </th>
                            <th style="min-width: 6.688rem;">gamma</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">12.50</td>
                            <td class="text-info-dark lh-sm">12.75</td>
                            <td class="lh-sm">12.30</td>
                            <td class="lh-sm">0.977</td>
                            <td class="lh-sm">0.008</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              174</td>
                            <td class="text-info-dark lh-sm">0.06 </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="lh-sm">0.06 </td>
                            <td class="lh-sm">-0.023 </td>
                            <td class="lh-sm">0.008 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">10.15</td>
                            <td class="text-info-dark lh-sm">10.25</td>
                            <td class="lh-sm">10.25</td>
                            <td class="lh-sm">0.964</td>
                            <td class="lh-sm">0.014</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">5
                            </td>
                            <td class="text-info-dark lh-sm">0.07 </td>
                            <td class="text-info-dark lh-sm">0.08 </td>
                            <td class="lh-sm">0.07 </td>
                            <td class="lh-sm">-0.035 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">7.65</td>
                            <td class="text-info-dark lh-sm">8.05</td>
                            <td class="lh-sm">7.80</td>
                            <td class="lh-sm">0.937</td>
                            <td class="lh-sm">0.024</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              172.5</td>
                            <td class="text-info-dark lh-sm">0.12 </td>
                            <td class="text-info-dark lh-sm">0.13 </td>
                            <td class="lh-sm">0.12 </td>
                            <td class="lh-sm">-0.064 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">5.30</td>
                            <td class="text-info-dark lh-sm">5.45</td>
                            <td class="lh-sm">5.35</td>
                            <td class="lh-sm">0.871</td>
                            <td class="lh-sm">0.034</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              175</td>
                            <td class="text-info-dark lh-sm">0.26 </td>
                            <td class="text-info-dark lh-sm">0.27 </td>
                            <td class="lh-sm">0.27 </td>
                            <td class="lh-sm">-0.130 </td>
                            <td class="lh-sm">0.046 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">3.25</td>
                            <td class="text-info-dark lh-sm">3.30</td>
                            <td class="lh-sm">3.28</td>
                            <td class="lh-sm">0.732</td>
                            <td class="lh-sm">0.044</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              177.5</td>
                            <td class="text-info-dark lh-sm">0.66 </td>
                            <td class="text-info-dark lh-sm">0.67 </td>
                            <td class="lh-sm">0.66 </td>
                            <td class="lh-sm">-0.269 </td>
                            <td class="lh-sm">0.078 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              180</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.65</td>
                            <td class="text-info-dark lh-sm">0.66</td>
                            <td class="lh-sm">0.65</td>
                            <td class="lh-sm">0.487</td>
                            <td class="lh-sm">0.063</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              182.5</td>
                            <td class="text-info-dark lh-sm">3.10 </td>
                            <td class="text-info-dark lh-sm">3.00 </td>
                            <td class="lh-sm">3.10 </td>
                            <td class="lh-sm">-0.431 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.22</td>
                            <td class="text-info-dark lh-sm">0.23</td>
                            <td class="lh-sm">0.23</td>
                            <td class="lh-sm">0.234</td>
                            <td class="lh-sm">0.072</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              185</td>
                            <td class="text-info-dark lh-sm">5.05 </td>
                            <td class="text-info-dark lh-sm">5.25 </td>
                            <td class="lh-sm">5.15 </td>
                            <td class="lh-sm">-0.987 </td>
                            <td class="lh-sm">0.023 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.08</td>
                            <td class="text-info-dark lh-sm">0.09</td>
                            <td class="lh-sm">0.08</td>
                            <td class="lh-sm">0.123</td>
                            <td class="lh-sm">0.084</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              187.5</td>
                            <td class="text-info-dark lh-sm">7.45 </td>
                            <td class="text-info-dark lh-sm">7.70 </td>
                            <td class="lh-sm">7.90 </td>
                            <td class="lh-sm">-0.897 </td>
                            <td class="lh-sm">0.087 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">0.04</td>
                            <td class="text-info-dark lh-sm">0.05</td>
                            <td class="lh-sm">0.04</td>
                            <td class="lh-sm">0.012</td>
                            <td class="lh-sm">0.088</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              190</td>
                            <td class="text-info-dark lh-sm">9.90 </td>
                            <td class="text-info-dark lh-sm">10.15 </td>
                            <td class="lh-sm">10.05 </td>
                            <td class="lh-sm">-0.988 </td>
                            <td class="lh-sm">0.014 </td>
                          </tr>
                          <tr class="fs-9 fw-semibold">
                            <td class="text-info-dark lh-sm">1.65</td>
                            <td class="text-info-dark lh-sm">1.66</td>
                            <td class="lh-sm">1.64</td>
                            <td class="lh-sm">0.510</td>
                            <td class="lh-sm">0.054</td>
                            <td class="bg-body-highlight border-x border-translucent text-body-tertiary fw-bold lh-sm">
                              192</td>
                            <td class="text-info-dark lh-sm">1.53 </td>
                            <td class="text-info-dark lh-sm">1.54 </td>
                            <td class="lh-sm">1.54 </td>
                            <td class="lh-sm">-0.498 </td>
                            <td class="lh-sm">0.100 </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>