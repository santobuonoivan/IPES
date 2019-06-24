<?php

interface IPersona {
    function TraerUno($request, $response, $args);
    function TraerTodos($request, $response, $args);
    function CargarUno($request, $response, $args);
    function BorrarUno($request, $response, $args);
    function ModificarUno($request, $response, $args);
}
    