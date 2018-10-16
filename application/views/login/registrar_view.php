
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Amor Proprio - Registrar Usuário</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="SHORTCUT ICON" href="http://amorproprio.com.br/painel/assets/images/logo2.png" type="image/x-icon"/>
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->      
        <link rel="stylesheet" href="<?=css_url()?>font-awesome.min.css">  
        <link rel="stylesheet" type="text/css" id="theme" href="<?=css_url()?>login-theme.css"/>
        <!-- EOF CSS INCLUDE -->                                  
    </head>
    <body>
        <div class="registration-container">  
            <div class="registration-box animated fadeInDown">
                <div class="registration-logo"></div>

                <div class="tab-content">

                    <!-- CADASTRO USUARIO-->
                    <div id="home" class="tab-pane fade in active">
                        <div class="registration-body">

                            <div class="registration-title">
                                <strong>Cadastro do Usuário</strong>
                            </div>

                            <div class="registration-subtitle"></div>

                            <form id="cadFormUsuario" action="<?=ci_site_url("login/registrar")?>" class="form-horizontal" method="post">
            
                                <h4>Informações Pessoais</h4>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="name" placeholder="Primeiro Nome"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="email" placeholder="E-mail"/>
                                    </div>
                                </div>
                                
                                <h4>Senha</h4>                    
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repita a Senha"/>
                                    </div>
                                </div>             
                                
                                <h4>Endereço</h4>                    
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Cep"/>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="street" name="street" placeholder="Rua"/>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="district" name="district" placeholder="Bairro"/>
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade"/>
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="state" name="state" placeholder="Estado"/>
                                    </div>
                                </div>   

                                <div class="form-group push-up-30">
                                    <div class="col-md-6">
                                        <a href="<?=ci_site_url()?>login" class="btn btn-link btn-block">Já tem uma conta?</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-block">Cadastrar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    
                </div>

                <!-- FOOTER -->
                <div class="registration-footer">
                    <div class="pull-left">
                        &copy; 2018 Amor Proprio
                    </div>

                    <div class="pull-right">
                        <a href="#">Sobre</a> |
                        <a href="#">Privacidade</a> |
                        <a href="#">Contate-nos</a>
                    </div>
                </div>
            </div> 
        </div>

        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?=js_url(); ?>plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?=js_url(); ?>plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?=js_url(); ?>plugins/bootstrap/bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?=js_url(); ?>plugins/bootstrap/bootstrap.min.js"></script>
        <script type='text/javascript' src='<?=js_url(); ?>plugins/jquery-validation/dist/jquery.validate.js'></script>
        <script type='text/javascript' src='<?=js_url(); ?>plugins/jquery-validation/dist/localization/messages_pt_BR.min.js'></script>
        <script type='text/javascript' src='<?=js_url(); ?>plugins/jquery-validation/dist/additional-methods.min.js'></script>
         <!-- END PLUGINS -->

        <!-- VALIDATION JS -->
        <script type='text/javascript' src='<?=js_url(); ?>usuario.js'></script>
        <!-- Adicionando Javascript -->

    </body>
</html>






