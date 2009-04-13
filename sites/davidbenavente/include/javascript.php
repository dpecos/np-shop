function changeLanguage(lang) {
    href = window.location.href;
    if (href.indexOf("?") >= 0) {
        i = href.indexOf("LANG=");
        if (i >= 0) {
            href = href.substring(0, i+5) + lang + href.substring(i+10);
        } else
            href += "&LANG=" + lang;
    } else {
        i = href.indexOf("LANG=");
        if (i >= 0) { 
            href = href.substring(0, i+5) + lang + href.substring(i+10);
        } else
            href += "?LANG=" + lang;
    }
    window.location.href = href;
}	

function switchLanguage(lang) {
    if (lang == "es_ES")
        changeLanguage("en_US");
    else if (lang == "en_US")
        changeLanguage("es_ES");
}

function showCategory() {
    form = document.getElementById("categoryForm");
    form.submit();
}

var versOk = (((navigator.appName == "Netscape")&& (parseInt(navigator.appVersion) >= 3))||((navigator.appName == "Microsoft Internet Explorer")&&(parseInt(navigator.appVersion)>=4))); 

if(versOk){
    b1_off = new Image(); b1_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b01-anadir-off.gif";
    b2_off = new Image(); b2_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b02-actualizar-subtotal-off.gif";		
    b3_off = new Image(); b3_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b03-continuar-off.gif";		
    b4_off = new Image(); b4_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b04-finalizar-compra-off.gif";		
    b5_off = new Image(); b5_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b05-finalizar-pedido-off.gif";		
    b6_off = new Image(); b6_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b06-modificar-datos-off.gif";	
    b7_off = new Image(); b7_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b07-modificar-pedido-off.gif";		
    b8_off = new Image(); b8_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b08-seguir-comprando-off.gif";
    b9_off = new Image(); b9_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b09-continuar-registro-off.gif";			
    b10_off = new Image(); b10_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b10-enviar-off.gif";		
    b11_off = new Image(); b11_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b11-finalizar-registro-off.gif";		
    b12_off = new Image(); b12_off.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b12-modificar-datosycontinuar-off.gif";	
    
    b1_on = new Image(); b1_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b01-anadir-on.gif";
    b2_on = new Image(); b2_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b02-actualizar-subtotal-on.gif";			
    b3_on = new Image(); b3_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b03-continuar-on.gif";		
    b4_on = new Image(); b4_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b04-finalizar-compra-on.gif";			
    b5_on = new Image(); b5_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b05-finalizar-pedido-on.gif";			
    b6_on = new Image(); b6_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b06-modificar-datos-on.gif";	    
    b7_on = new Image(); b7_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b07-modificar-pedido-on.gif"; 			
    b8_on = new Image(); b8_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b08-seguir-comprando-on.gif";				
    b9_on = new Image(); b9_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b09-continuar-registro-on.gif";			
    b10_on = new Image(); b10_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b10-enviar-on.gif";			
    b11_on = new Image(); b11_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b11-finalizar-registro-off.gif";			
    b12_on = new Image(); b12_on.src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b12-modificar-datosycontinuar-on.gif";
} 
var pulsado;

function rollOn(n,img) {
	if (versOk) {
	    if (img == null)
	        img = document[n];
    	light=eval(n+"on.src");
    	//console.log(n + " -> " +light);
    	img.src=light; 
	}
}

function rollOff(n,img) {
	if (versOk)	{
	    if (img == null)
	        img = document[n];
		dark=eval(n+"off.src");
		//console.log(n + " -> " +dark);
		img.src=dark;
	}
}

function activar(nombre, img){
    if (pulsado==null) {
    	url=document.location;
    	document.location=url;
    } else {
    	rollOff(pulsado,img);
    }
    pulsado=nombre;
}

function chequear(nombre, img) {
    if (pulsado==nombre)
        rollOn(nombre, img);
    else
        rollOff(nombre,img);
}

function pagina_actual (subdirectorio)
	{
	fichero = document.location.toString();
	posicion0 = fichero.lastIndexOf("/");
	nombre0 = fichero.substring(0,posicion0);
	posicion = nombre0.lastIndexOf("/") + 1;
	nombre = fichero.substring(posicion,nombre0.length);
	nombre = fichero.substring(posicion0+1,fichero.length);
	return(nombre);
	}
