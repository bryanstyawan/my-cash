global.jQuery   = require('jquery');
var materialize = require('materialize-css')
window.axios = require('axios');
var _ = require('lodash');
var Swal = require('sweetalert2');
var dt = require('datatables.net')();
var buttons = require('datatables.net-buttons')();
var jKanban = require('jkanban');
var PerfectScrollbar = require('perfect-scrollbar');
var Notiflix = require('Notiflix');
var mitchTree = require('d3-mitch-tree');
var d3 = require("d3");
var i18next = require('i18next');
var Quill = require('quill')

global.$ = global.jQuery;
global._ = _;
global.Swal = Swal;
global.PerfectScrollbar = PerfectScrollbar;
global.mitchTree = mitchTree;
global.d3 = d3;
global.boxedTree = mitchTree;
global.Notiflix = Notiflix;

require('select2')($);
require('nestable2');
