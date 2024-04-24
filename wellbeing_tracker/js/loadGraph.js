
       google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawLineStyles);

        function drawLineStyles() {
            var happinessScores = JSON.parse(localStorage.getItem('Happiness_scores_list'));
            var workloadScores = JSON.parse(localStorage.getItem('Workload_scores_list'));
            var anxietyScores = JSON.parse(localStorage.getItem('Anxiety_scores_list'));
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'X');
            data.addColumn('number', 'Happiness');
            data.addColumn('number', 'Workload-management');
            data.addColumn('number', 'Anxiety-levels');
            for (var i = 0; i < happinessScores.length; i++) {
                data.addRow([
                    new Date(happinessScores[i].date),
                    parseInt(happinessScores[i].value),
                    parseInt(workloadScores[i].value), 
                    parseInt(anxietyScores[i].value) 
                ]);
        }
  
      var options = {
        hAxis: {
          title: 'Date'
        },
        vAxis: {
          title: 'Score'
        },
        colors: ['#a52714', '#097138', '#0000FF'],
        series: {
          0: {
            lineWidth: 10,
            lineDashStyle: [5, 1, 5]
          },
          1: {
            lineWidth: 5,
            lineDashStyle: [7, 2, 4, 3]
          },
          2: {
            lineWidth: 7,
            lineDashStyle: [7, 5, 2, 3]
          }
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
