import './../../less/page/login.less'
import particlesJson from './particles.js';

require ('particles.js');
particlesJS('particles-js', particlesJson);

$('.js-register').on('click',function(){
    $('#login').addClass('register-hide');
    $('#register').removeClass('register-hide');
})

