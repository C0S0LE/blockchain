<script setup>
import { route } from 'ziggy-js';
import { Link } from '@inertiajs/vue3';
import DropdownProfile from './dropdownProfile.vue';

import imgIconNavbar from '@template/assets/img/icons/icon-wrc.png';
import imgIconsBehance from '@template/assets/img/nav-icons/behance.webp';
import imgIconsBoogle from '@template/assets/img/nav-icons/google-cloud.webp';
import imgIconsSlack from '@template/assets/img/nav-icons/slack.webp';
import imgIconsGitlab from '@template/assets/img/nav-icons/gitlab.webp';
import imgIconsBitbucket from '@template/assets/img/nav-icons/bitbucket.webp';
import imgIconsGoogleDrive from '@template/assets/img/nav-icons/google-drive.webp';
import imgIconsTrello from '@template/assets/img/nav-icons/trello.webp';
import imgIconsFigma from '@template/assets/img/nav-icons/figma.webp';
import imgIconsTwitter from '@template/assets/img/nav-icons/twitter.webp';
import imgIconsPinterest from '@template/assets/img/nav-icons/pinterest.webp';
import imgIconsLn from '@template/assets/img/nav-icons/ln.webp';
import imgIconsGoogleMaps from '@template/assets/img/nav-icons/google-maps.webp';
import imgIconsGooglePhotos from '@template/assets/img/nav-icons/google-photos.webp';
import imgIconsSpotify from '@template/assets/img/nav-icons/spotify.webp';
import imgIcons60x603 from '@template/assets/img/products/60x60/3.png';
import imgIcons40x4010 from '@template/assets/img/team/40x40/10.webp';
import imgIcons40x4012 from '@template/assets/img/team/40x40/12.webp';

import DropdownNotfication from './DropdownNotfication.vue';
import LinkNavigate from '@/Shared/Buttons/LinkNavigate.vue';
</script>

<template>
  <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarCombo" data-navbar-top="combo"
    data-move-target="#navbarVerticalNav">
    <div class="navbar-logo me-auto">
      <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
        aria-label="Toggle Navigation">
        <span class="navbar-toggle-icon">
          <span class="toggle-line"></span>
        </span>
      </button>
      <LinkNavigate :href="route('panel.dashboard')" class="navbar-brand me-1 me-sm-3">
        <div class="d-flex align-items-center">
          <div class="d-flex align-items-center">
            <img :src="imgIconNavbar" alt="phoenix" width="27" />
            <h5 class="logo-text ms-2 d-none d-sm-block text-warning">WRC</h5>
          </div>
        </div>
      </LinkNavigate>
    </div>
    <ul class="navbar-nav navbar-nav-icons flex-row">
      <li class="nav-item">
        <div class="theme-control-toggle fa-icon-wait px-2">
          <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
          <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme" style="height:32px;width:32px;">
            <span class="icon" data-feather="moon"></span>
          </label>
          <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme" style="height:32px;width:32px;">
            <span class="icon" data-feather="sun"></span>
          </label>
        </div>
      </li>
      <li class="nav-item">
        <button class="nav-link" href="javascript:(0)" data-bs-toggle="modal" data-bs-target="#searchBoxModal">
          <span class="d-block" style="height:20px;width:20px;">
            <span data-feather="search" style="height:19px;width:19px;margin-bottom: 2px;"></span>
          </span>
        </button>
      </li>
      <li class="nav-item dropdown">
        <DropdownNotfication />
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdownNindeDots" href="#!" role="button" data-bs-toggle="dropdown"
          aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
          <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
            <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
            <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
            <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
            <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
            <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
            <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
            <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
            <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
          </svg>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
          aria-labelledby="navbarDropdownNindeDots">
          <div class="card bg-body-emphasis position-relative border-0">
            <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
              <div class="row text-center align-items-center gx-0 gy-0">
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsBehance" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Behance</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsBoogle" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Cloud</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsSlack" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Slack</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsGitlab" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Gitlab</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsBitbucket" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">BitBucket</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsGoogleDrive" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Drive</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsTrello" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Trello</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsFigma" alt="" width="20" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Figma</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsTwitter" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Twitter</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsPinterest" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Pinterest</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsLn" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Linkedin</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsGoogleMaps" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Maps</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsGooglePhotos" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Photos</p>
                  </a>
                </div>
                <div class="col-4">
                  <a class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3" href="#!">
                    <img :src="imgIconsSpotify" alt="" width="30" />
                    <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">Spotify</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <DropdownProfile />
      </li>
    </ul>
  </nav>

  <div class="modal fade" id="searchBoxModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" data-phoenix-modal="data-phoenix-modal" aria-modal="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content mt-15 rounded-pill">
        <div class="modal-body p-0">
          <div class="search-box navbar-top-search-box" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}" style="width: auto;">
            <form class="position-relative show" data-bs-toggle="search" data-bs-display="static" aria-expanded="true">
              <input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search" placeholder="Search..." aria-label="Search">
              <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                </path>
              </svg>
            </form>
            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="modal">
              <button class="btn btn-link p-0" aria-label="Close"></button>
            </div>
            <div class="dropdown-menu border start-0 py-0 overflow-hidden w-100 show">
              <div class="scrollbar-overlay simplebar-scrollable-y" style="max-height: 30rem;" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                  <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                  </div>
                  <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                      <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                          <div class="list pb-3">
                            <h6 class="dropdown-header text-body-highlight fs-10 py-2">24 <span class="text-body-quaternary">results</span></h6>
                            <hr class="my-0">
                            <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                              Recently Searched </h6>
                            <div class="py-2">
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title">
                                    <svg class="svg-inline--fa fa-clock-rotate-left" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock-rotate-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                      <g transform="translate(256 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" transform="translate(-256 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Store Macbook</div>
                                </div>
                              </a>
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title"> <svg class="svg-inline--fa fa-clock-rotate-left" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clock-rotate-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                      <g transform="translate(256 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" transform="translate(-256 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    MacBook Air - 13″</div>
                                </div>
                              </a>
                            </div>
                            <hr class="my-0">
                            <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                              Products</h6>
                            <div class="py-2">
                              <a class="dropdown-item py-2 d-flex align-items-center" href="#!">
                                <div class="file-thumbnail me-2">
                                  <img class="h-100 w-100 object-fit-cover rounded-3" :src="imgIcons60x603" alt="">
                                </div>
                                <div class="flex-1">
                                  <h6 class="mb-0 text-body-highlight title">MacBook Air - 13″</h6>
                                  <p class="fs-10 mb-0 d-flex text-body-tertiary">
                                    <span class="fw-medium text-body-tertiary text-opactity-85">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                                </div>
                              </a>
                              <a class="dropdown-item py-2 d-flex align-items-center" href="#!">
                                <div class="file-thumbnail me-2">
                                  <img class="img-fluid" :src="imgIcons60x603" alt="">
                                </div>
                                <div class="flex-1">
                                  <h6 class="mb-0 text-body-highlight title">MacBook Pro - 13″</h6>
                                  <p class="fs-10 mb-0 d-flex text-body-tertiary">
                                    <span class="fw-medium text-body-tertiary text-opactity-85">30 Sep at 12:30 PM</span>
                                  </p>
                                </div>
                              </a>
                            </div>
                            <hr class="my-0">
                            <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                              Quick Links</h6>
                            <div class="py-2">
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title">
                                    <svg class="svg-inline--fa fa-link text-body" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="" style="transform-origin: 0.625em 0.5em;">
                                      <g transform="translate(320 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" transform="translate(-320 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-solid fa-link text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Support MacBook House
                                  </div>
                                </div>
                              </a>
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title">
                                    <svg class="svg-inline--fa fa-link text-body" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="" style="transform-origin: 0.625em 0.5em;">
                                      <g transform="translate(320 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" transform="translate(-320 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-solid fa-link text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Store MacBook″
                                  </div>
                                </div>
                              </a>
                            </div>
                            <hr class="my-0">
                            <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                              Files</h6>
                            <div class="py-2">
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title">
                                    <svg class="svg-inline--fa fa-file-zipper text-body" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-zipper" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;">
                                      <g transform="translate(192 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM96 48c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16zm-6.3 71.8c3.7-14 16.4-23.8 30.9-23.8l14.8 0c14.5 0 27.2 9.7 30.9 23.8l23.5 88.2c1.4 5.4 2.1 10.9 2.1 16.4c0 35.2-28.8 63.7-64 63.7s-64-28.5-64-63.7c0-5.5 .7-11.1 2.1-16.4l23.5-88.2zM112 336c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0z" transform="translate(-192 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-solid fa-file-zipper text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Library MacBook folder.rar</div>
                                </div>
                              </a>
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title"> <svg class="svg-inline--fa fa-file-lines text-body" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-lines" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;">
                                      <g transform="translate(192 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM112 256l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" transform="translate(-192 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-solid fa-file-lines text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Feature MacBook extensions.txt</div>
                                </div>
                              </a>
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title"> <svg class="svg-inline--fa fa-image text-body" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                      <g transform="translate(256 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6l96 0 32 0 208 0c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" transform="translate(-256 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-solid fa-image text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    MacBook Pro_13.jpg</div>
                                </div>
                              </a>
                            </div>
                            <hr class="my-0">
                            <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                              Members</h6>
                            <div class="py-2">
                              <a class="dropdown-item py-2 d-flex align-items-center" href="#!">
                                <div class="avatar avatar-l status-online  me-2 text-body">
                                  <img class="rounded-circle " :src="imgIcons40x4010" alt="">
                                </div>
                                <div class="flex-1">
                                  <h6 class="mb-0 text-body-highlight title">Carry Anna</h6>
                                  <p class="fs-10 mb-0 d-flex text-body-tertiary">anna@technext.it</p>
                                </div>
                              </a>
                              <a class="dropdown-item py-2 d-flex align-items-center" href="#!">
                                <div class="avatar avatar-l  me-2 text-body">
                                  <img class="rounded-circle " :src="imgIcons40x4012" alt="">
                                </div>
                                <div class="flex-1">
                                  <h6 class="mb-0 text-body-highlight title">John Smith</h6>
                                  <p class="fs-10 mb-0 d-flex text-body-tertiary">smith@technext.it</p>
                                </div>
                              </a>
                            </div>
                            <hr class="my-0">
                            <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                              Related Searches</h6>
                            <div class="py-2">
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title">
                                    <svg class="svg-inline--fa fa-firefox-browser text-body" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="firefox-browser" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                      <g transform="translate(256 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M130.22 127.548C130.38 127.558 130.3 127.558 130.22 127.548V127.548ZM481.64 172.898C471.03 147.398 449.56 119.898 432.7 111.168C446.42 138.058 454.37 165.048 457.4 185.168C457.405 185.306 457.422 185.443 457.45 185.578C429.87 116.828 383.098 89.1089 344.9 28.7479C329.908 5.05792 333.976 3.51792 331.82 4.08792L331.7 4.15792C284.99 30.1109 256.365 82.5289 249.12 126.898C232.503 127.771 216.219 131.895 201.19 139.035C199.838 139.649 198.736 140.706 198.066 142.031C197.396 143.356 197.199 144.87 197.506 146.323C197.7 147.162 198.068 147.951 198.586 148.639C199.103 149.327 199.76 149.899 200.512 150.318C201.264 150.737 202.096 150.993 202.954 151.071C203.811 151.148 204.676 151.045 205.491 150.768L206.011 150.558C221.511 143.255 238.408 139.393 255.541 139.238C318.369 138.669 352.698 183.262 363.161 201.528C350.161 192.378 326.811 183.338 304.341 187.248C392.081 231.108 368.541 381.784 246.951 376.448C187.487 373.838 149.881 325.467 146.421 285.648C146.421 285.648 157.671 243.698 227.041 243.698C234.541 243.698 255.971 222.778 256.371 216.698C256.281 214.698 213.836 197.822 197.281 181.518C188.434 172.805 184.229 168.611 180.511 165.458C178.499 163.75 176.392 162.158 174.201 160.688C168.638 141.231 168.399 120.638 173.51 101.058C148.45 112.468 128.96 130.508 114.8 146.428H114.68C105.01 134.178 105.68 93.7779 106.25 85.3479C106.13 84.8179 99.022 89.0159 98.1 89.6579C89.5342 95.7103 81.5528 102.55 74.26 110.088C57.969 126.688 30.128 160.242 18.76 211.318C14.224 231.701 12 255.739 12 263.618C12 398.318 121.21 507.508 255.92 507.508C376.56 507.508 478.939 420.281 496.35 304.888C507.922 228.192 481.64 173.82 481.64 172.898Z" transform="translate(-256 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-brands fa-firefox-browser text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Search in the Web MacBook
                                  </div>
                                </div>
                              </a>
                              <a class="dropdown-item" href="#!">
                                <div class="d-flex align-items-center">
                                  <div class="fw-normal text-body-highlight title">
                                    <svg class="svg-inline--fa fa-chrome text-body" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="chrome" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                      <g transform="translate(256 256)">
                                        <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                          <path fill="currentColor" d="M0 256C0 209.4 12.47 165.6 34.27 127.1L144.1 318.3C166 357.5 207.9 384 256 384C270.3 384 283.1 381.7 296.8 377.4L220.5 509.6C95.9 492.3 0 385.3 0 256zM365.1 321.6C377.4 302.4 384 279.1 384 256C384 217.8 367.2 183.5 340.7 160H493.4C505.4 189.6 512 222.1 512 256C512 397.4 397.4 511.1 256 512L365.1 321.6zM477.8 128H256C193.1 128 142.3 172.1 130.5 230.7L54.19 98.47C101 38.53 174 0 256 0C350.8 0 433.5 51.48 477.8 128V128zM168 256C168 207.4 207.4 168 256 168C304.6 168 344 207.4 344 256C344 304.6 304.6 344 256 344C207.4 344 168 304.6 168 256z" transform="translate(-256 -256)"></path>
                                        </g>
                                      </g>
                                    </svg><!-- <span class="fa-brands fa-chrome text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Store MacBook″
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                          <div class="text-center">
                            <p class="fallback fw-bold fs-7 d-none">No Result Found.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="simplebar-placeholder" style="width: 496px; height: 854px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                  <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                  <div class="simplebar-scrollbar" style="height: 269px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>