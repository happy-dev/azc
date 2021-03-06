module.exports = {
    parserOptions: {
      ecmaVersion: 10,
      sourceType: 'script',
      ecmaFeatures: {
        jsx: true,
        impliedStrict: true
      }
    },
    rules: {
      strict: ['error', 'safe'],
      'no-cond-assign': ['error', 'always'],
      indent: ['warn', 4],
      'array-bracket-spacing': ['warn', 'always'],
      'no-const-assign': 'error',
      radix: 'error',
      // Force usage of ===
      eqeqeq: ['error', 'always'],
      'one-var': ['error', 'never'],
      'prefer-template': 'error',
      'prefer-spread': 'error',
  
      // Enforce using const over let.
      'prefer-const': 'error',
      // var NO MORE please.
      'no-var': 'error',
      // Keep undefined undefined.
      'no-undefined': "error",
      // Please keep variables defined javascript is already too hairy
      'init-declarations': ["error", "always"],
      'no-use-before-define': 'error',
      'block-scoped-var': 'error',
      // French need unicode
      'require-unicode-regexp': 'error',
  
      'prefer-numeric-literals': 'error',
      'no-template-curly-in-string': 'error',
  
      'no-else-return': 0,
      // Eval keyword is forbidden.
      'no-eval': 'error',
      // prefer obj.prop instead of obj['prop'] unless possible.
      'no-extend-native': ['error', { 'exceptions': ['Object'] }],
      'no-implicit-coercion': 'error',
  
      'no-return-assign': 'error',
      'no-throw-literal': 'error',
      // Who know void existed in javascript !?
      'no-void': 'error',
      // No need to await without promises
      'require-await': 'error',
      'no-useless-computed-key': 'error',
      'no-use-before-define': 'error',
      semi: ['error', 'always'],
      'default-case': 'error',
      'no-use-before-define': [
        'error',
        { functions: false, classes: false, variables: true },
      ],
  
      // Documentation is important.
      'require-jsdoc': ['warn', {
        'require': {
            'FunctionDeclaration': true,
            'MethodDefinition': true,
            'ClassDeclaration': true,
            'ArrowFunctionExpression': true,
            'FunctionExpression': true
        }
      }],
  
      // Enforce having {} on if, while etc.
      curly: 'error',
    },
    env: {
      browser: true
    },
    extends: [
      'eslint:recommended', 'airbnb'
    ]
  };
  