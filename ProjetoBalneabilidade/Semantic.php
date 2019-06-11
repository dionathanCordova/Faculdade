<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BALNEABILIDADE</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/semantic.min.css">
        <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
        <script src="assets/js/semantic.min.js"></script>
    </head>
    <body>
        <nav class="">
            <div class="ui secondary pointing menu" style='margin:4vmin'>
                <h1 class='ui header left floated'> Projeto - BALNEABILIDADE ( Semantic UI )</h1>  
                <div class='text-right'>  
                    <div class="ui buttons">
                        <a href="index.php"><button class="ui positive button">Bootstrap</button></a>
                        <div class="or"></div>
                        <a href="Materiazile.php"><button class="ui positive button">Materialize</button></a>
                        <div class="or"></div>
                        <a href="Semantic.php"><button class="ui positive button">Semantic UI</button></a>
                    </div>
                </div>    
            </div>
        </nav>   
        
        <div class="ui placeholder segment">
            <div class="ui two column very relaxed stackable grid ">
                <div class="column">
                    <div class="form ui raised very padded text container segment">
                        <div class="ui">
                            <h1 id='conteudo-Ponto_de_Coleta' class='ui horizontal divider'></h1>
                            <p>&nbsp</p>
                            <p>&nbsp</p>
                            <p>&nbsp</p>
                            <table class="ui definition table">
                                <tbody>
                                    <tr>
                                        <td class="two wide column">Municipio</td>
                                        <td id='conteudo-Municipio'>1" x 2"</td>
                                    </tr>
                                    <tr>
                                        <td>Praia nome</td>
                                        <td id='conteudo-Praia' >6 ounces</td>
                                    </tr>
                                    <tr>
                                        <td>Localizacao</td>
                                        <td id='conteudo-Localizacao' >Yellowish</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <p>&nbsp</p>
                            <p>&nbsp</p>
                            <p>&nbsp</p>
                            <p>&nbsp</p>
                            <div class='pag'>
                                <ul class="pagination">
                                    <li><a href="#" class="item" id="item-1" name="1" >«</a></li>
                                </ul>    
                            </div>
                        </div>
                    </div>
                    <div class="middle aligned column">                       
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
                <div class="ui vertical divider">
                >>
            </div>
        </div>
        <div class='col-sm-6'>
                <main class="container" role="main">
                    <div class="starter-template ">
                        <div class="col-lg-12 row ">
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                </main>
            </div>

    </body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var titles   = [];
            var ecolis   = [];
            var points   = [];
            var collects = [];

            $.ajax({
                cache:false,
                type: "GET",
                url: "Baln.php",
                dataType: "json",
                crossDomain: true,
                contentType: 'application/json',
                success: function (result) {
                    var lineT = [];
                    var colorslist = ["","blue","","orange","","magenta","","green","","black","","navy","","yellow","","red"];
                    $.each(result, function (i, iValue) {
                        // console.log(iValue);
                        var series = [];
                        if (i % 2 == 0) {
                            var ecoli = [];
                            var dataEcoli = [];
                            $.each(result[i], function (j, jValue) {
                                ecoli.push(jValue.ecoli);
                                dataEcoli.push(jValue.data);
                            });

                            series = ecoli;
                            lineT = dataEcoli;
                        }
                     
                        var colors = '';
                        var point_collect = '';
                        
                        if (series.length != 0) {
                            point_collect = result[i-1].Ponto_de_Coleta;
                            colors = colorslist[i-1];

                            points.push({
                                fill: false,
                                data: series.reverse(),
                                borderColor: colors,
                                label: point_collect,
                            });
                            // console.log(points);
                            // $('#conteudo').html(points);
                        }
                    });

                    console.log(result);
                    let len = Object.keys(result).length
                    let cont = 1
                    for(let i = 0; i< len; i++){
                        if(i % 2 != 0) {   
                            $('#conteudo-Municipio').text( result[cont].Municipio);
                            $('#conteudo-Praia').text(result[cont].Balneario);
                            $('#conteudo-Localizacao').text(result[cont].Localizacao);
                            $('#conteudo-Ponto_de_Coleta').html(result[cont].Ponto_de_Coleta);                           
                            if(cont <= i) {
                                $('.pag .pagination').html( $('.pag .pagination').html() + '<li><a href="#" class="item" id="item-'+i+'" name="'+ i +'">'+ cont +'</a></li>')     
                                cont ++;            
                            }
                            else{
                                $('.pag .pagination').html( $('.pag .pagination').html() + '<li><a href="#" class="item" id="item-1" name="1" >»</a></li>')    
                            }
                        }    
                    }
                   
                    
                    $('.item').click(function() {
                        let valor = $(this).attr('name')
                        $('#conteudo-Municipio').text( result[valor].Municipio);
                        $('#conteudo-Praia').text(result[valor].Balneario);
                        $('#conteudo-Localizacao').text(result[valor].Localizacao);
                        $('#conteudo-Ponto_de_Coleta').html(result[valor].Ponto_de_Coleta);  
                    })

                   
                    var dataLabels = lineT.reverse();
                    var dataSets = points;

                    new Chart(document.getElementById("line-chart"), {
                        type: 'line',
                        data: {
                            labels: dataLabels,
                            datasets: dataSets
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'CIDADE DE '+ result[1].Municipio +' - '+ result[1].Balneario
                            }
                        }
                    });
                },
                error:function(jqXHR, textStatus, errorThrown) {
                    alert('Erro ao carregar');
                }
            });
		});
	</script>
</html>