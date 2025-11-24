<?php

    //Llamar al controlador y a la conexión
    include_once "app/controllers/UserController_alum.php";
    include_once "app/controllers/UserController_prof.php";
    include_once "app/controllers/UserController_adm.php";
    include_once "app/controllers/UserController_cate.php";
    include_once "app/controllers/UserController_mate.php";
    include_once "app/controllers/UserControllerBackup.php";
    include_once "app/controllers/ReportController.php";
    include_once "config/db_connection.php";
    include_once "app/controllers/LoginController.php";

    $controller = new UserController($connection);
    $controller_prof = new UserController_prof($connection);
    $controller_adm = new UserController_adm($connection);
    $controller_cat = new UserController_cate($connection);
    $controller_mate = new UserController_mate($connection);
    $controllerBackup = new UserControllerBackup($connection);
    $LoginController = new LoginController($connection);
    $ReportController = new ReportController($connection);


    if(isset($_GET['action'])){
        $action = $_GET['action'];

        switch($action){

            case 'login_form':
            // Muestra formulario
            $LoginController->index(); 
            break;

            case 'login_validar':
                // Procesa inicio de sesión
                $LoginController->validar();
                break;

            case 'pagina_adm':
                include "app/views/pagina_adm.php";
                break;

            case 'pagina_prof':
                include "app/views/pagina_prof.php";
                break;


            case 'pagina_inicio_alum':
                include "app/views/pagina_inicio_alum.php";
                break;

            case "cerrar_sesion":
                include "app/views/cerrar_sesion.php";
                break;

            //Alumno
            case 'insert':
                $controller -> insertUsuario();
                break;
            case 'consult':
                $controller -> consultarUsuarios();
                break;
            case 'update':
                $controller -> actualizarUsuario();
                break;
            case 'delete':
                $controller -> eliminarUsuario();
                break;
            case 'perfil':
                $controller -> perfilUsuario();
                break;
            case 'editarPerfil':
                $controller -> actualizarPerfil();
                break;

            // Profesor
            case 'insert_prof':
                $controller_prof -> insertProfesor();
                break;
            case 'consult_prof':
                $controller_prof -> consultarProfesor();
                break;
            case 'update_prof':
                $controller_prof -> actualizarProfesor();
                break;
            case 'delete_prof':
                $controller_prof -> eliminarProfesor();
                break;
            case 'perfil_prof':
                $controller_prof -> perfilUsuario();
                break;
             case 'editarPerfil_prof':
                $controller_prof -> actualizarProf();
                break;
                
            // Administradores
            case 'insert_adm':
                $controller_adm -> insertAdministrador();
                break;
            case 'consult_adm':
                $controller_adm -> consultarAdministrador();
                break;
            case 'update_adm':
                $controller_adm -> actualizarAdministrador();
                break;
            case 'delete_adm':
                $controller_adm -> eliminarAdministrador();
                break;
            case 'perfil_adm':
                $controller_adm -> perfilUsuario();
                break;
            case 'editarPerfil_adm':
                $controller_adm -> actualizarPerfil();
                break;

            // categorias
            case 'insert_cate':
                $controller_cat->insertCategoria();
                break;
            case 'consult_cate':
                $controller_cat->consultarCate();
                break;
            case 'update_cate':
                $controller_cat -> actualizarCate();
                break;
            case 'delete_cate':
                $controller_cat -> eliminarCate();
                break;

            //  Material
            case 'insert_mate':
                $controller_mate->insertMaterial();
                break;
            case 'consult_mate':
                $controller_mate->consultarMate();
                break;
            case 'update_mate':
                $controller_mate->actualizarMate();
                break;
            case 'delete_mate':
                $controller_mate->eliminarMate();
                break;
            case 'aprobar_mate':
                $controller_mate->aprobar();
                break;
            case 'rechazar_mate':
                $controller_mate->rechazar();
                break;
            case 'ver_material_aprobado':
                $controller_mate->verMaterialAprobado();
                break;
            case "calificar_mate":
                $controller_mate->calificarMaterial();
                break;
            case 'filtrar_material':
                $controller_mate->filtrarMaterial();
                break;
                
            // Reportes
            case 'pdf_report':
                $ReportController -> generarPDF();
                break;
            case 'pdf_pie':
                $ReportController -> generarPastel();
                break;
            case 'pdf_top3':
                $ReportController->generarPDF_Top3();
                break;
            case 'pdf_categorias':
                $ReportController->generarReporteCategorias();
                break;

            // Respaldo y Restaurar
            case 'backup':
                $controllerBackup -> realizarRespaldoBD();
                break;
            case 'restore':
                $controllerBackup -> restaurarBD();
            break;
            default:
                include "app/views/inicio.php";
                break;
        }
    }else{
       include "app/views/inicio.php";
    }