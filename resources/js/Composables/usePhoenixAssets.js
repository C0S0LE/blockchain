import { onMounted, onBeforeUnmount } from 'vue';

const DATA_CSS = 'data-phoenix-css';
const DATA_JS = 'data-phoenix-js';
const DATA_CONFIG = 'data-phoenix-config';

export const usePhoenixAssets = () => {
  const cssList = {
    default: '@template/assets/css/theme.min.css',
    rtl: '@template/assets/css/theme-rtl.min.css',
    userDefault: '@template/assets/css/user.min.css',
    userRTL: '@template/assets/css/user-rtl.min.css',
    simplebar: '@template/vendor/simplebar/simplebar.min.css',
  };

  const jsList = {
    simplebar: '@template/vendor/simplebar/simplebar.min.js',
    popper: '@template/vendor/popper/popper.min.js',
    bootstrap: '@template/vendor/bootstrap/bootstrap.min.js',
    phoenix: '@template/assets/js/phoenix.js',
  };

  const appendCss = (href) => {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = href;
    link.setAttribute(DATA_CSS, 'true');
    document.head.appendChild(link);
    return link;
  };

  const appendScript = (src, attrs = {}) => {
    return new Promise((resolve, reject) => {
      const script = document.createElement('script');
      script.src = src;
      script.async = false; // preserva orden
      script.setAttribute(DATA_JS, 'true');
      Object.keys(attrs).forEach(k => script.setAttribute(k, attrs[k]));
      script.onload = () => resolve(script);
      script.onerror = (e) => reject(e);
      document.body.appendChild(script);
    });
  };

  const removePhoenixAssets = () => {
    document.querySelectorAll(`link[${DATA_CSS}]`).forEach(n => n.remove());
    document.querySelectorAll(`script[${DATA_JS}]`).forEach(n => n.remove());
    // no tocamos otros scripts que no tengan nuestro attr
  };

  // resuelve una ruta mediante import dinámico ?url (evita bundling estático)
  const resolveUrl = async (path) => {
    const mod = await import(/* @vite-ignore */ `${path}?url`);
    return mod.default;
  };

  // Load assets (only those necessary) and set RTL/LTR
  const loadPhoenixForLayout = async () => {
    // primero resolve URLs en paralelo
    const [
      themeDefaultUrl,
      themeRtlUrl,
      userDefaultUrl,
      userRtlUrl,
      simplebarCssUrl,
      simplebarJsUrl,
      popperUrl,
      bootstrapUrl,
      phoenixJsUrl,
      configJsUrl
    ] = await Promise.all([
      resolveUrl(cssList.default),
      resolveUrl(cssList.rtl),
      resolveUrl(cssList.userDefault), // cuidado: nota abajo
      resolveUrl(cssList.userRTL),
      resolveUrl(cssList.simplebar),
      resolveUrl(jsList.simplebar),
      resolveUrl(jsList.popper),
      resolveUrl(jsList.bootstrap),
      resolveUrl(jsList.phoenix),
      // config.js: si lo tienes en template
      resolveUrl('@template/assets/js/config.js'),
    ].map(p => p.catch(e => {
      console.warn('Phoenix asset missing or failed to resolve:', e);
      return null;
    })));

    // primero cargar css base que no dependan del theme (ej: simplebar)
    if (simplebarCssUrl) appendCss(simplebarCssUrl);

    // cargar config.js (necesitamos que window.config exista)
    if (configJsUrl) {
      await appendScript(configJsUrl, { [DATA_CONFIG]: 'true' });
    }

    // Asegurarnos de que window.config exista (si no, asumimos LTR)
    const phoenixIsRTL = !!(window.config?.config?.phoenixIsRTL);
    console.log('phoenixIsRTL', phoenixIsRTL);

    // eliminar cualquier css anterior de phoenix (evita mezclas)
    document.querySelectorAll(`link[${DATA_CSS}]`).forEach(n => n.remove());

    // inyectar el theme correcto
    if (phoenixIsRTL) {
      if (themeRtlUrl) appendCss(themeRtlUrl);
      if (userRtlUrl) appendCss(userRtlUrl);
      document.documentElement.setAttribute('dir', 'rtl');
    } else {
      if (themeDefaultUrl) appendCss(themeDefaultUrl);
      if (userDefaultUrl) appendCss(userDefaultUrl);
      document.documentElement.setAttribute('dir', 'ltr');
    }

    // finalmente, cargar scripts que phoenix necesite (popper, bootstrap, simplebar, phoenix.js)
    // cargamos en orden para evitar problemas de dependencia
    if (popperUrl) await appendScript(popperUrl);
    if (bootstrapUrl) await appendScript(bootstrapUrl);
    if (simplebarJsUrl) await appendScript(simplebarJsUrl);
    if (phoenixJsUrl) await appendScript(phoenixJsUrl);

    // listo
  };

  // Hook helpers para usar en componentes
  const useLoadOnMount = () => {
    onMounted(() => {
      loadPhoenixForLayout().catch(err => console.error('Error cargando assets Phoenix:', err));
    });
    onBeforeUnmount(() => {
      removePhoenixAssets();
    });
  };

  return { loadPhoenixForLayout, removePhoenixAssets, useLoadOnMount };
};
