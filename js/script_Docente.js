"use strict";
var redipsInit;
redipsInit=function(){
	var rd=REDIPS.drag;
	rd.init();
	rd.dropMode='single';
	rd.clone.sendBack='true';
	var matriz= new Array(5);
	var	cont=200; 
	for (var i=0;i<11;i++)
	{
		matriz[i]=new Array(5);
	}
	//Llenar matriz a comparar
	for(var i=1;i<6;i++){
		for (var j = 1; j <11; j++) {
			matriz[j][i]=cont;
			//console.log("matriz "+j+","+i+"="+matriz[j][i]+"");
			cont++;
		}
	}//Evento arratrar un objeto
	rd.event.dropped=function()
	{	
		var resultado="";
		var pos=0;
		var pos=rd.getPosition(),
		row = pos[1],
		col = pos[2];
//			console.log("i"+pos+"fila "+row+"col "+col);
			var b="";
			var	mensaje=rd.obj.id;
			
//			console.log("imprimir"+mensaje.length+'contenido'+mensaje);
			if(mensaje.length==4){
				for (var i = 0; i < mensaje.length-2; i++) {
					b+=mensaje[i];
				}
			}else{
				b=mensaje;
			}
			for (var h = 0; h < b.length-2; h++) {
					resultado += b[h];
				}	
			//console.log(resultado);
			var ruta="I="+resultado+"&loc="+matriz[row][col];
		 	$.ajax({
                data:  ruta, //datos que se envian a traves de ajax
                url:   'save_datos.php', //archivo que recibe la peticion
                type:  'post', //método de envio
               
				success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
					$('#respuesta').html(response);			
                	var pos=rd.getPosition(),
			row_d = pos[4],
			col_d = pos[5];
			var bh="";
			var	mess=	rd.obj.id;
			for (var i = 0; i < mess.length-2; i++) {
				bh+=mess[i];
			}
		 
		 	var ruta="I="+mess+"&loc="+matriz[row_d][col_d];
 				$.ajax({
                data:  ruta, //datos que se envian a traves de ajax
                url:   'delete_datos.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                // beforeSend: function () {
                //         $("#resultado").html("Procesando, espere por favor...");
                // },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
					
                }
		// delete element (AJAX handler is not needed)
			});
                }
        });
		 // rd.ajaxCall('\save_datos.php?p=' + b + '_' + matriz[row][col]);
	};
	rd.event.deleted = function () {
		var pos=rd.getPosition(),
			row = pos[4],
			col = pos[5];
			var b="";
			var	mes=rd.obj.id;
			
			for (var i = 0; i < mes.length-2; i++) {
				b+=mes[i];
			}
			 var ruta="I="+mes+"&loc="+matriz[row][col];
			 console.log(ruta);
 				$.ajax({
                data:  ruta, //datos que se envian a traves de ajax
                url:   'delete_datos.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                }
		// delete element (AJAX handler is not needed)
			});
	};

};


// add onload event listener
if (window.addEventListener) {
	window.addEventListener('load', redipsInit, false);
}
else if (window.attachEvent) {
	window.attachEvent('onload', redipsInit);
}
