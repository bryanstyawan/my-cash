try {
    window.$ = window.jQuery = require('jquery');
	require('materialize-css');
	require('nestable2');	
} catch (e) {}

import axios from 'axios';
import Notiflix from "notiflix";
import _ from 'lodash';
import PerfectScrollbar from 'perfect-scrollbar';
import DataTable from 'datatables.net';
import Chart from 'chart.js';
import numeral from 'numeral';
import 'select2'; 

window.axios = axios;
global.Notiflix = Notiflix;
global.PerfectScrollbar = PerfectScrollbar;
global._ = _;
global.Chart = Chart;
global.numeral = numeral;
