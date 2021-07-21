             <h1><?=COMPANY?></h1>
             <h2>Reporte de productos</h2>
             <p><b><?=date("d/m/Y h:m:s")?></b></p>
             
             <div class="container" >
                 <table style="width: 100%; border:1px solid #ccc;">
                            <thead style="color:#fff;background:black">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center; border:1px solid #ccc;">
                                <?php foreach($productos as $producto): ?>
                                <tr>
                                    <td><?=$producto["pro_nombre"]?></td>
                                    <td><?=$producto["pro_precio"]?></td>
                                    <td><?=$producto["pro_cantidad"]?></td>
                 
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
             </div>

            <?php 
            use Dompdf\Dompdf;
            
            $dompdf = new Dompdf();
            $dompdf->loadHtml(ob_get_clean());
            $dompdf->render();
            $dompdf->output();
            ob_end_clean();
            $dompdf->stream();

            
            ?>