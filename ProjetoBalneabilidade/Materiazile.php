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
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </head>
    <body>
        <nav class="row" style="height:13vmin">
            <div class='' style="margin-left: 2vmin">  
                <h4 class=''> Projeto - BALNEABILIDADE ( Materialize )</h4>  
            </div>   
            <div class='' style="margin: 1vmin">                
                <a href="index.php"><button class='btn waves-effect'>Bootstrap</button></a>
                <a href="Materiazile.php"><button class='btn waves-effect'>Materialize</button></a> 
                <a href="Semantic.php"><button class='btn btn-success'>Semantic UI</button></a>  
            </div>    
        </nav>
        
        <div class='row main'>
           
            <div class='z-depth-5 white lighten-3 col s1' style="margin-left:4vmin">
                <div class=""> 
                    <h4 id='conteudo-Ponto_de_Coleta'></h4>

                    <label for="">Municipio: </label>
                    <input class="center-align" id='conteudo-Municipio' disabled/>

                    <label for="">Praia nome: </label>
                    <input class="center-align" id='conteudo-Praia' disabled/>

                    <label for="">Localizacao: </label>
                    <input class="center-align" id='conteudo-Localizacao' disabled/>
                    
                </div>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
                <div class='pag'>
                    <ul class="pagination nav-wrapper container">
                        <li><a href="#" class="item waves-effect" id="item-1" name="1" >«</a></li>
                    </ul>    
                </div>
            </div>  

            <div class='col s11'  style="margin:10vmin">
                <main class="" role="main">
                    <div class="starter-template">
                        <div class="col s12 row ">
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                </main>
            </div>
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
                            $('#conteudo-Municipio').attr('value' , result[cont].Municipio);
                            $('#conteudo-Praia').attr('value', result[cont].Balneario);
                            $('#conteudo-Localizacao').attr('value', result[cont].Localizacao);
                            $('#conteudo-Ponto_de_Coleta').html(result[cont].Ponto_de_Coleta);                           
                            if(cont <= i) {
                                $('.pag .pagination').html( $('.pag .pagination').html() + '<li><a href="#" class="item waves-effect" id="item-'+i+'" name="'+ i +'">'+ cont +'</a></li>')     
                                cont ++;            
                            }
                            else{
                                $('.pag .pagination').html( $('.pag .pagination').html() + '<li><a href="#" class="item waves-effect" id="item-1" name="1" >»</a></li>')    
                            }
                        }    
                    }
                   
                    
                    $('.item').click(function() {
                        $(this).attr('active');
                        let valor = $(this).attr('name');
                        $('#conteudo-Municipio').attr('value' , result[valor].Municipio);
                        $('#conteudo-Praia').attr('value', result[valor].Balneario);
                        $('#conteudo-Localizacao').attr('value', result[valor].Localizacao);
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