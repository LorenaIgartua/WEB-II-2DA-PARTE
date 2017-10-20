
<?php
include_once 'view/View.php';
include_once 'model/Model.php';
include_once 'view/RisottoView.php';
include_once 'controller/SeguridadController.php';
include_once 'model/PlatoMenuModel.php';
include_once 'model/TipoMenuModel.php';

class RisottoController extends Controller

	{
	function __construct()
		{
		$this->view = new RisottoView();
		$this->tipoMenu = new TipoMenuModel();
		$this->platos = new PlatoMenuModel();
		}


	function index()
		{
		$this->view->mostrarIndex();
		}


	function home()
		{
		$this->view->mostrarHome();
		}


	function contacto()
		{
		$this->view->mostrarContacto();
		}


	function nosotros()
		{
		$this->view->mostrarNosotros();
		}


	function menu()
		{
		$id_menu = isset($_POST['id_menu']) ? $_POST['id_menu'] : null;
		$palabra = isset($_POST['palabra']) ? $_POST['palabra'] : null;
		$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
		$tipo = $this->tipoMenu->obtenerTipoMenu();
		$platos = $this->platos->obtenerPlatos($id_menu, $palabra, $valor);
		$this->view->mostrarMenu($tipo, $platos);
		}
	}

?>
