<div class="page-container">
        <?php $this->load->view("template/left_menu_view", null) ?>
        <div class="page-content">
            <?php $this->load->view("template/header_menu_view", null) ?>                       
 
            <div class="page-title">          
                <a href="<?=ci_site_url()?>site/vizualizar/eventos">
                    <h2><span class="fa fa-star"></span>Criar Evento</h2>
                </a>          
            </div>

            <div class="page-content-wrap">
                <div class="row">      
                    <div class="col-md-12">
                        <form id="addPost" action="<?=ci_site_url("site/NovoEvento")?>"  enctype="multipart/form-data" method="post" class="form-horizontal" role="form">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Evento</strong></h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                    
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Titulo do Post<span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="titulo" id="titulo" class="form-control">
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Texto</label>
                                        <div class="col-md-9">
                                            <input type="text" name="texto" id="texto" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Link</label>
                                        <div class="col-md-9">
                                            <input type="text" name="link" id="link" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Data</label>
                                        <div class="col-md-9">
                                            <input type="date" name="data" id="data" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">       
                                        <label class="col-md-3 control-label">Foto</label>                                
                                        <div class="col-md-9">
                                            <!--<a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#change_photo">Procurar...</a>
                                            <input type="file" id="image" alt="Photo">-->
                                            <a class="file-input-wrapper btn btn-default  fileinput btn-primary">

                                            <input type="file" class="fileinput btn-primary" name="file_image" id="file_image" data-filename-placement="inside" title="Escolha a Imagem."></a>
                                            <!--<input type="file" class="fileinput btn-info" name="file" id="cp_photo" data-filename-placement="inside" title="Escolher"/>-->

                                        </div>
                                    </div>
                                            
                                </div>

                                <div class="panel-footer">
                                    <button class="btn btn-default">Limpar</button>                                    
                                    <button id="criar" class="btn btn-primary pull-right">Criar</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>            
    </div>
    <!-- MODALS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
   <div class="modal animated fadeIn" id="change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                        <h4 class="modal-title" id="smallModalHead">Trocar Foto</h4>
                    </div>                    
                    <form id="cp_crop" method="post" action="<?=ci_site_url("posts/cropPhoto")?>">
                    <div class="modal-body">
                        <div class="text-center" id="cp_target">Use form below to upload file. Only .jpg files.</div>
                        <input type="hidden" name="cp_img_path" id="cp_img_path"/>
                        <input type="hidden" name="ic_x" id="ic_x"/>
                        <input type="hidden" name="ic_y" id="ic_y"/>
                        <input type="hidden" name="ic_w" id="ic_w"/>
                        <input type="hidden" name="ic_h" id="ic_h"/>                        
                    </div>                    
                    </form>
                    <form id="cp_upload" method="post" enctype="multipart/form-data" action="<?=ci_site_url("posts/changePhoto")?>">
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nova Foto</label>
                            <div class="col-md-4">
                                <input type="file" class="fileinput btn-info" name="file" id="cp_photo" data-filename-placement="inside" title="Escolher"/>
                            </div>                            
                        </div>                        
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success disabled" id="cp_accept">Salvar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL CHANGE PHOTO -->
        <!-- FOOTER -->
