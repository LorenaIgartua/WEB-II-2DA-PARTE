
<?php
class RisottoView extends View

	{
	function mostrarIndex()
		{
		return $this->smarty->display('templates/index.tpl');
		}

	function mostrarHome()
		{
		return $this->smarty->display('templates/home.tpl');
		}

	function mostrarContacto()
		{
		return $this->smarty->display('templates/contacto.tpl');
		}

	function mostrarNosotros()
		{
		return $this->smarty->display('templates/nosotros.tpl');
		}

	function mostrarMenu($tipos, $platos)
		{
		$this->smarty->assign('tipos', $tipos);
		$this->smarty->assign('platos', $platos);
		$this->smarty->display('templates/menuUsuario.tpl');
		}
	}

?>
