import AOS from 'aos';
import { CountUp } from "countup.js";

AOS.init();

window.onload = function() {
    let targets = ['#count-first', '#count-second', '#count-third']

    targets.forEach(el => {

        console.log(el);

        var countUp = new CountUp(el, 2000);
        countUp.start();
    });

    setTimeout(() => {
        var countUp = new CountUp(document.querySelector('#count-first'), 5000);
        countUp.start();

        var countUp = new CountUp(document.querySelector('#count-second'), 500);
        countUp.start();

        var countUp = new CountUp(document.querySelector('#count-third'), 10);
        countUp.start();
    }, 1000)

}

