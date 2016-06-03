<?php
//Start conection script
include 'administrador/config.php';
$agencia = 4;
?>
<!DOCTYPE html>
<html lang="Es-Py">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mundial Cambios</title>
    <meta name="description" content="Mundial cambios - divisas">
    <meta name="autor" content="Fincreativo">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:400,300,700">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body><!--[if lt IE 8]>
    <p class="browserupgrade">
      Estas usando un nevegador <strong>viejo</strong>.
      Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para mejorar tu experiencia.
    </p><![endif]-->
    <div id="preload" class="preload">
      <div class="loading"></div>
    </div>
    <header id="header" class="header">
      <div class="cuadro">
        <figure class="header-logo"><img src="assets/img/Logo-MundialCambios.png" alt="Mundial Cambios - Logo-MundialCambios"/>
        </figure>
        <nav class="header-menu">
          <ul class="menu">
            <li><a href="#cambios" title="Inicio"><span class="icon-mundial1"></span></a></li>
            <li><a href="#cambios" title="Cambios"><span class="icon-mundial2"></span></a></li>
            <li><a href="#mundialCambios" title="Nosotros"><span class="icon-mundial3"></span></a></li>
            <li><a href="#clima" title="Clima"><span class="icon-mundial4"></span></a></li>
            <li><a href="#horarios" title="Horarios"><span class="icon-mundial5"></span></a></li>
            <li><a href="#noticias" title="Noticias"><span class="icon-mundial6"></span></a></li>
            <li><a href="#footer" title="Contacto"><span class="icon-mundial7"></span></a></li>
          </ul>
        </nav>
      </div>
    </header>
    <div id="wrapper" class="wrapper">
      <section id="cambios" class="cambios">
        <h1 id="sucursal">Casa Matriz</h1>
        <section class="sucursales">
          <h4> Ver cotización en: 
            <a href="#"> Casa Matriz | </a><a href="#">Agencia Vendome | </a><a href="#">Agencia Jebai | </a><a href="#">Avencia Km4 | </a><a href="#">Sucursal Salto del Guairá</a>
          </h4>
        </section>
        <div class="cuadro">
          <section class="cotiz cambios-delDia">
            <h2>Cambios Del dia</h2>
            <table class="cotiz-tabla">
              <thead>
                <tr>
                  <td class="moneda">Imagen</td>
                  <td class="compra">Moneda</td>
                  <td class="compra">Compra</td>
                  <td class="venta">Venta</td>
                </tr>
              </thead>
              <tbody>
              	<?php
					$sql = 'SELECT * from cotizaciones a, cotizaciones_detalles b WHERE a.cot_id = b.cot_id AND b.cot_agencia = ' . $agencia . ' ORDER BY b.cot_det_id ASC';
                    foreach ($db->query($sql) as $row) {
                       echo '<tr>';
                       echo '<td><img src="administrador/img/' . $row['cot_image'] . '" width="30" height="30" alt=""/></td>';
					   echo "<td>{$row['cot_moneda']}</td>";
					   echo "<td class='compra'>{$row['cot_compra']}</td>";
					   echo "<td class='venta'>{$row['cot_venta']}</td>";
                       echo '</tr>';
                    }
                ?>
              </tbody>
            </table>
          </section>
          <section class="cotiz cambios-Contizacion">
            <h2>Cotizacion de arbitraje</h2>
            <table class="cotiz-tabla">
              <thead>
                <tr>
                  <td class="moneda">Imagen</td>
                  <td class="moneda">Moneda</td>
                  <td class="compra">Compra</td>
                  <td class="venta">Venta</td>
                </tr>
              </thead>
              <tbody>
                <?php
					$sql = 'SELECT * from cotizaciones_arbitraje a, cotizaciones_arbitraje_detalles b WHERE a.cot_arb_id = b.cot_arb_id AND b.cot_arb_agencia = ' . $agencia . ' ORDER BY b.cot_arb_det_id ASC';
                    foreach ($db->query($sql) as $row) {
                       echo '<tr>';
                       echo '<td><img src="administrador/img/' . $row['cot_arb_image'] . '" width="30" height="30" alt=""/></td>';
					   echo "<td>{$row['cot_arb_moneda']}</td>";
					   echo "<td class='compra'>{$row['cot_arb_compra']}</td>";
					   echo "<td class='venta'>{$row['cot_arb_venta']}</td>";
                       echo '</tr>';
                    }
                ?>
              </tbody>
            </table>
          </section>
          <section class="cotiz cambios-conversor">
            <h2>Conversor de Divisas</h2>
            <form id="form-convertir" metod="post">
            	<?php                      
				   $sqlArb = 'SELECT * from cotizaciones_arbitraje a, cotizaciones_arbitraje_detalles b WHERE a.cot_arb_id = b.cot_arb_id AND b.cot_arb_agencia = ' . $agencia . ' ORDER BY b.cot_arb_det_id ASC';
				   foreach ($db->query($sqlArb) as $rowArb) {
					  echo "<input id='" . $rowArb['cot_arb_variable'] . "' type='hidden' value='" . $rowArb['cot_arb_compra'] . "_" . $rowArb['cot_arb_venta'] . "' />";
				   }
				?>
                <div class="conversor">
                  <div class="label">
                    <label>Tengo</label>
                    <select name="tengo_moneda" id="tengo_moneda">
                      <option value="GS">Guaranies</option>
                      <?php                      
                          $sql = 'SELECT * from cotizaciones a, cotizaciones_detalles b WHERE a.cot_id = b.cot_id AND b.cot_agencia = ' . $agencia . ' ORDER BY b.cot_det_id ASC';
                          foreach ($db->query($sql) as $row) {
                              echo "<option value='" . $row['cot_compra'] . "_" . $row['cot_venta'] . "'>" . $row['cot_moneda'] . "</option>";
                          }
                      ?>		  
                    </select>
                  </div>
                  
                  <div class="label">
                    <label>cambiar a</label>
                    <select name="quiero_moneda" id="quiero_moneda">
                      <option value="GS">Guaranies</option>
                      <?php                      
                          $sql = 'SELECT * from cotizaciones a, cotizaciones_detalles b WHERE a.cot_id = b.cot_id AND b.cot_agencia = ' . $agencia . ' ORDER BY b.cot_det_id ASC';
                          foreach ($db->query($sql) as $row) {
                              echo "<option value='" . $row['cot_compra'] . "_" . $row['cot_venta'] . "'>" . $row['cot_moneda'] . "</option>";
                          }
                      ?>		  
                    </select>
                  </div>
                  
                  <div class="label">
                    <label>Monto a Cambiar</label>
                    <input name="tengo_monto" type="text" id="tengo_monto" />
                  </div>
                  
                  <div class="label resultado">
                    <input name="quiero_monto" type="text" id="quiero_monto" readonly/>
                  </div>
                </div>
            </form>
          </section>
        </div>
          <!-- INICIO CODIGO DE MAILCHIMP -->
          <!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> -->
          <!--<style type="text/css">
          	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
          	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
          	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
           </style> -->
          <section id="mc_embed_signup" class="newsletter">
            <form id="mc-embedded-subscribe-form" action="//google.us13.list-manage.com/subscribe/post?u=c46b1c2e06e65f6f649d3880d&amp;id=46ed58addb" method="post" name="mc-embedded-subscribe-form" target="_blank" novalidate="novalidate" class="validate">
              <div id="mc_embed_signup_scroll">
                <div class="cont-txt">
                  <h3>Newsletter</h3>
                  <p>Reciba las cotizaciones de <strong id="NS-sucursal">Casa Matriz</strong> actualizadas diariemente en su correo</p>
                </div>
                <div class="mc-field-group">
                  <label for="mce-EMAIL"></label>
                  <input id="mce-EMAIL" type="email" value="" name="EMAIL" aria-required="true" placeholder="Email" class="required email">
                </div>
                <div class="mc-field-group">
                  <label for="mce-FNAME"></label>
                  <input id="mce-FNAME" type="text" value="" name="FNAME" placeholder="Nombre">
                </div>
                <div id="mce-responses" class="clear">
                  <div id="mce-error-response" style="display:none" class="response"></div>&#x9;&#x9;
                  <div id="mce-success-response" style="display:none" class="response"></div>
                </div>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                  <input type="text" name="b_c46b1c2e06e65f6f649d3880d_46ed58addb" tabindex="-1" value="">
                </div>
                <div class="clear">
                  <input id="mc-embedded-subscribe" type="submit" value="Enviar" name="subscribe" class="button">
                </div>
              </div>
            </form>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text'; /*
             * Translated default messages for the $ validation plugin.
             * Locale: ES
             */
            $.extend($.validator.messages, {
              required: "Este campo es obligatorio.",
              remote: "Por favor, rellena este campo.",
              email: "Por favor, escribe una dirección de correo válida",
              url: "Por favor, escribe una URL válida.",
              date: "Por favor, escribe una fecha válida.",
              dateISO: "Por favor, escribe una fecha (ISO) válida.",
              number: "Por favor, escribe un número entero válido.",
              digits: "Por favor, escribe sólo dígitos.",
              creditcard: "Por favor, escribe un número de tarjeta válido.",
              equalTo: "Por favor, escribe el mismo valor de nuevo.",
              accept: "Por favor, escribe un valor con una extensión aceptada.",
              maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
              minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
              rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
              range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
              max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
              min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
            });}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!-- FIN CODIGO DE MAILCHIMP -->
          </section>
      </section>
      <section id="mundialCambios" class="mundialCambios">
        <div class="cuadro">
          <p>Mundial Cambios tiene algo lindo que mostrar; una tierra de costumbres sencillas, como cantaba Mario Ortíz Mayans, que siempre agradan porque no tienen complicación, con paisajes que cubren de paz el alma y gente que trabaja con pasión para alcanzar sus sueños. Te mostramos Paraguay.</p>
        </div>
      </section>
      <section id="clima" class="clima">
        <div class="cuadro">
          <h2>clima</h2>
          <p class="clima-tiempo"><i class="icon-sun"></i>37°</p>
          <div class="clima-dia">
            <p class="dia">Viernes</p><span class="icon-rainy"> </span>
            <p class="max">22°</p>
            <p class="min">15°</p>
            <p class="modo">Lluvioso</p>
          </div>
          <div class="clima-dia">
            <p class="dia">Sabado</p><span class="icon-sun"> </span>
            <p class="max">22°</p>
            <p class="min">15°</p>
            <p class="modo">Soleado</p>
          </div>
          <div class="clima-dia">
            <p class="dia">Domingo</p><span class="icon-cloudy"> </span>
            <p class="max">22°</p>
            <p class="min">15°</p>
            <p class="modo">Parcialmente Nublado</p>
          </div>
          <div class="clima-dia">
            <p class="dia">Lunes</p><span class="icon-lightning"> </span>
            <p class="max">22°</p>
            <p class="min">15°</p>
            <p class="modo">tormenta</p>
          </div>
          <div class="clima-dia">
            <p class="dia">Martes</p><span class="icon-cloudy"> </span>
            <p class="max">22°</p>
            <p class="min">15°</p>
            <p class="modo">Parcialmente Nublado</p>
          </div>
        </div>
      </section>
      <section id="horarios" class="horarios">
        <div class="cuadro">
          <h2>Horario Mundial</h2>
          <div class="horas">
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n51/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>Argentina</h3>
            </div>
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n233/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>Brasil</h3>
            </div>
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n232/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>Chile</h3>
            </div>
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n190/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>Ecuador</h3>
            </div>
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n179/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>EEUU</h3>
            </div>
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n136/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>Inglaterra</h3>
            </div>
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n141/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>España</h3>
            </div>
            <div class="hora">
              <iframe src="http://free.timeanddate.com/clock/i53q0bwx/n41/szw120/szh120/hoc000/hbw8/cf100/hgr0/hcw5/fav0/fiv0/mqc000/mqs3/mql25/mqw2/mqd96/mhc000/mhs3/mhl15/mhw2/mhd96/mmc000/mms3/mml5/mmw2/mmd96/hhs2/hhw8/hms2/hmw8/hmr4/hss3/hsl90" frameborder="0" width="120" height="120"></iframe>
              <h3>Colombia</h3>
            </div>
          </div>
        </div>
      </section>
      <section id="noticias" class="noticias">
        <div class="cuadro noticias">
          <h2>noticias</h2>
          <div class="bloque">
            <h3>internacionales</h3><a href="#">¿Qué hará China para abrir su mercado de capitales?</a><a href="#">Desmienten medidas de corte de luz en cines y teatros en Venezuela</a><a href="#">Las tres cosas que podrían descarrilar a EE.UU. según Yellen</a><a href="#">Perú presenta guía de negocios e inversión en gas y petróleo</a>
          </div>
          <div class="bloque">
            <h3>Del Agro</h3><a href="#">Gramogen participará en el IPPE 2016</a><a href="#">La Xilanasa de BRI recibe Aprobación por las Entidades Regulatorias de Brasil y Perú</a><a href="#">Producción de pollo alcanzó récord con 673 mlls. de unidades en el 2015</a><a href="#">En abril definirán franja de precios para productos que sustentan el sector pecuario</a>
          </div>
        </div>
      </section>
      <footer id="footer" class="footer">
        <section class="form cuadro">
          <h2>contáctenos</h2>
          <p>Puede enviar un mensaje usando el siguiente formulario de contacto. </p>
          <p>Por favor llene los campos requeridos.</p>
          <form>
            <div class="label">
              <label>Nombre y apellido</label>
              <input type="text">
            </div>
            <div class="label">
              <label>E-mail</label>
              <input type="email">
            </div>
            <div class="label">
              <label>Teléfono</label>
              <input type="text">
            </div>
            <div class="label mensaje">
              <label>Mensaje</label>
              <textarea></textarea>
            </div>
            <div class="label">
              <label></label>
              <div class="button"><a href="#">Enviar</a></div>
            </div>
          </form>
        </section>
        <article class="locales cuadro">
          <div class="locales">
            <div class="local">
              <h4>Casa Matriz</h4>
              <p>Avda. Curupyty c/ Adrián Jara. Edif.Globo P.B.</p>
              <p>Tel. +595 61 509570</p>
              <div class="ubicacion">
                <div class="modal">
                  <label for="modal-casaMatriz">
                    <div class="modal-trigger"> <i class="icon-compas"></i>Ubicación</div>
                  </label>
                  <input id="modal-casaMatriz" type="checkbox" class="modal-state"/>
                  <div class="modal-fade-screen"> 
                    <div class="modal-inner"> 
                      <div for="modal-casaMatriz" class="modal-close"></div>
                      <div id="casaMatriz" class="mapa"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="local">
              <h4>Sucursal Saltos</h4>
              <p>Avda. Paraguay c/ Bernardino Caballero.</p>
              <p>Tel. +595 46 263 030</p>
              <div class="ubicacion">
                <div class="modal">
                  <label for="modal-salto">
                    <div class="modal-trigger"> <i class="icon-compas"></i>Ubicación</div>
                  </label>
                  <input id="modal-salto" type="checkbox" class="modal-state"/>
                  <div class="modal-fade-screen"> 
                    <div class="modal-inner"> 
                      <div for="modal-salto" class="modal-close"></div>
                      <div id="salto" class="mapa"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="local">
              <h4>Sucursal Vendome</h4>
              <p>Avda. Itá Ybaté c/Adrián jara. Shopp. Vendome. Local 109</p>
              <p>Tel. +595 61 511 630</p>
              <div class="ubicacion">
                <div class="modal">
                  <label for="modal-vendome">
                    <div class="modal-trigger"> <i class="icon-compas"></i>Ubicación</div>
                  </label>
                  <input id="modal-vendome" type="checkbox" class="modal-state"/>
                  <div class="modal-fade-screen"> 
                    <div class="modal-inner"> 
                      <div for="modal-vendome" class="modal-close"></div>
                      <div id="vendome" class="mapa"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="local">
              <h4>Sucursal KM4 Supercarrereta</h4>
              <p>Sentido Pdte.Franco, a 100 mts. de la rotonda</p>
              <p>Tel. +595 61 571 070</p>
              <div class="ubicacion">
                <div class="modal">
                  <label for="modal-km4">
                    <div class="modal-trigger"> <i class="icon-compas"></i>Ubicación</div>
                  </label>
                  <input id="modal-km4" type="checkbox" class="modal-state"/>
                  <div class="modal-fade-screen"> 
                    <div class="modal-inner"> 
                      <div for="modal-km4" class="modal-close"></div>
                      <div id="km4" class="mapa"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="local">
              <h4>Sucursal Galeria Jebai Center</h4>
              <p>Avda. Adrian Jara</p>
              <p></p>
              <div class="ubicacion">
                <div class="modal">
                  <label for="modal-jebai">
                    <div class="modal-trigger"> <i class="icon-compas"></i>Ubicación</div>
                  </label>
                  <input id="modal-jebai" type="checkbox" class="modal-state"/>
                  <div class="modal-fade-screen"> 
                    <div class="modal-inner"> 
                      <div for="modal-jebai" class="modal-close"></div>
                      <div id="jebai" class="mapa"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </article>
      </footer>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/js/conversor.js"></script>
    <script>
      $(window).load(function()
      {$("#preload").fadeOut('');
      });
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/xpanel.min.js"></script>
    <script type="text/javascript" src="assets/js/functions.min.js"></script>
  </body>
</html>