<div class="page-container">
    <?php $this->load->view("template/left_menu_view", null) ?>
    <div class="page-content">
    <?php $this->load->view("template/header_menu_view", null) ?>                       
     
        <div class="page-title">                    
            <h2><span class="fa fa-ticket"></span> Abrir Ticket</h2>
        </div>

        <div class="page-content-wrap">
            <div class="row">      
                <div class="col-md-12">
                    <form id="abrirTicket" action="<?=ci_site_url()?>tickets/abrirTicket" method="post" class="form-horizontal" role="form">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Ticket</strong></h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                                    
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Titulo<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" name="titulo" id="titulo" class="form-control">
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Categoria do Problema<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="categoria" id="categoria">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Descrição do Problema<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="descricao" id="descricao" rows="5"></textarea>
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