(function ($) {
    var dashboardUsage = {
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
                    self.initNewslettersRevenueChart(data);
                    self.initNewslettersBouncesChart(data);
                    self.initNewslettersBounceRateChart(data);












                }
            });
        },

        getRandomColors: function (number) {
            var randomColors = [];
            var letters = '0123456789ABCDEF';
            var color = '';

            for (var i = 0; i < number; i++) {
                color = '#';

                for (var j = 0; j < 6; j++) {
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

        initNewslettersRevenueChart: function (companyData) {
            let chartOptions = this.defaultChartOptions();

            companyData.newsletters.forEach(function(item) {
                chartOptions.data.datasets[0].data.push(item.revenue);
                chartOptions.data.labels.push(item.list + '\n' + item.subject);
            });

            new Chart($('#newslettersRevenueChart'), chartOptions);
        },

        initNewslettersBouncesChart: function (companyData) {
            let chartOptions = this.defaultChartOptions();

            companyData.newsletters.forEach(function(item) {
                chartOptions.data.datasets[0].data.push(item.bounces);
                chartOptions.data.labels.push(item.list + '\n' + item.subject);
            });

            new Chart($('#newslettersBouncesChart'), chartOptions);
        },

        initNewslettersBounceRateChart: function (companyData) {
            let chartOptions = this.defaultChartOptions();

            companyData.newsletters.forEach(function(item) {
                chartOptions.data.datasets[0].data.push(item.bounce_rate);
                chartOptions.data.labels.push(item.list + '\n' + item.subject);
            });

            new Chart($('#newslettersBounceRateChart'), chartOptions);
        },












    };

    dashboardUsage.init();
})(jQuery);
