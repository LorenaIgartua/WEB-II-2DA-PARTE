
<?php
include_once 'view/MenuView.php';
include_once 'model/TipoMenuModel.php';
include_once 'model/PlatoMenuModel.php';
include_once 'controller/SeguridadController.php';

class MenuController extends Controller

	{
	private $seguridadController;
	function __construct()
		{
		$this->view = new MenuView();
		$this->tipoMenu = new TipoMenuModel();
		$this->platos = new PlatoMenuModel();

		// $this->model = new MenuModel();

		$this->seguridadController = new SeguridadController();
		}

	function menuAdmin()
		{
		$id_menu = isset($_POST['id_menu']) ? $_POST['id_menu'] : null; // controlar
		$palabra = isset($_POST['palabra']) ? $_POST['palabra'] : null;
		$tipo = $this->tipoMenu->obtenerTipoMenu();
		$platos = $this->platos->obtenerPlatos($id_menu, $palabra);
		$this->view->mostrarMenuAdmin($tipo, $platos, "", $error = '');
		}


	function cargarPlato()
		{
		$id_plato = $_POST['id_plato'];
		$id_menu = null;
		$palabra = null;
		$tipo = $this->tipoMenu->obtenerTipoMenu();
		$platos = $this->platos->obtenerPlatos($id_menu, $palabra);
		$plato = $this->platos->obtenerPlato($id_plato);
		$this->view->mostrarMenuAdmin($tipo, $platos, $plato, "", $error = '');
		}


	function cargarMenu()
		{
		$id_plato = null;
		$id_menu = null;
		$palabra = null;
		$busquedaMenu = $_POST['id_menu'];
		$tipo = $this->tipoMenu->obtenerTipoMenu();
		$platos = $this->platos->obtenerPlatos($id_menu, $palabra);
		$menu = $this->tipoMenu->obtenerTipo($busquedaMenu);
		$this->view->mostrarMenuAdmin($tipo, $platos, "", $menu, $error = '');
		}

	function agregarPlato()
		{
		$id_menu = isset($_POST['id_menu']) ? $_POST['id_menu'] : "";
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
		$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
		$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
		if ($nombre != "")
			{
			$tipo = $this->platos->agregarPlato($id_menu, $nombre, $descripcion, $valor);
			header('Location: ' . MENUADMIN);
			}
		  else
			{
			$error = 'Para crear un plato, asignele un nombre';
			$tipo = $this->tipoMenu->obtenerTipoMenu();
			$platos = $this->platos->obtenerPlatos("", "");
			$this->view->mostrarMenuAdmin($tipo, $platos, "", "", $error);
			}
		}

	function agregarMenu()
		{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
		$this->tipoMenu->agregarMenu($nombre);
		header('Location: ' . MENUADMIN);
		}

	function eliminarPlato()
		{
		$id_plato = $_POST['id_plato'];
		$this->platos->eliminarPlato($id_plato);
		header('Location: ' . MENUADMIN);
		}


	function eliminarMenu()
		{
		$id_menu = $_POST['id_menu'];
		if ($this->platos->platosDisponiblesMenu($id_menu) [0]['count(*)'] == 0)
			{
			$this->tipoMenu->eliminarMenu($id_menu);
			$error = '';
			}
		  else
			{
			$error = 'La categoria no debe contener platos';
			}

		$tipo = $this->tipoMenu->obtenerTipoMenu();
		$platos = $this->platos->obtenerPlatos("", "");
		$this->view->mostrarMenuAdmin($tipo, $platos, "", "", $error);
		}


	function actualizarPlato()
		{
		$id_plato = isset($_POST['id_plato']) ? $_POST['id_plato'] : "";
		$id_menu = isset($_POST['id_menu']) ? $_POST['id_menu'] : 1; // acomodar
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
		$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
		$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
		$tipo = $this->platos->actualizarPlato($id_menu, $nombre, $descripcion, $valor, $id_plato);
		header('Location: ' . MENUADMIN);
		}


	function actualizarMenu()
		{
		$id_menu = isset($_POST['id_menu']) ? $_POST['id_menu'] : 1; // acomodar
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
		$tipo = $this->tipoMenu->actualizarMenu($id_menu, $nombre);
		header('Location: ' . MENUADMIN);
		}
	}

?>
