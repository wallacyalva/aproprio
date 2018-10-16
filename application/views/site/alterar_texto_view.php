<!-- START PAGE CONTAINER -->
<div class="page-container">
    <!-- LEFT MENU -->
    <?php $this->load->view("template/left_menu_view", null) ?>
    <!-- PAGE CONTENT -->
    <div class="page-content">                     
        <!-- PAGE TITLE -->                    
        <div class="page-title">                    
            <h2><span class="fa fa-edit"></span> Editar Texto</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">      
                <div class="col-md-12">
                    <form id="addFormPromocao" action="<?=ci_site_url()?>site/alterarTexto" method="post" class="form-horizontal" role="form">       
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?=$text->nome?></strong></h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>    
                            <div class="panel-body">                                        
                                <div class="form-group">
                                    <div class="col-md-12">
                                    <textarea cols="12" name="novo_texto" rows="4" class="form-control"><?=$text->texto?></textarea>
                                    <input type="hidden" name="id_texto" value="<?=$text->id?>">
                                    </div>                                                    
                                </div>                                             
                            </div>
                            <div class="panel-footer">                            
                                <button type="submit" id="criar" class="btn btn-primary pull-right">Alterar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
        <!-- END PAGE CONTENT WRAPPER -->    
    </div>            
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- FOOTER -->