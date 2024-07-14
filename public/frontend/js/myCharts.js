const labels = ['', '', '', '', '', '',];
const data = {
    labels: labels,
    datasets: [{
        borderColor: '#955EFF',
        data: [35, 20,30, 25, 35, 20, 30, 45],
        tension:0.7,
        borderWidth:2,
        pointRadius:0
    }]
};
const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                display: false,
            },
            y: {
                display: false,
            }
        },
    }
};
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
const myChart1 = new Chart(
    document.getElementById('myChart1'),
    config
);
const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config
);
const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config
);

const labels2 = ['جمعه', '', 'السبت', '', 'الاحد', '', 'الاتنين', '', 'الثلاثاء', '', 'الاربعاء', '', 'الخميس', '',];
var ctx = document.getElementById('myChart8').getContext("2d")
var gradient = ctx.createLinearGradient(0, 0, 0, 400)
gradient.addColorStop(0,'#ABCBC5');
gradient.addColorStop(0.5,'#C2DAD5');
gradient.addColorStop(1,'rgba(255,255,255,0.22)');
const data2 = {
    labels: labels2,
    datasets: [{
        borderColor: '#00B5AD',
        data: [ 25,35,33, 24, 35, 25, 30, 35,30,35,34,28,33,45],
        tension:0,
        borderWidth:2,
        pointRadius:0,
        backgroundColor: gradient,
        fill: true,
    }]
};
const config2 = {
    type: 'line',
    data: data2,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        rtl:true,
        scales: {

            x: {
                grid: {
                    color:'transparent'
                },
            },
            y: {
                grid: {
                    color:'transparent'
                },
            }
        },
    }
};
const myChart8 = new Chart(
    document.getElementById('myChart8'),
    config2
);

const labels3 = [
    '', '', '', '', '', '', '', '', '', '',
];
var ctx1 = document.getElementById('myChart4').getContext("2d")
var gradient1 = ctx1.createLinearGradient(0, 0, 0, 400)
gradient1.addColorStop(0,'#DCF8F0');
gradient1.addColorStop(0.8,'rgb(255,255,255)');
gradient1.addColorStop(1,'rgb(255,255,255)');
const data3 = {
    labels: labels3,
    datasets: [{
        borderColor: 'rgba(31,208,163,0.37)',
        data: [ 25,35,33, 35, 28, 33, 30, 35,30,28,50],
        tension:0.1,
        borderWidth:2,
        pointRadius:0,
        backgroundColor: gradient1,
        fill: true,
    }]
};
const config3 = {
    type: 'line',
    data: data3,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        rtl:true,
        scales: {
            x: {
                display: false,
            },
            y: {
                display: false,
            }
        },
    }
};

const myChart4 = new Chart(
    document.getElementById('myChart4'),
    config3
);
const myChart5 = new Chart(
    document.getElementById('myChart5'),
    config3
);

const labels4 = [
    '', '', '', '', '', '', '', '', '', '',
];
var ctx2 = document.getElementById('myChart4').getContext("2d")
var gradient2 = ctx1.createLinearGradient(0, 0, 0, 400)
gradient2.addColorStop(0,'#FFF2C3');
gradient2.addColorStop(0.8,'#FFF2C3');
gradient2.addColorStop(1,'rgb(231,231,231)');
const data4 = {
    labels: labels3,
    datasets: [{
        borderColor: 'rgba(255,200,0,0.65)',
        data: [ 25,35,33, 35, 28, 33, 30, 35,30,28,50],
        tension:0.1,
        borderWidth:2,
        pointRadius:0,
        backgroundColor: gradient2,
        fill: true,
    }]
};
const config4 = {
    type: 'line',
    data: data4,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        rtl:true,
        scales: {
            x: {
                display: false,
            },
            y: {
                display: false,
            }
        },
    }
};

const myChart6 = new Chart(
    document.getElementById('myChart6'),
    config4
);
const myChart7 = new Chart(
    document.getElementById('myChart7'),
    config4
);

