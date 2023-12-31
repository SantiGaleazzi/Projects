module.exports = {
	env: {
		browser: true,
		commonjs: true,
		es2021: true,
		node: true,
	},
	extends: ['standard', 'prettier'],
	parserOptions: {
		ecmaVersion: 12,
	},
	rules: {
		indent: ['error', 'tab'],
		'no-tabs': 0,
		'no-console': 'warn',
		'no-alert': 'warn',
	},
}
