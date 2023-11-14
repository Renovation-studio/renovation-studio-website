/* eslint-env node */
require('@rushstack/eslint-patch/modern-module-resolution')

module.exports = {
  root: true,
  'extends': [
    'plugin:vue/vue3-essential',
    'plugin:vue/vue3-recommended',
    'eslint:recommended',
    '@vue/eslint-config-typescript'
  ],
  ignorePatterns: ['postcss.config.js'],
  rules: {
    'vue/html-self-closing': ['error', {
      html: {
        void: 'any',
        normal: 'any',
        component: 'always'
      },
      svg: 'always',
      math: 'always'
    }],
    'vue/singleline-html-element-content-newline': 'off'
  },
  parserOptions: {
    ecmaVersion: 'latest'
  }
}
