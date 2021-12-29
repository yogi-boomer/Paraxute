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
                        <p><?php echo $_GET["nombre"]; ?></p>
                    </div>
                    <div style="margin-left:350pt;">
                        <p>Crédito</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="clear:both; position:relative;margin-top: -20px;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p>Violín</p>
                     </div>
                    <div style="margin-left:350pt;">
                        <p>2021/12/12/</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div style="clear:both; position:relative; padding-top: 2.5em;">
                    <div style="position:absolute; left:50pt; width:192pt; ">
                        <p>Violín</p>
                     </div>
                     
                    <div style="margin-left:200pt;width:52pt;">
                        <p>2021/12/12/</p>    
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div style="clear:both; position:relative; margin-top: -50px;left:150pt;">
                    <div style="position:absolute; left:180pt; width:192pt; ">
                        <p>Vasdin</p>
                     </div>
                     
                    <div style="margin-left:250pt;width:52pt;">
                        <p>1234567</p>    
                    </div>
                </div>
            </div>

        

            <div class="row ">
                <div style="clear:both; position:relative;padding-top: 20em;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p>Luis Fernando Vazquez Ceballos</p>
                    </div>
                    <div style="margin-left:350pt;">
                        <p>Crédito</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="clear:both; position:relative;margin-top: -20px;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p>Violín</p>
                     </div>
                    <div style="margin-left:350pt;">
                        <p>2021/12/12/</p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div style="clear:both; position:relative; padding-top: 2.5em;">
                    <div style="position:absolute; left:50pt; width:192pt; ">
                        <p>Violín</p>
                     </div>
                     
                    <div style="margin-left:200pt;width:52pt;">
                        <p>2021/12/12/</p>    
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div style="clear:both; position:relative; margin-top: -50px;left:150pt;">
                    <div style="position:absolute; left:180pt; width:192pt; ">
                        <p>Vasdin</p>
                     </div>
                     
                    <div style="margin-left:250pt;width:52pt;">
                        <p>1234567</p>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>