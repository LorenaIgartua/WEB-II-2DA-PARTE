
<form id= "filtro"method="post" >
   <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
         <button type="submit"  class=" btn btn-warning btn-mg" ><span class="glyphicon glyphicon-search"></span></button>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
         <select class="form-control " name="id_menu" id="tipo_plato">
            <option value="">todas las categorias</option>
            {foreach from=$tipos item=tipo}
            <option value="{$tipo['id_menu']}">{$tipo['nombre']}</option>
            {/foreach}
         </select>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
         <input type="text" name="palabra" class="form-control "  id="palabra" placeholder="Buscar platos con .....">
      </div>
   </div>
</form>
