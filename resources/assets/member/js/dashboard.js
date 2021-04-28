(function ($) {
    let dashboardUsage = {
        defaultChartOptions: function () {
            return {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        backgroundColor: this.getRandomColors(100),
                        borderRadius: 2,
                        minBarLength: 5
                    }]
                },
                options: {
                    aspectRatio: 2,
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#2A3F54'
                        }
                    }
                }
            };
        },
        init: function () {
            let self = this;

            $.ajax({
                url: 'member/dashboard/company-data',
                data: {},
                success: function (data) {
                    self.getPageTitle(data);

                    let chartNames = [
                        'bounce_rate',
                        'bounces',
                        'click_rate',
                        'open_rate',
                        'placed_order_rate',
                        'revenue',
                        'spam_complaints',
                        'spam_complaints_rate',
                        'successful_deliveries',
                        'total_clicks',
                        'total_opens',
                        'total_recipients',
                        'unique_clicks',
                        'unique_opens',
                        'unique_placed_orders',
                        'unsubscribes',
                        'winning'
                    ];

                    chartNames.forEach(function(chartName) {
                        self.initCharts(chartName, data);
                    });
                }
            });
        },

        getRandomColors: function (number) {
            let randomColors = [];
            const letters = '0123456789ABCDEF';
            let color = '';

            for (let i = 0; i < number; i++) {
                color = '#';

                for (let j = 0; j < 6; j++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }

                randomColors.push(color);
            }

            return randomColors;
        },

        getPageTitle: function (data) {
            $.each(data.users, function (index, item) {
                if (item.id === data.currentUserId) {
                    $('[data-username]').text(item.name);
                }
            });

            $('[data-company]').text(data.company.name);
        },

        initCharts: function (chartId, companyData) {
            let chartOptions = this.defaultChartOptions();

            companyData.newsletters.forEach(function(item) {
                chartOptions.data.datasets[0].data.push(item[chartId]);
                chartOptions.data.labels.push(item.list + '\n' + item.subject);
            });

            new Chart($('#' + chartId), chartOptions);
        }
    };

    dashboardUsage.init();
})(jQuery);
