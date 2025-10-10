// Importar dependencias de Phoenix
import '@template/vendor/simplebar/simplebar.min.js';
import '@template/vendor/popper/popper.min.js';
import '@template/vendor/anchorjs/anchor.min.js';
import '@template/vendor/is/is.min.js';
import '@template/vendor/lodash/lodash.min.js';
import '@template/vendor/list.js/list.min.js';
import '@template/vendor/feather-icons/feather.min.js';
import '@template/vendor/dayjs/dayjs.min.js';
import '@template/assets/js/config.js';
import '@template/assets/js/phoenix.js';

// Configurar globales que Phoenix necesita
import _ from 'lodash';
import is from 'is_js';
import dayjs from 'dayjs';
import * as feather from 'feather-icons';

window._ = _;
window.is = is;
window.dayjs = dayjs;
window.feather = feather;

export function initializePhoenix() {
  console.log('🔄 Inicializando Phoenix UI...');

  // Esperar a que el DOM esté completamente cargado
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPhoenix);
  } else {
    setTimeout(initPhoenix, 300); // Pequeño delay para asegurar
  }
}

function initPhoenix() {
  try {
    // Verificar que Phoenix esté disponible
    if (typeof window.phoenix === 'undefined') {
      console.error('❌ Phoenix no está disponible');
      return;
    }

    // Sobrescribir detectorInit para evitar errores
    const originalDetectorInit = window.phoenix.utils?.detectorInit;
    if (originalDetectorInit) {
      window.phoenix.utils.detectorInit = function() {
        try {
          if (window.is && typeof window.is.opera === 'function') {
            return originalDetectorInit();
          }
          console.warn('⚠️ DetectorInit omitido - window.is no disponible');
        } catch (error) {
          console.warn('⚠️ Error en detectorInit:', error.message);
        }
      };
    }

    // Ejecutar inicializaciones de Phoenix de forma segura
    const safeDocReady = (fn) => {
      if (typeof fn === 'function') {
        try {
          window.phoenix.utils.docReady(fn);
        } catch (error) {
          console.warn('⚠️ Error en docReady:', error.message);
        }
      }
    };

    // Lista segura de inicializaciones
    const phoenixInitializers = [
      'simplebarInit', 'toastInit', 'tooltipInit', 'featherIconsInit',
      'basicEchartsInit', 'bulkSelectInit', 'listInit', 'anchorJSInit',
      'popoverInit', 'formValidationInit', 'docComponentInit', 'swiperInit',
      'productDetailsInit', 'ratingInit', 'quantityInit', 'choicesInit',
      'tinymceInit', 'responsiveNavItemsInit', 'flatpickrInit', 'iconCopiedInit',
      'isotopeInit', 'bigPictureInit', 'countupInit', 'phoenixOffcanvasInit',
      'todoOffcanvasInit', 'wizardInit', 'glightboxInit', 'themeControl',
      'searchInit', 'handleNavbarVerticalCollapsed', 'navbarInit',
      'navbarComboInit', 'fullCalendarInit', 'picmoInit', 'modalInit',
      'lottieInit', 'navbarShadowOnScrollInit', 'dropdownOnHover',
      'supportChatInit', 'sortableInit', 'copyLink', 'randomColorInit',
      'faqTabInit', 'twoFAVerificarionInit', 'mapboxInit', 'typedTextInit',
      'priceTierFormInit', 'nouisliderInit', 'collapseAllInit',
      'playOnHoverInit', 'passwordToggleInit', 'treeviewInit'
    ];

    // Ejecutar cada inicializador de forma segura
    phoenixInitializers.forEach(initName => {
      if (typeof window[initName] === 'function') {
        safeDocReady(window[initName]);
      }
    });

    console.log('✅ Phoenix UI inicializado correctamente');

  } catch (error) {
    console.error('❌ Error crítico en Phoenix:', error);
  }
}