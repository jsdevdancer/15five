module.exports = {
  env: {
    browser: true,
    node: true,
    es2020: true,
  },
  extends: ['airbnb-base', 'eslint-config-prettier'],
  parser: 'babel-eslint',
  parserOptions: {
    ecmaVersion: 11,
  },
  ignorePatterns: ['dist/**', 'vendor/**', 'gulpfile.js', 'build-config.js', 'webpack.config.js'],
  rules: {
    'no-plusplus': 'off',
    'object-shorthand': 'off',
    'func-names': 'off',
    'no-use-before-define': 'off',
    'prefer-object-spread': 'off',
    'consistent-return': ['error', { treatUndefinedAsUnspecified: true }],
    'max-len': ['error', { code: 120 }],
    'no-multiple-empty-lines': ['error', { max: 2 }],
    'no-unused-expressions': ['error', { allowShortCircuit: true, allowTernary: true }],
    'object-curly-newline': ['error', { ObjectPattern: 'never' }],
    'no-unused-vars': 'warn',
  },
};
