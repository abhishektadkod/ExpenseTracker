<canvas id="myChart"></canvas>  
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var a=10;
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45,a]
        }]
    },

    // Configuration options go here
    options: {}
});

</script>
