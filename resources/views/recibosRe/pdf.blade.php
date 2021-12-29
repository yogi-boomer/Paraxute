

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/app.css"/>
    <title>Generar PDF</title>
</head>
<body>
    <div style="background-image: url({{ public_path('assets/img/recibo.png') }});  background-repeat: no-repeat; background-size: contain;  background-position: center center; height: 920px; widht: 1000px;">
        <div class="container">

           
            <div class="row ">
                <div style="clear:both; position:relative;padding-top: 8em;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        {{$recibioInfo->nombre.' '.$recibioInfo->apellido_P.' '.$recibioInfo->apellido_M}}
                    </div>
                    <div style="margin-left:350pt;">
                        <p>{{$recibioInfo->forma_pago}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="clear:both; position:relative;margin-top: -20px;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p>{{$recibioInfo->tipo_programa}}</p>
                     </div>
                    <div style="margin-left:350pt;">
                        <p>{{$recibioInfo->fecha}}</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div style="clear:both; position:relative; padding-top: 2.5em;">
                    <div style="position:absolute; left:50pt; width:192pt; ">
                        <p>{{$recibioInfo->tipo_programa}}</p>
                     </div>
                     
                    <div style="margin-left:200pt;width:52pt;">
                        <p>1
                        </p>    
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div style="clear:both; position:relative; margin-top: -50px;left:150pt;">
                    <div style="position:absolute; left:180pt; width:192pt; ">
                        <p>{{$recibioInfo->codigo_Prog}}</p>
                     </div>
                     
                    <div style="margin-left:250pt;width:52pt;">
                        <p>{{$recibioInfo->total}}</p>    
                    </div>
                </div>
            </div>

        

            <div class="row ">
                <div style="clear:both; position:relative;padding-top: 20em;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        {{$recibioInfo->nombre.' '.$recibioInfo->apellido_P.' '.$recibioInfo->apellido_M}}
                    </div>
                    <div style="margin-left:350pt;">
                        <p>{{$recibioInfo->forma_pago}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="clear:both; position:relative;margin-top: -20px;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p>{{$recibioInfo->tipo_programa}}</p>
                     </div>
                    <div style="margin-left:350pt;">
                        <p>{{$recibioInfo->fecha}}</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div style="clear:both; position:relative; padding-top: 2.5em;">
                    <div style="position:absolute; left:50pt; width:192pt; ">
                        <p>{{$recibioInfo->tipo_programa}}</p>
                     </div>
                     
                    <div style="margin-left:200pt;width:52pt;">
                        <p>{{$recibioInfo->total}}</p>    
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div style="clear:both; position:relative; margin-top: -50px;left:150pt;">
                    <div style="position:absolute; left:180pt; width:192pt; ">
                        <p>{{$recibioInfo->codigo_Prog}}</p>
                     </div>
                     
                    <div style="margin-left:250pt;width:52pt;">
                        <p>{{$recibioInfo->total}}</p>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>