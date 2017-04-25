



// Vista Usuario
function readUsuario(search)
{
		  $.ajax({
		    url  : '../controllers/usuario_controller.php', // Enviaremos a UsuarioController.php
		    data : 'action=true&search='+search, // Estos parametros
		    type : 'POST',
		    error: function(xhr,status)
		    {
		      alert('Ha surgido un error en Ajax.');
		    }

		    // Recuperamos datos y eviamos a HTML5
		  }).done(function(result){

		    // Variables locales
		    var row   = eval(result); // Recuperamos objeto JSON
		    var table = ""; // Objeto que servira para guardar datos y enviar


		    // Implemetamos la tabla
		    table = "";
		    table="<table class='table table-bordered table-hover table-striped'>";
		              table +="<thead>";
		                 table +="<tr>";
		                   table += "<th>#</th>";
		                   table += "<th>Acción</th>";
		                   table += "<th>Nombre</th>";
		                   table += "<th>Apellido paterno</th>";
		                   table += "<th>Apellido materno</th>";
		                   table += "<th>Usuario</th>";
		                   table += "<th>Password</th>";
		                 table +="</tr>";
		              table +="</thead>";
		          table +="<tbody>";
		             // Recorremos el arreglo
		             for(i=0; i<row.length; i++)
		             {
		             table += "<tr>";
		               table += "<td>"+(i+1)+"</td>";
		               table +="<td>";
		                  table += "<a role='button' href='index.php?query="+row[i][0]+"' class='btn btn-warning btn-sm' title='Editar usuario'> Editar</a>";
		                  table += " ";
		                  table += "<a role='button' href='index.php?_query="+row[i][0]+"' class='btn btn-danger btn-sm' title='Eliminar usuario'> Eliminar</a>";
		               table +="</td>";
		               table += "<td>"+row[i][1]+"</td>";
		               table += "<td>"+row[i][2]+"</td>";
		               table += "<td>"+row[i][3]+"</td>";
		               table += "<td>"+row[i][4]+"</td>";
		               table += "<td>"+row[i][5]+"</td>";
		             table += "</tr>";
		           }
		          table +="</tbody>";
		     table+="</table>";

		     // imprimimos en su propiedad html
		     $('.readAjax').html(table);

		  });

}
