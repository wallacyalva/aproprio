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
                                                <td><?=$ticket->status == 1 ? "<p class='text-warning'>Aberto</p>" : "<p class='text-danger'>Fechado</p>"?></td>                                                  
                                                <td width="200">
                                                <a href="<?=ci_site_url()?>tickets/ticket/<?=$ticket->id?>" class="btn btn-info">Visualizar</a>
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