<?php  
 foreach ($karyawan->result() as $row)
{ echo $row->total;}

?> 


<html>
    <head>
        <tittle>Cara membuah chart</tittle>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(drawChart2);
            function drawChart(){
                // var data=google.visualization.arrayToDataTable([
                //     ['Nomor bawah', 'Nomor atas'],
                //     <?php 
                //      foreach ($karyawan->result() as $row)
                //      { echo "['".$row->tekanan_darah_bawah."',".$row->tekanan_darah_atas."],";
                //     }
                //     ?>
                // ]);

                  var data=google.visualization.arrayToDataTable([
                    ['periode', 'nadi','respirasi'],
                    <?php 
                     foreach ($karyawan->result() as $row)
                     { echo "['".$row->periode."',".$row->nadi.",".$row->respirasi."],";
                    }
                    ?>
                ]);


    //                var data = google.visualization.arrayToDataTable([
    //      ['Element', 'Density', { role: 'style' }, { role: 'annotation' } ],
    //      ['Copper', 8.94, '#b87333', 'Cu' ],
    //      ['Silver', 10.49, 'silver', 'Ag' ],
    //      ['Gold', 19.30, 'gold', 'Au' ],
    //      ['Platinum', 21.45, 'color: #e5e4e2', 'Pt' ]
    //   ]);



                // var data = google.visualization.arrayToDataTable([
                //     ['Year', 'Sales', 'Expenses','ada'],
                //     ['2004',  1000,      400,100],
                //     ['2005',  1170,      460,90],
                //     ['2006',  660,       1120,89],
                //     ['2007',  1030,      540,80]
                //     ]);

                var options={
                    tittle:'Persentase data',
                    is3D:true
                };

                var chart_area=document.getElementById('piechart');
                var chart= new google.visualization.ColumnChart(chart_area);
                google.visualization.events.addListener(chart,'ready', function(){
                    chart_area.innerHTML='<img src="'+chart.getImageURI()+'"class="img-responsive">';
                });
                chart.draw(data,options);
                }






                function drawChart2(){
                var data=google.visualization.arrayToDataTable([
                    ['Tekanan bawah', 'tekanan atas'],
                    <?php 
                     foreach ($karyawan->result() as $row)
                     { echo "['".$row->tekanan_darah_bawah."',".$row->tekanan_darah_atas."],";
                    }
                    ?>
                ]);

                var options={
                    tittle:'Persentase data',
                    is3D:true
                };

                var chart_area=document.getElementById('piechart2');
                var chart= new google.visualization.ColumnChart(chart_area);
                google.visualization.events.addListener(chart,'ready', function(){
                    chart_area.innerHTML='<img src="'+chart.getImageURI()+'"class="img-responsive">';
                });
                chart.draw(data,options);
                }
            
        </script>
    </head>
    <body>
        <div id="x" style="display: ">
        <div style="width:900px; padding-left:100px" id="chart" >
        <h3 text-align="center">Grafik Anestesi</h3>
        <div id="piechart" style="width:500px; height:300px;"></div>
        <div id="piechart2" style="width:500px; height:300px;"></div>
        </div>
    </div>
    <form method="post" id="make_pdf" action="<?= site_url();?>/op/jadwal/create_pdf">
        <input type="hidden" name="hidden_html" id="hidden_html"/>
        <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">download</button>
    </form>
    </body>
<script>
    //    $("#x").hide();

    $(document).ready(function(){
        $('#create_pdf').click(function(){
            
            $('#hidden_html').val($('#chart').html());
            $('#make_pdf').submit();
            
         

            // alert($('#hidden_html'));
        });
    });
</script>
</html>