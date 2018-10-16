<div class="page-container">
        <?php $this->load->view("template/left_menu_view", null) ?>
        <div class="page-content">

            <div class="page-title">                    
                <h2><span class="fa fa-star"></span> Todos os Posts</h2>
            </div>

            <div class="page-content-wrap">
                <div class="row">
                    <?php foreach($posts as $post) { ?>
                        <div class="col-md-4">
                            <div class="panel panel-default" style="height:  500px;">
                                <div class="panel-body">
                                    <!-- <?= print_r($post) ?> -->
                                    <?php if($post->img_name != "foto") {?>
                                        <div class="image" style="overflow: hidden;width: 100%;height: 100%;">
                                            <img src="<?=$post->img_name?>" class="img-thumbnail" style="width: 100%;height: auto;max-height: 350px;">
                                        </div>
                                    <?php } ?>

                                    <div class="panel-body">
                                        <div class="contact-info">
                                            <p class="text-center"><big>Criado em <?php $date = new DateTime($post->created); echo $date->format("d/m/Y");?></big></p>
                                           
                                            <p class="text-center"><big> <?=$post->titulo?> </big></p>                                   
                                           
                                        </div>
                                    </div>

                             

                                        <div class="col-md-4 text-center">
                                            <button type="button" class="btn btn-ex"><a href="<?=ci_site_url()?>site/Excluir/<?= $post->id ?>/<?= $tipo ?>" style="color: #fff;" ><i class="fa fa-trash-o"></i>Excluir</a></button>
                                        </div>
                                        
                                        
                                    </div>

                                </div>                          
                            </div>
                    <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>