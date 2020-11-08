import './index.css';
require('../assets/js/plugins.min.js');
require('../assets/js/customizer.min.js');
var pckg = require('../package.json');
var jKanban = require('jkanban');
global.pckg = pckg;

$(() => {
	$('._version').html(pckg.version)
});
