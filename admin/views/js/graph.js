var lbl;
var amount;
$.ajax({
    url: "views/actions/graph.php",
    method: "GET",
    success: function(data) {
        lbl = data.month;
        amount = data.amount;
        const $graph = document.querySelector("#graph");
        var donations = {
            label: "Donaciones",
            data: amount, 
            backgroundColor: 'rgba(0, 112, 64, 0.2)',
            borderColor: 'rgba(0, 112, 64, 1)',
            borderWidth: 1,
        };
        new Chart($graph, {
            type: 'line',
            data: {
                labels: lbl,
                datasets: [
                    donations,
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    }
});

