    <div class="page-container">
        <?php $this->load->view("template/left_menu_view", null) ?>
        <div class="page-content">
            <?php $this->load->view("template/header_menu_view", null) ?>                       
 
            <div class="page-title">                    
                <h2><span class="fa fa-star"></span> Novo Post</h2>
            </div>

            <div class="page-content-wrap">
                <div class="row">      
                    <div class="col-md-12">
                        <form id="addPost" action="<?=ci_site_url("posts/solicitarPost")?>"  enctype="multipart/form-data" method="post" class="form-horizontal" role="form">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Promoção</strong></h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                    
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Titulo do Post<span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="titulo" id="titulo" class="form-control" value="">
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Categoria</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="categoria" id="categoria">
                                                <option value="item_1">Categoria 1</option>
                                                <option value="item_2">Categoria 2</option>
                                                <option value="item_3">Categoria 3</option>
                                                <option value="item_4">Categoria 4</option>
                                                <option value="item_5">Categoria 5</option>
                                            </select>
                                        </div>
                                    </div>   

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">&nbsp;</label>
                                        <div class="col-md-9">
                                            <input type="file" class="fileinput btn-primary" name="file_foto" id="file_foto" data-filename-placement="inside" title="Escolha a Imagem do Post.">
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