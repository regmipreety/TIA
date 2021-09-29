<center><h3><b>Date: {{ $date }}</b></h3></center>
<div id="buttons" class="buttons"></div>
<div id="JSFiddle">
        <div id="chart_div" style="height: 600px; width:100%;"></div>
</div>

<style>
.buttons button:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.buttons button:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

button {
    color:#111;
    background-image: linear-gradient(to bottom,#ffffff 0,#777777 100%);
    background-repeat: repeat-x;
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    cursor: pointer;
    border-width:1px;
    border-color: #777;
    text-shadow: 0 -1px 0 rgba(0,0,0,.1);
    box-shadow: inset 0 1px 0 rgba(255,255,255,.15),0 1px 1px rgba(0,0,0,.075);
}
button:hover{
    color:#fff;
    background-image: linear-gradient(to top,#337ab7 0,#265a88 100%);
}
.ggl-tooltip {
  border: 1px solid #E0E0E0;
  font-family: Arial, Helvetica;
  padding: 6px 6px 6px 6px;
}

.ggl-tooltip span {
  font-weight: bold;
}
</style>
<script>
    function AddNamespace(){
  var svg = jQuery('#chart_div svg');
  svg.attr("xmlns", "http://www.w3.org/2000/svg");
  svg.css('overflow','visible');
}

    google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var container = document.getElementById('chart_div');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();

    dataTable.addColumn({ type: 'string', id: 'Room' });
    dataTable.addColumn({ type: 'string', id: 'Name' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    var chartData  = {!!json_encode($bay)!!}

    for(var i=0; i<chartData.length; i++){
        dataTable.addRow([chartData[i].bay_number, chartData[i].flight_type ,  new Date(chartData[i].year, chartData[i].month, chartData[i].day,chartData[i].eta_h,chartData[i].eta_m,0), new Date(chartData[i].year, chartData[i].month, chartData[i].day,chartData[i].etd_h,chartData[i].etd_m,0)]);
    }
    google.visualization.events.addListener(chart, 'ready', AddNamespace);
    dataTable.insertColumn(2, {type: 'string', role: 'tooltip', p: {html: true}});

var dateFormat = new google.visualization.DateFormat({
  pattern: 'h:mm a'
});

for (var i = 0; i < dataTable.getNumberOfRows(); i++) {
    var duration = (dataTable.getValue(i, 4).getTime() - dataTable.getValue(i, 3).getTime()) / 1000;
      var hours = parseInt( duration / 3600 ) % 24;
      var minutes = parseInt( duration / 60 ) % 60;

  var tooltip = '<div class="ggl-tooltip"><span>' +
    dataTable.getValue(i, 1) + '</span></div><div class="ggl-tooltip"><span>' +
     dataTable.getValue(i, 0)  + '</span>: ' +
    dateFormat.formatValue(dataTable.getValue(i, 3)) + ' - ' +
    dateFormat.formatValue(dataTable.getValue(i, 4)) + '</div>'+
    '<div class="ggl-tooltip"><span>Duration: </span>' +
        hours + 'h ' + minutes + 'm ';

  dataTable.setValue(i, 2, tooltip);
}
chart.draw(dataTable, {
      tooltip: {
        isHtml: true
      }
    });

}

  var click="return xepOnline.Formatter.Format('JSFiddle', {render:'download', srctype:'svg'})";
jQuery('#buttons').append('<button onclick="'+ click +'">PDF</button>');
<!-- Convert the SVG to PNG@120dpi and open it -->
click="return xepOnline.Formatter.Format('JSFiddle', {render:'newwin', mimeType:'image/png', resolution:'120', srctype:'svg'})";
jQuery('#buttons').append('<button onclick="'+ click +'">PNG @120dpi</button>');
<!-- Convert the SVG to JPG@300dpi and open it -->
click="return xepOnline.Formatter.Format('JSFiddle', {render:'newwin', mimeType:'image/jpg', resolution:'300', srctype:'svg'})";
jQuery('#buttons').append('<button onclick="'+ click +'">JPG @300dpi</button>');

</script>
