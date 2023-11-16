'use strict'
const merge = require('webpack-merge')
const prodEnv = require('./prod.env')


module.exports = merge(prodEnv, {
  NODE_ENV: '"development"',
  // ROOT_API: '"http://vvg.vuetemplate.com/api/v1"',
  ROOT_API: '"http://nova.local.com"', 
  // HR_URL: '"http://vvg.hrportal.com/forgotpassword"',
  // NOT_REGISTERED_HR_URL: '"http://hrportal.local.com/register"',
  // VERSION:'"v1"',
  // SSO_URL: '"http://vvg.sso.com"',
  APP_URL:'"http://localhost:8082"', 
  APP_SLUG:'"LumenNova"',
  // SSO_URL: '"https://staging.ausso.vtc.systems"',
  // GETUSER_BYTOKENAPI:'"http://vvg.sso.com/api/user"',
  // SSO_ROOT_URL:'"http://vvg.sso.com"',
  // PROJECT_SLUG: '"truck-service-schedular"',
  // FRONT_ROOT_URL: '"http://localhost:8081"',
  // SENTRY_LARAVEL_DSN:'"https://7229b82debf2452a8516c8f0175f2e3a@o4505171235962880.ingest.sentry.io/4505186667462656"'
})

