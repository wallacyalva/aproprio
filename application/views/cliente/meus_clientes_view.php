        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- LEFT MENU -->
            <?php $this->load->view("template/left_menu_view", null) ?>
            


            <!-- PAGE CONTENT -->
            <div class="page-content">
                
            <?php $this->load->view("template/header_menu_view", null) ?>                       

                <!-- PAGE TITLE -->                    
                <div class="page-title">                    
                    <h2><span class="fa fa-users"></span> Dados Pacientes</h2>
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
                                                    <th>Responsavel</th>
                                                    <th>Telefone</th>
                                                    <th width="100">Plano</th>
                                                    <th width="220">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($clientes as $cliente){
                                            ?>
                                                    <tr id="<?=$cliente->id?>">
                                                        <td><img src="<?=$cliente->foto?>" style="width: 40px;border-radius: 50%;height: 40px;position: relative;top: -5px;" alt="">  <h6 style="width: 105px;display: -webkit-inline-box;"><?=$cliente->name_paciente?></h6></td>
                                                        <td><?=$cliente->name_responsavel?></td>
                                                        <td><?=$cliente->Telefone_fixo?> / <?=$cliente->Celular?></td>
                                                        <td><?=$cliente->Convenio?></td>                                                    
                                                        <td>
                                                            <a href="<?=ci_site_url("cliente/edit_cliente/".$cliente->id) ?>"><button class="btn btn-success btn-condensed"><i class="fa fa-pencil"></i></button></a>
                                                            <a href="<?=ci_site_url("cliente/gerarficha/".$cliente->id) ?>"><button class="btn btn-warning btn-condensed"><i class="fa fa-file-pdf-o"></i></button></a>
                                                            <button class="btn btn-primary btn-condensed"><i class="fa fa-arrow-up"></i></button>
                                                            <button class="btn btn-info btn-condensed" onclick="notyConfirmBlock<?=$cliente->id?>();"><i id="block<?=$cliente->id?>" class="fa <?php if($cliente->ativo==1){ echo "fa-check-square";} else { echo "fa-square-o";}?>"></i></button>
                                                            <button class="btn btn-danger  btn-condensed" onclick="notyConfirm<?=$cliente->id?>();"><i class="fa fa-times"></i></button>
            <script type="text/javascript">                                            
                function notyConfirm<?=$cliente->id?>(){
                    noty({
                        text: 'Realmente deseja excluir este registro?',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $.ajax({
                                        url: '<?=ci_site_url("cliente/my_cliente") ?>',
                                        type: 'post',
                                        data: {cliente_to_remove: <?=$cliente->id?>},
                                        success: function() {
                                            $('#<?=$cliente->id?>').addClass('hide');
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
                function notyConfirmBlock<?=$cliente->id?>(){
                    noty({
                        text: 'Realmente deseja desativar este cliente?',
                        layout: 'topRight',
                        buttons: [
                                {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                                    $.ajax({
                                        url: '<?=ci_site_url("cliente/my_cliente") ?>',
                                        type: 'post',
                                        data: {cliente_to_block: <?=$cliente->id?>},
                                        success: function() {
                                            $('#block<?=$cliente->id?>').toggleClass('fa-check-square fa-square-o');
                                        }
                                    });
                                    $noty.close();
                                    noty({text: 'Cliente Desativado!', layout: 'topRight', type: 'success'});
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



