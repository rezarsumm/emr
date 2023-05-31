 


<html>
    <head>
        <tittle>Cara membuah chart</tittle>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart(){
                var data=google.visualization.arrayToDataTable([
                    ['Jenis Kelamin', 'Total'],
                    <?php 
                     foreach ($karyawan->result() as $row)
                     { echo "['".$row->jenis_kelamin."',".$row->total."],";
                    }
                    ?>
                ]);

                var options={
                    tittle:'Persentase data',
                    is3D:true
                };

                var chart_area=document.getElementById('piechart');
                var chart= new google.visualization.LineChart(chart_area);
                google.visualization.events.addListener(chart,'ready', function(){
                    chart_area.innerHTML='<img src="'+chart.getImageURI()+'"class="img-responsive">';
                });
                chart.draw(data,options);
                }
            
        </script>
    </head>
    <body>
        <div style="width:900px;" id="chart">
        <h3 text-align="center">Caraaa</h3>
        <div id="piechart" style="width:900px; height:500px;"></div>
    </div>
    <form method="post" id="make_pdf" action="<?= site_url();?>/op/jadwal/create_pdf">
        <input type="hidden" name="hidden_html" id="hidden_html"/>
        <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">download</button>
    </form>
    </body>
<script>
    $(document).ready(function(){
        $('#create_pdf').click(function(){
            $('#hidden_html').val($('#chart').html());
            $('#make_pdf').submit();
            // alert($('#hidden_html'));
        });
    });
</script>
</html>