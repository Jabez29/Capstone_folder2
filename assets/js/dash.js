 document.addEventListener("DOMContentLoaded", function () {
     const charts = [
            { id: 'employmentChart' },
            { id: 'computerScienceChart' },
            { id: 'businessAdminChart' },
            { id: 'entrepreneurshipChart' },
            { id: 'accountingChart' },
            { id: 'techVocEdChart' },
            { id: 'secretarialAdminChart' }
        ];

        const years = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024];
        const employed = [50, 60, 70, 65, 80, 85, 90, 95, 100, 110, 105, 115, 120, 130, 140];
        const unemployed = [20, 18, 15, 17, 12, 10, 9, 8, 7, 6, 8, 5, 4, 3, 2];
        const colors = ['blue', 'green', 'purple', 'orange', 'cyan', 'pink'];

        charts.forEach((chart, index) => {
            const canvas = document.getElementById(chart.id);
            if (!canvas) {
                console.error(`Canvas element with ID '${chart.id}' not found.`);
                return;
            }

            const ctx = canvas.getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: years,
                    datasets: [
                        {
                            label: 'Employed',
                            data: employed,
                            backgroundColor: colors[index % colors.length],
                        },
                        {
                            label: 'Unemployed',
                            data: unemployed,
                            backgroundColor: 'red',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    });