<div class="page-container">
    <?php $this->load->view("template/left_menu_view", null) ?>
    <div class="page-content">
    <?php $this->load->view("template/header_menu_view", null) ?>                       
       
        <div class="page-title">                    
            <h2><span class="fa fa-ticket"></span> Meus Tickets</h2>
        </div>

        <div class="page-content-wrap">
            <div class="row">      
                <div class="col-md-12">
                   
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table datatable table-striped table-condensed table-actions">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Categoria</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tickets as $ticket) { ?>
                                            <tr id="<?=$ticket->id?>">
                                                <td><?=$ticket->titulo?></td>
                                                <td><?=$ticket->categoria?></td>
                                                <td><?=$ticket->status > 0 ? $ticket->status == 1 ? "<p class='text-info'>Respondido</p>": "<p class='text-danger'>Fechado</p>" : "<p class='text-warning'>Aberto</p>"?></td>                                                  
                                                <td width="100px">
                                                <a href="<?=ci_site_url()?>tickets/ticket/<?=$ticket->id?>" class="btn btn-condensed btn-info" style="width:38px;"><span class="fa fa-eye"></span></a>
                                                <?=$ticket->status == 0 ? "<a href='".ci_site_url()."tickets/responder/$ticket->id' class='btn btn-condensed btn-warning' style='width:38px;'><span class='fa fa-edit'></span></a>" : ""?>
                                                </td>                                                    
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>