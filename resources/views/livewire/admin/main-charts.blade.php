<div>
    <div  class="grid gap-6 mb-8 md:grid-cols-2">

        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Post
            </h4>
            <canvas id="pieChart" wire:ignore></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-red-200 rounded-full"></span>
                    <span>Pending {{$countunPublished}} </span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-700 rounded-full"></span>
                    <span>Published {{$countPublished}} </span>
                </div>
            </div>
        </div>

        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Traffic  <br> 
                </h4>
                <canvas id="lineChart" wire:ignore></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Likes </span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Views   </span>
                    </div>
                </div>
        </div>



    </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"> </script> 
<script >
    /** Doughnut Chart */
    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [{{$countPublished}}, {{$countunPublished}}],
                backgroundColor: ['#7e22ce', '#fecaca'],
                borderColor: ['#000000','#000000'],
                label: 'Post',
            }, ],
            labels: ['Published', 'Reviewing'],
        },
        options: {
            responsive: true,
            cutoutPercentage: 60,
            legend: {
                display: false,
            },
        },
    });  
    
    window.onload = function() {
    Livewire.on('refreshCharts', ($data) => {
        var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data:  $data,
                backgroundColor: ['#7e22ce', '#fecaca'],
                borderColor: ['#000000','#000000'],
                label: 'Post',
            }, ],
            labels: ['Published', 'Reviewing'],
        },
        options: {
            responsive: true,
            cutoutPercentage: 50,
            legend: {
                display: false,
            },
        },
        });  
    })
}
  
    
    const lineConfig = {
        type: 'line',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                    label: 'Views',
              
                    backgroundColor: '#0694a2',
                    borderColor: ['#000000','#000000'],
                    data:  {!! json_encode($views) !!},
                    fill: false,
                },
                {
                    label: 'Likes',
                    fill: false,
         
                    backgroundColor: '#7e3af2',
                    borderColor: '#7e3af2',
                    data:  {!! json_encode($likes) !!},
                },
            ],
        },
        options: {
            responsive: true,

            legend: {
                display: false,
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true,
            },
            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month',
                    },
                },
                y: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value',
                    },
                },
            },
        },
    }
    const lineCtx = document.getElementById('lineChart')
    window.myLine = new Chart(lineCtx, lineConfig)
  </script>

</div>