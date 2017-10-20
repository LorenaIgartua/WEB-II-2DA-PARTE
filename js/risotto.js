$(document).ready(function() {
    $.ajax({
        url: document.location.href + "home",
        success: function(data) {
            mostrar_render(data);
        }
    });
});

$("#nav_logo").on("click", function(event) {
    cargarSeccion(event, "home")
});

$("#nav_inicio").on("click", function(event) {
    cargarSeccion(event, "home");
});

$("#nav_menu").on("click", function(event) {
    cargarSeccion(event, "menu")
});

$("#nav_contacto").on("click", function(event) {
    cargarSeccion(event, "contacto")
});

$("#nav_nosotros").on("click", function(event) {
    cargarSeccion(event, "nosotros")
});

$("#menuAdmin").on("click", function(event) {
    cargarSeccion(event, "menuAdmin")
});

function mostrar_render(data) {
    $("#render").html(data);
};

function cargarSeccion(event, seccion) {
    event.preventDefault();
    $.ajax({
        url: document.location.href + seccion,
        success: function(data) {
            mostrar_render(data);
        }
    });
};

function renderPost(destino, serializedData) {
    $.post(document.location.href + destino, serializedData,
        function(response) {
            mostrar_render(response);
        });
};

$(document).on("click", ".eliminarPlato", function(event) {
    event.preventDefault();
    renderPost("eliminarPlato", {
        "id_plato": $(this).attr('name')
    });
});

$(document).on("click", ".eliminarMenu", function(event) {
    event.preventDefault();
    renderPost("eliminarMenu", {
        "id_menu": $(this).attr('name')
    });
});

$(document).on("submit", "#login", function(event) {
    event.preventDefault();
    renderPost("verificarUsuario", $(this).serialize());
});
$(document).on("click", ".cargarPlato", function(event) {
    event.preventDefault();
    renderPost("cargarPlato", {
        "id_plato": $(this).attr('name')
    });
});

$(document).on("click", ".cargarMenu", function(event) {
    event.preventDefault();
    renderPost("cargarMenu", {
        "id_menu": $(this).attr('name')
    });
});

$(document).on("click", ".modificarMenu", function(event) {
    event.preventDefault();
    renderPost("modificarMenu", {
        "id_menu": $(this).attr('name')
    });
});

$(document).on("submit", "#agregarPlato", function(event) {
    event.preventDefault();
    renderPost("agregarPlato", $(this).serialize());
});

$(document).on("submit", "#agregarMenu", function(event) {
    event.preventDefault();
    renderPost("agregarMenu", $(this).serialize());
});

$(document).on("submit", ".actualizarPlato", function(event) {
    event.preventDefault();
    renderPost("actualizarPlato", $(this).serialize());
});

$(document).on("submit", ".actualizarMenu", function(event) {
    event.preventDefault();
    renderPost("actualizarMenu", $(this).serialize());
});

$(document).on("submit", "#filtro", function(event) {
    event.preventDefault();
    renderPost("menu", $(this).serialize());
});

$(document).on("submit", "#filtroAdm", function(event) {
    event.preventDefault();
    renderPost("menuAdmin", $(this).serialize());
});
