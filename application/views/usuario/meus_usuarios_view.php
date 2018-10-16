        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- LEFT MENU -->
            <?php $this->load->view("template/left_menu_view", null) ?>
            


            <!-- PAGE CONTENT -->
            <div class="page-content">
                
            <?php $this->load->view("template/header_menu_view", null) ?>                       

                <!-- PAGE TITLE -->                    
                <div class="page-title">                    
                    <h2><span class="fa fa-users"></span>Usuários</h2>
                </div>
                <!-- END PAGE TITLE -->
                <?php 
                $msg = $this->session->flashdata('msg');
                if ($msg){
                ?>
                    
                <div class="row">      
                    <div class="col-md-12">
                        <div class="<?php if($msg['tipo']==1){ echo "alert alert-success";}elseif($msg['tipo']==2){echo "alert alert-danger";}?>" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <?=$msg['texto']?>.
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable table-striped table-condensed table-actions">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>E-mail</th>
                                                    <th>Telefone</th>
                                                    <th width="200">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($users as $user){
                                            ?>
                                                    <tr id="<?=$user->id?>">
                                                        <td><?=$user->name?></td>
                                                        <td><?=$user->email?></td>
                                                        <td><?=$user->phone?></td>
                                                        <td>
                                                            <a href="<?=ci_site_url("usuario/editar/".$user->id) ?>"><button class="btn btn-success btn-condensed"><i class="fa fa-pencil"></i></button></a>
                                                            <button class="btn btn-danger  btn-condensed" onclick="notyConfirm<?=$user->id?>();"><i class="fa fa-times"></i></button>
                                                            <a href="<?=ci_site_url("posts/meusPosts/".$user->id) ?>"><button class="btn btn-warning btn-condensed"><i class="fa fa-users"></i></button></a>
            <script type="text/javascript">                                            
                function notyConfirm<?=$user->id?>(){
                    noty({
                        text: 'Realmente deseja excluir este registro?',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $.ajax({
                                        url: '<?=ci_site_url("usuario/usuarios") ?>',
                                        type: 'post',
                                        data: {usuario_to_remove: <?=$user->id?>},
                                        success: function() {
                                            $('#<?=$user->id?>').addClass('hide');
                                        }
                                    });
                                    $noty.close();
                                    noty({text: 'Registro Apagado!', layout: 'topRight', type: 'success'});
                                }
                                },
                                {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                                    $noty.close();
                                    }
                                }
                            ]
                    })                                                    
                }                                            
                function notyConfirmAdm<?=$user->id?>(){
                    noty({
                        text: 'Realmente deseja mudar este usuário?',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $.ajax({
                                        url: '<?=ci_site_url("usuario/usuarios") ?>',
                                        type: 'post',
                                        data: {usuario_to_admin: <?=$user->id?>},
                                        success: function() {
                                            $('#adm<?=$user->id?>').toggleClass('fa-check-square fa-square-o');
                                        }
                                    });
                                    $noty.close();
                                    noty({text: 'Usuário aalterado!', layout: 'topRight', type: 'success'});
                                }
                                },
                                {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                                    $noty.close();
                                    }
                                }
                            ]
                    })                                                    
                }                                            
            </script>
                                                        </td>                                                    
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
                    </div>
                     

                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- FOOTER -->



