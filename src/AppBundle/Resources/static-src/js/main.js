import './../less/layout.less'
import $ from 'jquery';
import Alert from './libs/alert.js'
import validation from 'jquery-validation';

window.jQuery = window.$ = $;
window.validation = validation;
$.alert = new Alert();