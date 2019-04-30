<?php

interface IMiddleware{
    static function verificarToken($request,$response,$next);
}