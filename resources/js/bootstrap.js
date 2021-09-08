window._ = require('lodash');

window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');

import $ from 'jquery';
window.$ = window.jQuery = $;

import Noty from "noty";
window.Noty = Noty;

window.moment = require('moment');

let Pikaday = require ('pikaday/pikaday');
window.Pikaday = Pikaday;

window.$ = window.jQuery = require("jquery");
require('select2');

require('metismenu');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.feather = require('feather-icons')
