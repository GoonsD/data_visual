var options = {
    series: [{
            name: 'stack1',
            data: [353859, 240142, 248507, 197859, 157070, 105259, 61603, 37254],
        }, {
            name: 'stack2',
            data: [43265, 476752, 538475, 356135, 336844, 216381, 153045, 113271],
        }, {
            name: 'stack3',
            data: [00033, 154327, 189528, 194166, 114948, 73337, 101496, 49194],
        }, {
            name: 'amountA',
            data: [43265, 476752, 538475, 356135, 336844, 216381, 153045, 113271],
        }],
    chart: {
        type: 'bar',
        height: 350,
        stacked: true
    },
    plotOptions: {
        bar: {
            horizontal: false,
            dataLabels: {
                total: {
                    enabled: true,
                    offsetX: 0,
                    style: {
                        fontSize: '13px',
                        fontWeight: 900
                    }
                }
            }
        }
    },
    stroke: {
        width: 1,
        colors: ['#fff'],
    },
    title: {
        text: '2022-09-21 18:30:03'
    },
    xaxis: {
        categories: ["俏芳華", "連連歡呼", "電訊巴打", "歡欣福星", "柏林探戈", "總理", "同舟共濟", "快益善"]
    },
    fill: {
        opacity: 1
    },
    legend: {
        position: 'top',
        horizontalAlign: 'left',
        offsetX: 40
    },
    color: [function ( { value, seriesIndex, dataPointIndex, w }) {
            if (dataPointIndex == 43265) {
                return "#7E36AF";
            } else {
                return "#D9534F";
        }
        }
    ]
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();


chart.updateOptions({
    title: {
    text: 'new'
  },
  
});

$(document).ready(function($) {
    if($('.list2').length > 0 ){
    $('.list2').select2();
    }
});


