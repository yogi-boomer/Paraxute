<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/app.css"/>
    <title>Generar PDF</title>
</head>
<body>
    <div style="background-image: url({{ public_path('assets/img/nuevoRecibo.jpg') }});  background-repeat: no-repeat; background-size: contain;  background-position: center center; height: 920px; widht: 1000px;">
        <div class="container">
            <div class="row ">
                <div style="clear:both; position:relative;padding-top: 10em;">
                    <div style="position:absolute; left:20pt; width:192pt; margin-top: -55px">
                        <p><?php echo $_GET["idInfo"]; ?></p>
                    </div>
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p><?php echo $_GET["nombre"]; ?> <?php echo $_GET["apellidop"]; ?><?php echo $_GET["apellidom"]; ?></p>
                    </div>
                    <div style="margin-left:350pt;">
                        <p><?php echo $_GET["forma"]; ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="clear:both; position:relative;margin-top: -20px;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p><?php echo $_GET["prog"]; ?></p>
                     </div>
                    <div style="margin-left:245pt;font-size:18px">
                        <p><?php echo $_GET["fecha"]; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div style="clear:both; position:relative; padding-top: 2.5em;">
                    <div style="position:absolute; left:35pt; width:192pt; ">
                        <p><?php echo $_GET["codigo"]; ?></p>
                     </div>
                     
                    <div style="margin-left: 170pt;width:52pt;">
                        <p><?php echo $_GET["total"]; ?></p>    
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div style="clear:both; position:relative; margin-top: -50px;left:150pt;">
                    <div style="position:absolute; left:100pt; width:192pt; ">
                        <p><?php echo $_GET["codigo"]; ?></p>
                     </div>
                     
                    <div style="margin-left:180pt;width:52pt;">
                        <p><?php echo $_GET["total"]; ?></p>    
                    </div>
                </div>
            </div>

        

            <div class="row ">
                <div style="clear:both; position:relative;padding-top: 19em;">
                <div style="position:absolute; left:20pt; width:192pt; margin-top: -55px">
                        <p><?php echo $_GET["idInfo"]; ?></p>
                    </div>
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p><?php echo $_GET["nombre"]; ?> <?php echo $_GET["apellidop"]; ?><?php echo $_GET["apellidom"]; ?></p>
                    </div>
                    <div style="margin-left:350pt;">
                        <p><?php echo $_GET["forma"]; ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div style="clear:both; position:relative;margin-top: -20px;">
                    <div style="position:absolute; left:50pt; width:192pt;">
                        <p><?php echo $_GET["prog"]; ?></p>
                     </div>
                    <div style="margin-left:245pt;font-size:18px">
                        <p><?php echo $_GET["fecha"]; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div style="clear:both; position:relative; padding-top: 2.5em;">
                    <div style="position:absolute; left:35pt; width:192pt; ">
                        <p><?php echo $_GET["codigo"]; ?></p>
                     </div>
                     
                    <div style="margin-left:170pt;width:52pt;">
                        <p><?php echo $_GET["total"]; ?></p>    
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div style="clear:both; position:relative; margin-top: -50px;left:150pt;">
                    <div style="position:absolute; left:100pt; width:192pt; ">
                        <p><?php echo $_GET["codigo"]; ?></p>
                     </div>
                     
                    <div style="margin-left:180pt;width:52pt;">
                        <p><?php echo $_GET["total"]; ?></p>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>