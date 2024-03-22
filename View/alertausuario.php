<html>

<head>
    <script src="sweetalert2.min.js"></script>

    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    //Funcion alerta ingresar usuario
    function alertaingresousuario()
    
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'USUARIO REGISTRADO',
                text: '¿Desea registrar otro?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `NO`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = '/wholemart1.2/View/registrar_usuario.php';
                } else if (result.isDenied) {
                    //Swal.fire('Changes are not saved', '', 'info')
                    window.location = '/wholemart1.2/View/langing_page.php';
                }
            })
        </script>
    <?php
    }

    //funcion alerta Ingreso producto
    function alertaingresproducto()
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'PRODUCTO REGISTRADO',
                text: '¿Desea registrar otro producto?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `NO`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = '/wholemart1.2/View/registrar_producto.php';
                } else if (result.isDenied) {
                    //Swal.fire('Changes are not saved', '', 'info')
                    window.location = '/wholemart1.2/View/listar_producto.php';
                }
            })
        </script>
    <?php
    }
    //funcion alerta ENTRADA COMPRA
    function alertaentradacompraok()
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'COMPRA REGISTRADA SATISFACTORIALMENTE',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })

        </script>
    <?php
    }

    function alertaentradacompraerror()
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'ERROR INGRESO COMPRA',
                text: 'Contacta al administrador del sistema',
            }).then((result) => {
                window.location = '/wholemart1.2/View/form_entradas_compra.php';
            })

        </script>
    <?php
    }

    function alertainventarioactualizadook()
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'INVENTARIO ACTUALIZADO SATISFACTORIALMENTE',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        </script>
    <?php
    }

    function alertainventarioactualizadoerror()
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'INVENTARIO NO ACTUALIZADO',
                text: 'Contacta al administrador del sistema',
                
            }).then((result) => {
                window.location = '/wholemart1.2/View/form_entradas_compra.php';
            })
        </script>
    <?php
    }
    function alertaproductonoexiste()
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'PRODUCTO NO EXISTE',
                text: 'Revisa la vista de productos',
                
            }).then((result) => {
                window.location = '/wholemart1.2/View/listar_producto.php';
            })
        </script>
    <?php
    }

    function alertaingresonuevacompra()
    {
    ?>
        <script type="text/javascript">
            Swal.fire({
                title: 'PROCESO COMPLETADO DE COMPRA E INVENTARIO',
                text: 'Desea registrar otra compra?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'SI',
                denyButtonText: `NO`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = '/wholemart1.2/View/entradas.php';
                } else if (result.isDenied) {
                    //Swal.fire('Changes are not saved', '', 'info')
                    window.location = '/wholemart1.2/View/form_entradas_compra.php';
                }
            })
        </script>
    <?php
    }
// FIN ALERTAS COMPRA

//ALERTAS VENTAS

function alertaventaok()
{
?>
    <script type="text/javascript">
        Swal.fire({
            title: 'VENTA REGISTRADA SATISFACTORIALMENTE',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })

    </script>
<?php
}

function alertaventaerror()
{
?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: 'ERROR INGRESO VENTA, NO HAY INVENTARIO',
            text: 'revisa la informacion',
        }).then((result) => {
            window.location = '/wholemart1.2/View/form_salida_venta.php';
        })

    </script>
<?php
}



function alertaingresonuevaventa()
{
?>
    <script type="text/javascript">
        Swal.fire({
            title: 'PROCESO COMPLETADO DE COMPRA E INVENTARIO',
            text: 'Desea registrar otra compra?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'SI',
            denyButtonText: `NO`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = '/wholemart1.2/View/salidas.php';
            } else if (result.isDenied) {
                //Swal.fire('Changes are not saved', '', 'info')
                window.location = '/wholemart1.2/View/form_salida_venta.php';
            }
        })
    </script>
<?php
}

    ?>






</body>

</html>