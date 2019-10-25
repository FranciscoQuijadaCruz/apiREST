/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var rest = {};

rest.agregarUsuario = function(nombre, apellido, edad, direccion, email, contrasena){
                    var par = {
                        "nombre":nombre,
                        "apellido":apellido,
                        "edad":edad,
                        "direccion":direccion,
                        "email":email,
                        "contrasena":contrasena
                    };
                    
                    console.log();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/usuarios",
                        success: function(data){
                                $("#mensajeRegistro").html("<div class='alert alert-success' role='alert'>The user was registered correctly</div>");
                                  window.location = 'index.html';
                        },
                        error: function(err){
                            console.log(err);
                                $("#mensajeRegistro").html("<div class='alert alert-danger' role='alert'>The user could not be registered, please try again</div>");
                        }
                    });
                };
                
rest.editarUsuario = function(id,nombre,apellido,edad,direccion,email,contrasena){
                    var par = {
                        "id":id,
                        "nombre":nombre,
                        "apellido":apellido,
                        "edad":edad,
                        "direccion":direccion,
                        "email":email,
                        "contrasena":contrasena
                    };
                    
                    console.log();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/editar/"+id,
                        success: function(data){
                                $("#mensajeRegistro2").html("<div class='alert alert-success'role='alert'>The changes were saved correctly</div>");
                            window.location = 'inicio.html';
                        },
                        error: function(err){
                            console.log(err);
                                $("#mensajeRegistro2").html("<div class='alert alert-danger' role='alert'>The modification could not be made.</div>");
                         }
                    });
                };
                
rest.eliminarUsuario = function(id){
                    var par = {
                        "id":id
                    };
                    
                    console.log();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/eliminar/"+id,
                        success: function(data){
                                $("#mensajeRegistro2").html("<div class='alert alert-success'role='alert'>The user has been successfully deleted</div>");
                            window.location = 'users.html';
                            
                        },
                        error: function(err){
                            console.log(err);
                                $("#mensajeRegistro2").html("<div class='alert alert-danger'role='alert'>The user could not be eliminated</div>");
                        }
                    });
                };
rest.consultarUsuario = function(id){
                    var par = {
                        "id":id
                    };
                    console.log();
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/usuarios/"+id,
                        success: function(data){
                            console.log(data);
                            $("#listado").html("");
                                $.each(data,function(i,usuario){
                                    $("<tr>").html("<th scope='row'>"+usuario.id+
                                            "</th><td>"+usuario.nombre+
                                            "</td><td>"+usuario.apellido+
                                            "</td><td>"+usuario.edad+
                                            "</td><td>"+usuario.direccion+
                                            "</td><td>"+usuario.email+
                                            "</td><td>"+usuario.contrasena+
                                            "</td><td>").appendTo("#listado");
                                });
                                    },
                        error: function(err){
                            console.log(err);
                                }
                    });
                };
    
rest.consultarUsuarios = function(){
    
                    console.log();
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "http://localhost:81/apiV1/src/public/usuarios",
                        success: function(data){
                            console.log(data);
                                $.each(data,function(i,usuario){
                                    var id = $(usuario.id).val();
                                    $("<tr>").html('<th scope="row" id="dri" >'+usuario.id+ 
                                            "</td><td >"+usuario.nombre+
                                            "</td><td>"+usuario.apellido+
                                            "</td><td>"+usuario.edad+
                                            "</td><td>"+usuario.direccion+
                                            "</td><td>"+usuario.email+
                                            "</td><td>"+usuario.contrasena+                                   
                                            "</td><td>").appendTo("#listado");
                                   
                                    
                                });
                                
                                    },
                                    
                        error: function(err){
                            console.log(err);
                                }
                    });
                    
                };
                 
                               

rest.login = function(email,contrasena){

                    var par = {
                        "email":email,
                        "contrasena":contrasena
                    };
                    
                    console.log();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/login",
                        success: function(data){
                            if (data.length === 1) {
                                $("#mensaje").html("<div class='alert alert-success' role='alert'>Successful login</div>");
                                window.location = 'inicio.html';
                            } else {
                                $("#mensaje").html("<div class='p-3 mb-2 bg-danger text-white' style='border-radius: 8px;'>Usuario o contraseña incorrectos</div>");
                            }
                        },
                        error: function(err){
                            console.log(err);
                         }
                    });
                };
                
                
                
                //rest categorias
                
                
                
                
rest.agregarCategoria = function(nombre, descripcion){
                    var par = {
                        "nombre":nombre,
                        "descripcion":descripcion
                    };
                    
                    console.log();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/categorias",
                        success: function(data){
                                $("#mensajeRegistroCat").html("<div class='alert alert-success' role='alert'>the category has been registered correctly</div>");
                             window.location = 'addcategory.html';

                        },
                        error: function(err){
                            console.log(err);
                                $("#mensajeRegistroCat").html("<div class='alert alert-danger' role='alert'>The category could not be registered correctly, please try again</div>");
                        }
                    });
                };       

rest.editarCategoria = function(id,nombre,descripcion){
                    var par = {
                        "id":id,
                        "nombre":nombre,
                        "descripcion":descripcion
                    };
                    
                    console.log();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/editarcat/"+id,
                        success: function(data){
                                $("#mensajeRegistroCat2").html("<div class='alert alert-success'role='alert'>The category has been modified correctly</div>");
                            window.location = 'editcategories.html';
                            
                        },
                        error: function(err){
                            console.log(err);
                                $("#mensajeRegistroCat2").html("<div class='alert alert-danger'role='alert'>The category could not be modified correctly, please try again.</div>");
                         }
                    });
                };
                
rest.eliminarCategoria = function(id){
                    var par = {
                        "id":id
                    };
                    
                    console.log();
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/eliminarcat/"+id,
                        success: function(data){
                                $("#mensajeRegistroCat2").html("<div class='alert alert-success role='alert'>The category has been successfully deleted</div>");
                            window.location = 'categories.html';
                        },
                        error: function(err){
                            console.log(err);
                                $("#mensajeRegistroCat2").html("<div class='alert alert-danger role='alert'>The category could not be deleted successfully, please try again</div>");
                        }
                    });
                };
                
rest.consultarCategoria = function(id){
                    var par = {
                        "id":id
                    };
                    console.log();
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        data: par,
                        url: "http://localhost:81/apiV1/src/public/categorias/"+id,
                        success: function(data){
                            console.log(data);
                            $("#listado1").html("");
                                $.each(data,function(i,categoria){
                                    $("<tr>").html("<th scope='row'>"+categoria.id+
                                            "</th><td>"+categoria.nombre+
                                            "</td><td>"+categoria.descripcion+
                                            "</td><td>").appendTo("#listado1");
                                });
                                    },
                        error: function(err){
                            console.log(err);
                                }
                    });
                };
    
rest.consultarCategorias = function(){
    
                    console.log();
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "http://localhost:81/apiV1/src/public/categorias",
                        success: function(data){
                            console.log(data);
                                $.each(data,function(i,categoria){
                                    $("<tr>").html("<th scope='row'>"+categoria.id+
                                            "</th><td>"+categoria.nombre+
                                            "</td><td>"+categoria.descripcion+
                                            "</td><td>").appendTo("#listado1");
                                });
                                    },
                        error: function(err){
                            console.log(err);
                                }
                    });
                };

            
            
            
