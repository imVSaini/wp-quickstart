import globals from "globals";
import pluginJs from "@eslint/js";
import prettiereslintrecommended from "eslint-plugin-prettier/recommended";


/** @type {import('eslint').Linter.Config[]} */
export default [
  {ignores: ["dist", "**/*.config.*", "**/*.mix.*"]},
  {files: ["**/*.js"]},
  {languageOptions: { globals: globals.browser }},
  pluginJs.configs.recommended,
  {
    languageOptions: {
      globals: {
        jQuery: "readonly",
      },
    },
    rules: {
      "no-unused-vars":  ["warn", { argsIgnorePattern: "^__" }],
      "no-console": "warn",
      "no-var": "error",
      "no-duplicate-imports": "error",
      "prefer-const": "error",
      "curly": ["error", "all"],
      "consistent-return": "error",
      "no-else-return": ["error", { allowElseIf: false }],
    }
  },
  prettiereslintrecommended,
  {
    rules: {
      "prettier/prettier": ["error"]
    }
  },
];
