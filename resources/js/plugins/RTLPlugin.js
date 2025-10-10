export const useRTL = () => {
  const handleRTL = () => {
    const phoenixIsRTL = window.config?.config?.phoenixIsRTL ?? false;
    const head = document.head;

    const cssFiles = {
      default: '/assets/css/theme.min.css',
      rtl: '/assets/css/theme-rtl.min.css',
      userDefault: '/assets/css/user.min.css',
      userRTL: '/assets/css/user-rtl.min.css',
    };

    document
      .querySelectorAll('link[data-phoenix-css]')
      .forEach(link => link.remove());

    const createLink = href => {
      const link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = href;
      link.setAttribute('data-phoenix-css', 'true');
      head.appendChild(link);
    };

    if (phoenixIsRTL) {
      createLink(cssFiles.rtl);
      createLink(cssFiles.userRTL);
      document.documentElement.setAttribute('dir', 'rtl');
    } else {
      createLink(cssFiles.default);
      createLink(cssFiles.userDefault);
      document.documentElement.setAttribute('dir', 'ltr');
    }
  };

  return { handleRTL };
};
