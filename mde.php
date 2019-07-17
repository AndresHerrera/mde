<?php
	
	@include_once('lib_mapconfig.php');
	@include_once('lib_dbconfig.php');
	//first default map or send by post selection
	if($_POST['fechaSeleccionada'] !=""){
		$fecha_seleccionada=$_POST['fechaSeleccionada'];
	}else{
		$fecha_seleccionada='2008-04-23';
	}
	@include_once('lib_sqlquery.php');
	@include_once('class_map.php');
//La hacienda La Negra, cuenta con una distribuci�n espacial de los 182 sitios de evaluaci�n, donde se midi� la presencia de salivazos adultos en cada una de las estaciones de muestreo
?>

<html>
	<head>
		<title>Proyecto Final- Modelaci&oacute;n Dinamica Espacial ( Visualizador de Datos) </title>
	</head>
	<body>
		<TABLE border=1 align="center" bgcolor="#EFEFEF">
		<TR>
			<TD width="50">
				<div align="center" id="title_project">			
					<B>Visualizador Datos - Proyecto Final</B><br>
					<B>AN�LISIS DE LA DIN�MICA ESPACIAL DEL SALIVAZO EN CA�A DE AZ�CAR</B><br><br>
					Curso de Modelaci�n Din�mica Espacial / Programa de Especializaci�n en Geom�tica / Universidad del Valle<br>
					Alumnos: Fabio Andr�s Herrera - Julio Alex Mu�oz / Profesora: Margoth Cuar�n<br>
					Junio de 2012<br><br>				
				</div>	
				
				<div id="documentacion"><font size=2 align="left">La hacienda La Negra, cuenta con una distribuci�n espacial de 182 sitios de evaluaci�n, donde se midi� la presencia de salivazos adultos en cada una de las estaciones de muestreo.</font></div>
				
				<!-- <div align="center" id="controles" style="border-width: .1em; border-style: dotted; border-color: #900; "> -->
				<div align="center" id="controles">
					Seleccione la fecha del mapa a generar
					<br>
					<form name="formulario" action="mde.php" target="_parent" method="post">
						<SELECT NAME="fechaSeleccionada" SIZE=1>
							<?php 
								$sqldates = pg_exec($obj_conexdb,"select fecha from fechas order by id_fecha asc;");
								for($i=0;$i<pg_numrows($sqldates);$i++)
								{
									$dateindb = pg_result($sqldates,$i,0);
									if ($fecha_seleccionada == $dateindb)
										echo '<OPTION ID="fecha" NAME="fecha" VALUE="'.$dateindb.'" selected>'.$dateindb.'</OPTION>';
									else
										echo '<OPTION ID="fecha" NAME="fecha" VALUE="'.$dateindb.'">'.$dateindb.'</OPTION>';
								}
							?>
						</SELECT> 
						<input type="submit" value="Generar">
					</form>
				</div> 
			
				<div align="center" id="mapa">
				<TABLE border=0>
					<TR>
						<TD ><img src="<?php echo $urlImage; ?>" border="1" ></TD>
						<TD valign="top" align="center"><b>Convenciones</b><br>
							<img src="<?php echo $urlLegend; ?>" border="1" >
						</TD>
					</TR>
					<TR>
						<TD colspan="2"><font size=1><b>NOTA:</b> Los datos usados pertenecen a una serie de investigaciones y muestreos adelantados a lo largo de varios a�os por el area de entomolog�a del Centro de Investigaci�n de la Ca�a de Az�car de Colombia (CENICA�A), los cuales de forma muy amable los proporcionaron para la realizaci�n �nica y exclusivamente del presente proyecto, con fines acad�micos.</font></TD>
					</TR>
				</TABLE>
					<!-- <span>Fecha seleccionada: <b><?php echo $fecha_seleccionada; ?></b></span><br> -->
				</div>
			</TD>
		</TR>
		</TABLE>
	</body>
</html>