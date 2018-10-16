<!-- START PAGE CONTAINER -->
<div class="page-container">
    <!-- LEFT MENU -->
    <?php $this->load->view("template/left_menu_view", null) ?>
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <!-- PAGE TITLE -->                    
        <div class="page-title">                    
            <h2><span class="fa fa-user"></span> Textos</h2>
        </div>
        <!-- END PAGE TITLE -->
        <?php 
        $msg = $this->session->flashdata('msg');
        if ($msg){
        ?>  
            <div class="col-md-12">
                <div class="<?php if($msg['tipo']==1){ echo "alert alert-success";}elseif($msg['tipo']==2){echo "alert alert-danger";}?>" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?=$msg['texto']?>
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
                                            <th widht="100">Nome</th>
                                            <th>Link</th>
                                            <th>Pagina</th>
                                            <th width="50" style="align:center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($links as $link){
                                    ?>
                                            <tr id="<?=$link->id?>">
                                                <td><p><?=$link->nome?></p></td>
                                                <td><p><?=$link->link?></p></td>
                                                <td><p><?=$link->pagina?></p></td>
                                                <td>
                                                    <a class="btn btn-warning  btn-condensed" href="<?=ci_site_url()?>site/alterarLink/<?=$link->id?>"><i class="fa fa-edit"></i></a>
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
        </div>
        <!-- END PAGE CONTENT WRAPPER -->                                
    </div>            
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- FOOTER -->



