<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Amor Proprio</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="<?=js_url()?>jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?=js_url()?>bootstrap.min.js"></script> 
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="SHORTCUT ICON" href="http://amorproprio.com.br/painel/assets/images/logo2.png" type="image/x-icon"/>
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="<?=css_url()?>font-awesome.min.css">
        <link rel="stylesheet" type="text/css" id="theme" href="<?=css_url()?>login-theme.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
 
        <div class="login-container">
            
            <div class="login-box animated fadeInDown text-center">
                <img style="width: 100px; padding-bottom: 50px; margin-top: -40px;" src="assets/images/logo2.png" alt="">
                <h6 class="title-login">Amor Proprio</h6>
                <div class="login-logo" hidden></div> <!-- ALTERAR -->
                <div class="login-body">
                    <div class="login-title text-center"><strong>Bem-Vindo(a)</strong><p class="text-center">Por favor faça seu login</p></div>
                    <form  method="post" id="formlogin" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" name="email" id="email" class="form-control" placeholder="email"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>                                
                                <input type="password" name="password" id="password" class="form-control" placeholder="senha"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="error" style="color: #B64645" id="logerror"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group login-footer">
                        <div class="col-md-6">
                            <a data-toggle="modal" data-target="#recuperarSenha" style="color: #fff;">Recuperar senha?</a>
                        </div>          
                        <!-- <div class="col-md-6 text-right">
                            <a href="<?=ci_site_url("login/registrar")?>" style="color: #fff;">Criar Conta</a>
                        </div>               -->
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block btn-acessar hide" id="load" disabled="disabled"><i class='fa fa-spinner fa-spin '></i> Acessando...</button>
                            <button class="btn btn-primary btn-lg btn-block btn-acessar" id="acessar">Acessar</button>
                            <input type="submit" style="position: absolute; left: -9999px">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 Amor Proprio
                    </div>
                    <div class="pull-right">
                        <a href="">Sobre</a> |
                        <a href="">Privacidade</a> |
                        <a href="">Contato</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="recuperarSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" style="display: inline-block">Recuperação de senhas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recuperar_senha">Digite seu email para a recuperação:</label>
                                <input class="form-control" type="email" name="recuperar_senha">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p class="pull-left recuperar_error"></p>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="recuperarButton">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $("#recuperarButton").on("click", function(event){
                var email = $("input[name='recuperar_senha']");
                $.ajax({
                    url: '<?=ci_site_url()?>login/recuperarSenha',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        email: email.val()
                    },
                    beforeSend: function() {
                        $('.recuperar_error').css("color","gray");
                        $('.recuperar_error').text('Enviando...');
                    },
                    success: function(response){
                        var content = JSON.parse(response);
                        if(content == true) {
                            $('.recuperar_error').css("color","green");
                            $('.recuperar_error').text('Enviamos um email para você, cheque sua caixa postal!');
                        } else {
                            $('.recuperar_error').css("color","red");
                            $('.recuperar_error').text("Houve um erro ao enviar seu email, por favor tente novamente!");
                        }
                    },
                    error: function(event){
                        $('.recuperar_error').css("color","red");
                        $('.recuperar_error').text('Ocorreu um erro, Por Favor tente novamente.');
                    }
                });
            });
            $(document).on('submit', '#formlogin', function(event) {
                event.preventDefault();
                /* Act on the event */
                var userName = $('input[id=email]');
                var password = $('input[id=password]');
                var status = true;

                $.ajax({
                    url: '<?=ci_site_url('login/check_user')?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        username_email: userName.val(),
                        password: password.val()
                    },
                    beforeSend: function() {
                        $('#acessar').addClass('hide');
                        $('#load').removeClass('hide');
                    },
                    success: function(event){
                        if(event.status == status){
                            $('#acessar').addClass('hide');
                            $('#load').removeClass('hide');
                            window.location.href = '<?=ci_site_url('usuario')?>';
                        }else{
                            $('#load').addClass('hide');
                            $('#acessar').removeClass('hide');
                            $('.error').text('Email ou Senha Invalidos!');
                        }
                    },
                    error: function(event){
                        $('.error').text('Ocorreu um erro, Por Favor tente novamente.');
                    }
                });
            });
        </script>       
    </body>
</html>