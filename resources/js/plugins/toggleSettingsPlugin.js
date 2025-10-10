const SettingsPanelPlugin = {
  install(app, options) {
    const toggleSettingsPanel = routeName => {
      const hideRoutes = options?.hideRoutes || [
        'login',
        'sign-up',
        'forgot-password',
      ];
      const panel = document.getElementById('settings-offcanvas');
      const toggleBtn = document.getElementById('settings-toggle');

      if (!panel || !toggleBtn) return;

      if (hideRoutes.includes(routeName)) {
        panel.classList.add('d-none');
        toggleBtn.classList.add('d-none');

        try {
          const bsOffcanvas = bootstrap.Offcanvas.getInstance(panel);
          if (bsOffcanvas) bsOffcanvas.hide();
        } catch (e) {
          console.debug('No se pudo cerrar el offcanvas:', e.message);
        }
      } else {
        panel.classList.remove('d-none');
        toggleBtn.classList.remove('d-none');
      }
    };

    app.config.globalProperties.$toggleSettingsPanel = toggleSettingsPanel;
    app.toggleSettingsPanel = toggleSettingsPanel;
    app.provide('toggleSettingsPanel', toggleSettingsPanel);
  },
};

export default SettingsPanelPlugin;
