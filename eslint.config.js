import pluginVue from "eslint-plugin-vue";

export default [
    ...pluginVue.configs['flat/base'],
    {
        files: ['*.vue', '**/*.vue', "resources/**/*.js"],
        rules: {
            "vue/html-indent": ["warn", 4],
            "vue/html-closing-bracket-spacing": "warn",
            "vue/mustache-interpolation-spacing": "warn",
            "vue/no-use-v-if-with-v-for": "error",
            "vue/valid-v-for": "error",
            semi: "error",
            "prefer-const": "error",
            "keyword-spacing": "warn",
        }
    }
];
