var profileChart;
$(document).ready(function(){
      $('#profile-chart').each(function(){
		profileChartOptions = {
			chart: {
				renderTo: 'profile-chart',
				type: 'line',
				height: 250,
				width: 400
			},
			title: {
				text: 'Ranked points history'
			},
			xAxis: {
				categories: []
			},
			yAxis: {
				title: {
					text: 'Ranking points'
				},
				showEmpty: false
			},
			series: [{
				name: 'Ranking points',
				data: []
			}],
			legend: { enabled: false }
		}
		$('ul#pointsChartData li').each(function(){
			profileChartOptions.xAxis.categories.push($(this).find('span[data-type="date"]').text());
			profileChartOptions.series[0].data.push(parseInt($(this).find('span[data-type="points"]').text()));
		});
		profileChartOptions.xAxis.categories.reverse();
		profileChartOptions.series[0].data.reverse();
		console.log(profileChartOptions.series);
		profileChart = new Highcharts.Chart(profileChartOptions);
	});
});