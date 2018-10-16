<div class="page-container">
    <?php $this->load->view("template/left_menu_view", null) ?>
    <div class="page-content">

            <div class="page-title">                    
                <h2><span class="fa fa-check"></span> Pedidos de Aprovações</h2>
            </div>

            <div class="page-content-wrap">
                <div class="row">
                    <?php foreach($posts as $post) { ?>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <div class="contact-info">
                                        <p class="text-center"><big><?=$post->titulo?></big></p>
                                    </div>

                                    <div class="image" style="overflow: hidden;width: 100%;height: 250px;">
                                        <img src="<?=ci_site_url()?>uploads/images/posts/<?=$post->foto?>" class="img-thumbnail" style="width: 100%;height: auto;">
                                    </div>

                                    <div class="panel-body">
                                        <div class="contact-info">
                                            <p class="text-center"><big>Criado em <?php $date = new DateTime($post->created); echo $date->format("d/m/Y");?></big></p>
                                            <p class="text-center"><big>Categoria: <?=$post->categoria?></big></p>                                   
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="col-md-6 text-center">
                                            <a class="btn btn-danger" href="<?=ci_site_url()?>posts/negar/<?=$post->id?>"><i class="fa fa-times"></i> Negar</a>
                                        </div>

                                        <div class="col-md-6 text-center">
                                            <a class="btn btn-success" href="<?=ci_site_url()?>posts/aprovar/<?=$post->id?>"><i class="fa fa-check"></i> Aprovar</a>
                                        </div>

                                    </div>

                                </div>                          
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>