<?php

function xprint( $param, $title = 'Отладочная информация' )
{
    ini_set( 'xdebug.var_display_max_depth', 50 );
    ini_set( 'xdebug.var_display_max_children', 25600 );
    ini_set( 'xdebug.var_display_max_data', 9999999999 );
    if ( PHP_SAPI == 'cli' )
    {
        echo "\n---------------[ $title ]---------------\n";
        echo print_r( $param, true );
        echo "\n-------------------------------------------\n";
    }
    else
    {
        ?>
        <style>
            .xprint-wrapper {
                padding: 10px;
                margin-bottom: 25px;
                color: black;
                background: #f6f6f6;
                position: relative;
                top: 18px;
                border: 1px solid gray;
                font-size: 11px;
                font-family: InputMono, Monospace;
                width: 80%;
            }

            .xprint-title {
                padding-top: 1px;
                color: #000;
                background: #ddd;
                position: relative;
                top: -18px;
                width: 170px;
                height: 15px;
                text-align: center;
                border: 1px solid gray;
                font-family: InputMono, Monospace;
            }
        </style>
        <div class="xprint-wrapper">
        <div class="xprint-title"><?= $title ?></div>
        <pre style="color:#000;"><?= htmlspecialchars( print_r( $param, true ) ) ?></pre>
        </div><?php
    }
}

function xd( $val, $title = null )
{
    xprint( $val, $title );
    die();
}

