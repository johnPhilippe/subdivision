<x-adminApp-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                @if(isset($error))
                    <p>{{ $error }}</p>
                @else
                <div class="flex space-x-4">
                    <button id="showGenderChart" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Show Gender Chart
                    </button>
                    <button id="showReligionChart" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Show Religion Chart
                    </button>
                </div>

                    <canvas id="residentChart"></canvas>

                    <script>
                        var ctx = document.getElementById('residentChart').getContext('2d');
                        var data = JSON.parse('{!! addslashes(json_encode($genderCounts)) !!}');
                        var data = JSON.parse('{!! addslashes(json_encode($religionCounts)) !!}');
                        var myChart;

                        function renderChart(data, label, backgroundColor) {
                            if (myChart) {
                                myChart.destroy();
                            }

                            myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: Object.keys(data),
                                    datasets: [{
                                        data: Object.values(data),
                                        backgroundColor: backgroundColor,
                                    }]
                                },
                                options: {
                                    responsive: false,
                                    maintainAspectRatio: true,
                                    title: {
                                        display: true,
                                        text: label
                                    }
                                }
                            });
                        }

                        document.getElementById('showGenderChart').addEventListener('click', function () {
                            renderChart(JSON.parse('{!! addslashes(json_encode($genderCounts)) !!}'), 'Gender Counts', ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)']);
                        });

                        document.getElementById('showReligionChart').addEventListener('click', function () {
                            renderChart(JSON.parse('{!! addslashes(json_encode($religionCounts)) !!}'), 'Religion Counts', ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(75, 192, 192, 0.7)']);
                        });
                    </script>
                @endif


                </div>
            </div>
        </div>
    </div>
</x-adminApp-layout>