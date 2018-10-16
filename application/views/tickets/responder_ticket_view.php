<div class="page-container">
    <?php $this->load->view("template/left_menu_view", null) ?>
    <div class="page-content">
        <?php $this->load->view("template/header_menu_view", null) ?>                       

        <div class="page-title">                    
            <h2><span class="fa fa-ticket"></span> Visualizar Ticket</h2>
        </div>
        <div class="page-content-wrap">
            <div class="row">      
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Ticket Nº: <?=$id?></strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <?php foreach($tickets as $ticket) { ?>

                            <div class="row">
                                <?=$ticket->resposta != null ? "<div class='pull-right col-md-5' style='background-color: #95B75D; border-radius: 3px; color: white;'>$ticket->resposta</div>" : "<div class='pull-right col-md-5' style='background-color: #FEA223; border-radius: 3px; color: white;'>Espere até um administrador responder o seu ticket!</div>"?>
                            </div>

                            <div class="row">
                                <div class="pull-left col-md-5" style="background-color: #E5E5E5; border-radius: 3px;"><?=$ticket->descricao?></div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Resposta:</strong></h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            </ul>
                        </div>
                        <form action="<?=ci_site_url()?>tickets/responder" method="post">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea style="width: 100%" type="text" name="resposta" id="resposta" rows="10"></textarea>
                                            <input type="hidden" name="id" value="<?=$id?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-primary pull-right" type="submmit">Enviar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>            
</div>