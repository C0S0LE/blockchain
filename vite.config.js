import { defineConfig } from 'vite';
import { resolve } from 'path';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import glob from 'fast-glob';

function getFilesArray(patterns) {
  if (!Array.isArray(patterns)) {
    patterns = [patterns];
  }

  return patterns.flatMap(pattern => {
    const files = glob.sync(pattern);
    return files.map(file => resolve(__dirname, file));
  });
}

const jsEntries = [
  ...getFilesArray('resources/js/app.js'),
  // ...getFilesArray('resources/core/assets/js/config.js'),
  // ...getFilesArray('resources/core/vendor/simplebar/simplebar.min.js'),
];

const cssEntries = [
  // ...getFilesArray('resources/core/verdor/simplebar/simplebar.min.css'),
  // ...getFilesArray('resources/core/assets/css/theme-rtl.min.css'),
  // ...getFilesArray('resources/core/assets/css/theme.min.css'),
  // ...getFilesArray('resources/core/assets/css/user-rtl.min.css'),
  // ...getFilesArray('resources/core/assets/css/user.min.css'),
];

export default defineConfig({
  plugins: [
    laravel({
      input: [...jsEntries, ...cssEntries],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],

  optimizeDeps: {
    exclude: ['echarts'],
  },

  build: {
    commonjsOptions: {
      include: [/node_modules/],
    },
  },
  resolve: {
    alias: {
      '@': resolve(__dirname, 'resources/js'),
      '@template': resolve(__dirname, 'resources/core'),
      // phoenix: path.resolve(__dirname, 'public/assets/js/phoenix.js'),
    },
  },
});
