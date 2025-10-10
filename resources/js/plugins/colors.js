import { bootstrapColors } from '@/Utils/UtilColors';

const ColorPlugin = {
  install(app) {
    // Hacer colores disponibles globalmente
    app.config.globalProperties.$colors = bootstrapColors;

    // Métodos helper
    app.config.globalProperties.$getColor = (color, shade = 500) => {
      return bootstrapColors[color]?.[shade] || '#000000';
    };

    app.config.globalProperties.$rgba = (color, shade = 500, alpha = 1) => {
      const hex = app.config.globalProperties.$getColor(color, shade);
      const r = parseInt(hex.slice(1, 3), 16);
      const g = parseInt(hex.slice(3, 5), 16);
      const b = parseInt(hex.slice(5, 7), 16);
      return `rgba(${r}, ${g}, ${b}, ${alpha})`;
    };
  },
};

export default ColorPlugin;
