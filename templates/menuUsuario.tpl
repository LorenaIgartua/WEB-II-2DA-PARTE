<div class="cuerpo">
   <h1>menú</h1>
   {include file="formFiltroUsuario.tpl"}
   <div class="menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
      {foreach from=$tipos item=tipo}
      <h3>{$tipo['nombre']}</h3>
      <table class="menu" id = "{$nombre_menu['tipo_nombre']}" >
         {foreach from=$platos item=plato}
         {if ($plato['id_menu']==$tipo['id_menu'])}
         <tr>
            <td>
               <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal-{$plato['id_plato']}">VER</button>
               <div class="modal fade" id="myModal-{$plato['id_plato']}" role="dialog">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">{$tipo['nombre']} </h4>
                           <h3> {$plato['nombre']}</h3>
                        </div>
                        <div class="modal-body">
                           <p>{$plato['descripcion']} </p>
                           <p> $ {$plato['valor']}</p>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                        </div>
                     </div>
                  </div>
               </div>
            </td>
            <td id="plato" class = "celda_plato" >
               <h4>{$plato['nombre']}</h4>
            </td>
            <td id="precio" class = "celda_precio" >{$plato['valor']}</td>
         </tr>
         {/if}
         {/foreach}
      </table>
      {/foreach}
   </div>
</div>
