/*$("#id_subcategoria").change(function() {
  $.ajax({
    url: 'toolsArticles.php',
    method:"POST",
    data:{id:this.val()},
    success: function(res) {

      var resultado = jason.parse(res);
      $.each(resultado, function(i,v) {
    	var html="option value="+v.id_subcategoria+">"+v.nombre_subcategoria+"</option>";
  		id.append(html);    
      });
    },
    error: function() {
      console.log("No se ha podido obtener la información");
    }
  });
});
*/
		$(document).ready(()=>{
		    let $categoria_padre = $("#cat");//ese es el id de las categorias padres
		    let $categoria_hija = $("#subcat");//ese es el id de las categorias hijas

        /**
				 * Por defecto cuando carga la pagina hacemos una peticion ajax para recuperar hija si cambriar
				 * el value de la lista padre eso es por defecto (cuando cargas la pagina )
         */
        $.ajax({
            url: "getCategories.php",
            method:'POST',
            data:{cat: $categoria_padre.val()},
            success:function (response) {
                var respuesta = JSON.parse(response);
                console.log(respuesta);
                $.each(respuesta,(i,v)=>{
                	$categoria_hija.append('<option value='+v.id_subcategoria+'>'+v.nombre_subcategoria+'</option>');
                    //$categoria_hija.append(renderOptionElement(v));
                })
            }
        })

        /**
				 * si cambias la categoria padre del select hacemos otra peticion ajax par devolver hijos segun el value que tenemos
				 * en el elemento option de los padres
          */
		    $categoria_padre.change(()=>{
		   //     $("#load").html('<p>Cargando ...</p>');
					$categoria_hija.html('');//limpiamos la lista antes de la peticion ajax;
		        $.ajax({//mandamos una peticion con post
								url: "getCategories.php",//url que tienes que adaptarla a tu pagina
								method:'POST', //metodo post mucho mejor
								data:{cat: $categoria_padre.val()},//valor de la categoria padre esta en <option value='id de categoria padre'>
								success:function (response) {//la  respuesta del servidor
									var respuesta = JSON.parse(response); //cambiamos la estructura de la respusta a formato JSON
									console.log(respuesta);
                    //$("#load").fadeOut(1000);
									$.each(respuesta,(i,v)=>{//recorremos la respuesta (es un foreach normal )										
									$categoria_hija.append('<option value='+v.id_subcategoria+'>'+v.nombre_subcategoria+'</option>');//cada vez que existe resultado lo agregamos a la lista de hijas con append igual a appendChild de javascript
									})
                }
						})

				});
		})

    /**
		 * esa function devuelve el element <option> lo rellena con el objeto puesto en el parametro
     * @param obj
     * @returns {string}
     */
		function renderOptionElement(obj) {
				let $option = `
				<option value="${obj.id}">${obj.nombre}</option>
				`
				return $option;
    }



