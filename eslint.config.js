import pluginJs from '@eslint/js';
import pluginImport from 'eslint-plugin-import';
import pluginVue from 'eslint-plugin-vue';
import globals from 'globals';

export default [
    {
        plugins: {
            vue: pluginVue,
            import: pluginImport,
        },
        files: [ '**/*.{js,mjs,cjs,vue}' ],
        ignores: [ 'node_modules/**', 'vendor/**' ],
        languageOptions: {
            globals: globals.browser,
            ecmaVersion: 'latest',
            sourceType: 'module',
        },
        rules: {
            ...pluginJs.configs.recommended.rules,
            ...pluginVue.configs.essential.rules,
            ...pluginImport.configs.recommended.rules,

            'no-param-reassign': [ 2, { props: false } ],
            'no-console': [ 'warn', { allow: [ 'warn', 'error' ] } ],
            'space-before-function-paren': [ 'error', 'always' ],
            'indent': [ 'error', 4 ],

            'curly': 'error',
            'brace-style': 'error',
            'no-multi-spaces': 'error',
            'semi': 'error',
            'space-unary-ops': [
                'error',
                {
                    words: true,
                    nonwords: false,
                },
            ],
            'array-bracket-spacing': [ 'error', 'always' ],
            'template-curly-spacing': [ 'error', 'always' ],
            'arrow-spacing': [ 'error' ],
            'computed-property-spacing': [ 'error', 'always' ],
            'dot-notation': [ 'error' ],
            'quotes': [ 'error', 'single' ],
            'jsx-quotes': [ 'error', 'prefer-double' ],
            'quote-props': [ 'error', 'consistent-as-needed' ],
            'key-spacing': [ 'error' ],
            'no-whitespace-before-property': [ 'error' ],
            'arrow-parens': [ 'error', 'as-needed' ],
            'no-multiple-empty-lines': [
                'error',
                {
                    max: 1,
                },
            ],
            'no-cond-assign': 'off',
            'class-methods-use-this': 'off',

            'vue/no-multiple-template-root': 'off',
            'vue/multi-word-component-names': 'off',
            'vue/no-reserved-component-names': 'off',
            'vue/html-indent': [ 'error', 4 ],
            'vue/script-indent': [ 'error', 4, { baseIndent: 1 } ],
            'vue/max-attributes-per-line': [
                'error',
                {
                    singleline: {
                        max: 1,
                    },
                    multiline: {
                        max: 1,
                    },
                },
            ],
            'vue/html-closing-bracket-newline': [
                2,
                {
                    multiline: 'always',
                },
            ],
            'vue/v-slot-style': [
                'error',
                {
                    atComponent: 'shorthand',
                    default: 'shorthand',
                    named: 'shorthand',
                },
            ],
            'vue/order-in-components': [
                'error',
                {
                    order: [
                        'el',
                        'name',
                        'key',
                        'parent',
                        'functional',
                        [ 'delimiters', 'comments' ],
                        [ 'components', 'directives', 'filters' ],
                        'extends',
                        'mixins',
                        [ 'provide', 'inject' ],
                        'ROUTER_GUARDS',
                        'layout',
                        'middleware',
                        'validate',
                        'scrollToTop',
                        'transition',
                        'loading',
                        'inheritAttrs',
                        'model',
                        [ 'props', 'propsData' ],
                        'emits',
                        'setup',
                        'asyncData',
                        'breadcrumbs',
                        'fillable',
                        'data',
                        'fetch',
                        'head',
                        'computed',
                        'watch',
                        'watchQuery',
                        'LIFECYCLE_HOOKS',
                        'methods',
                        [ 'template', 'render' ],
                        'renderError',
                    ],
                },
            ],
            'vue/no-lone-template': 'off',
            'vue/no-undef-properties': 'error',
            'vue/no-unused-properties': 'warn',
            'vue/no-unused-vars': 'warn',

            'vuejs-accessibility/click-events-have-key-events': 'off',
            'vuejs-accessibility/mouse-events-have-key-events': 'off',

            'import/no-named-as-default': 'off',
            'import/order': [
                'error',
                {
                    'alphabetize': {
                        order: 'asc',
                        caseInsensitive: true,
                    },
                    'newlines-between': 'always',
                    'groups': [
                        [ 'builtin', 'external' ],
                        'internal',
                        'parent',
                        [ 'sibling', 'index' ],
                    ],
                    'pathGroups': [
                        {
                            pattern: '@/**',
                            group: 'internal',
                        },
                    ],
                    'pathGroupsExcludedImportTypes': [ 'builtin' ],
                },
            ],

            'no-dupe-class-members': 'error',
            'no-redeclare': [ 'error', { builtinGlobals: true } ],
        },
    },
];
