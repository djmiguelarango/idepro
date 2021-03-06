<?php  
//include('configuration.class.php');
$con= new ConfigurationSibas();
$host = $con->host;
$user = $con->user;
$password = $con->password;
$db = $con->db;

$conexion = mysql_connect($host, $user, $password) or die ("Fallo en el establecimiento de la conexi&oacute;n");
mysql_select_db($db,$conexion);
    $date=date("Y-m-d");
	//echo $date; 
	$aprov='';
	
$selectdes="SELECT t0.no_emision, t2.nombre, t2.paterno, t2.materno, t2.ci, case t2.genero when 'F' then 'Femenino' when 'M' then 'Masculino' end as genero, t2.localidad, t2.telefono_celular, t2.telefono_domicilio, t2.email, t2.estatura, t2.peso, t2.edad, t0.motivo_facultativo, datediff(now(),t0.fecha_creacion) AS proceso, t0.tasa, t0.monto_solicitado, t0.moneda, t0.cumulo_deudor, t0.cumulo_codeudor, t0.fecha_creacion, case t7.respuesta when 0 then 'Observado' when 1 then 'Subsanado/Pendiente' else 'Pendiente' end as estado, t8.estado as observacion, t5.agencia, t3.usuario, t3.nombre as nom_us, t3.email as email_us, case t0.aprobado when 1 then 'SI' when 0 then 'NO' end as aprobado, t0.prefijo

FROM s_de_em_cabecera t0 inner join  s_de_em_detalle t1 on t0.id_emision = t1.id_emision inner join s_cliente t2 on t1.id_cliente = t2.id_cliente inner join s_usuario t3 on t0.id_usuario = t3.id_usuario left outer join s_departamento t4 on t4.id_depto = t3.id_depto left outer join s_agencia t5 on t5.id_agencia = t3.id_agencia left outer join s_de_facultativo t6 on t0.id_emision = t6.id_emision left outer join s_de_pendiente t7 on t0.id_emision = t7.id_emision left outer join s_estado t8 on t8.id_estado =  t7.id_estado

WHERE t0.facultativo = 1 and t0.emitir = 0 and t0.anulado = 0 and t0.aprobado = 1 and t0.id_emision not in (Select id_emision from s_de_facultativo)

ORDER BY t0.no_emision ASC"; 				
//echo $selectdes;
			$consultades=mysql_query($selectdes,$conexion);


					 $date1=date("d-m-Y");
  //Creación de la tabla con formato HTML
$shtml="<table border='0' cellspacing='1' cellpadding='0' style='width:150%; font-size:9pt;'>";
			$shtml.='<tr><td colspan="17" align="center"> CASOS FACULTATIVOS PENDIENTES DE PROCESAMIENTO POR LA ASEGURADORA FECHA &nbsp;'.$date1.'</td></tr>';
			
			$shtml.='<tr style="background:#D3DCE3;">
					  <td align="center"><b>No CERTIFICADO</b></td>
					  <td align="center"><b>NOMBRES</b></td>
					  <td align="center"><b>APELLIDO PATERNO</b></td>
					  <td align="center"><b>APELLIDO MATERNO</b></td>
					  <td align="center"><b>C.I.</b></td>
					  <td align="center"><b>SEXO</b></td>
					  <td align="center"><b>LOCALIDAD</b></td>
					  <td align="center"><b>CELULAR</b></td>
					  <td align="center"><b>TELEFONO</b></td>
					  <td align="center"><b>EMAIL</b></td>
					  <td align="center"><b>ESTATURA (cm)</b></td>
					  <td align="center"><b>PESO (Kg)</b></td>
					  <td align="center"><b>EDAD (a&ntilde;os)</b></td>
					  <td align="center"><b>MOTIVO FACULTATIVO</b></td>
					  <td align="center"><b>DIAS EN PROCESO</b></td>  					  
  					  <td align="center"><b>TASA ACTUAL</b></td>
					  <td align="center"><b>MONTO SOLICITADO</b></td>
					  <td align="center"><b>TIPO MONEDA</b></td>
					  <td align="center"><b>MONTO ACUMULADO DEUDOR</b></td>
					  <td align="center"><b>MONTO ACUMULADO CODEUDOR</b></td>
					  <td align="center"><b>FECHA DE SOLICITUD</b></td>
					  <td align="center"><b>ESTADO</b></td>
					  <td align="center"><b>OBSERVACIONES REALIZADAS</b></td>
					  <td align="center"><b>AGENCIA</b></td>
					  <td align="center"><b>USUARIO</b></td>
					  <td align="center"><b>NOMBRE USUARIO</b></td>
					  <td align="center"><b>EMAIL USUARIO</b></td>
					  <td align="center"><b>SOLICITUD ENVIADA A LA CIA.</b></td>
					 </tr>';
			
				while($resutadodes=mysql_fetch_array($consultades)){
					
					if($resutadodes['aprobado']=='SI'){$bg='background:#1a834c; color:FFF;'; }else{$bg='background:#f82d2d; color:FFF;'; }
			
						 $shtml.='<td align="center">'.$resutadodes['prefijo'].'-'.$resutadodes['no_emision'].'</td>
							  <td align="center">'.$resutadodes['nombre'].'</td>
							  <td align="center">'.$resutadodes['paterno'].'</td>
							  <td align="center">'.$resutadodes['materno'].'</td>
							  <td align="center">'.$resutadodes['ci'].'</td>
							  <td align="center">'.$resutadodes['genero'].'</td>
							  <td align="center">'.$resutadodes['localidad'].'</td>
							  <td align="center">'.$resutadodes['telefono_celular'].'</td>
							  <td align="center">'.$resutadodes['telefono_domicilio'].'</td>
							  <td align="center">'.$resutadodes['email'].'</td>
							  <td align="center">'.$resutadodes['estatura'].'</td>
							  <td align="center">'.$resutadodes['peso'].'</td>
							  <td align="center">'.$resutadodes['edad'].'</td>
							  <td align="center">'.$resutadodes['motivo_facultativo'].'</td>
							  <td align="center">'.$resutadodes['proceso'].'</td>
							  <td align="center">'.$resutadodes['tasa'].'</td>
							  <td align="center">'.number_format($resutadodes['monto_solicitado'],3,".",",").'</td>
							  <td align="center">'.$resutadodes['moneda'].'</td>
							  <td align="center">'.number_format($resutadodes['cumulo_deudor'],3,".",",").'</td>
							  <td align="center">'.number_format($resutadodes['cumulo_codeudor'],3,".",",").'</td>
							  <td align="center">'.$resutadodes['fecha_creacion'].'</td>
							  <td align="center">'.$resutadodes['estado'].'</td>
							  <td align="center">'.$resutadodes['observacion'].'</td>
							  <td align="center">'.$resutadodes['agencia'].'</td>
							  <td align="center">'.$resutadodes['usuario'].'</td>
							  <td align="center">'.utf8_decode($resutadodes['nom_us']).'</td>
							  <td align="center">'.$resutadodes['email_us'].'</td>
							  <td align="center" style="'.$bg.'">'.$resutadodes['aprobado'].'</td>
						</tr>';
				}		
			$shtml.="</table>";
			
$scarpeta="archivos_email"; //carpeta donde guardar el archivo.
//debe tener permisos 775 por lo menos
$sfile=$scarpeta."/Facultativo Pendientes_".$date1.".xls"; //ruta del archivo a generar
$fp=fopen($sfile,"w");
fwrite($fp,$shtml);//procedemos a escribir el archivo con los datos de $shtml
fclose($fp);
//echo "<a href='".$sfile."' target='_blank'>Haz click aqui</a>";
//Se muestra un hipervínculo para poder descargar la tabla en formato excel
?>