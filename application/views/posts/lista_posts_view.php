    <div class="page-container">
        <?php $this->load->view("template/left_menu_view", null) ?>
        <div class="page-content">
            <?php $this->load->view("template/header_menu_view", null) ?>                       

            <div class="page-title">                    
                <h2><span class="fa fa-star"></span> Todos os Posts</h2>
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

                                    <div class="image" style="width: 100%;">
                                        <img src="./uploads/images/posts/<?=$post->foto?>" class="img-thumbnail" style="width: 100%;height: auto;">
                                    </div>

                                    <div class="panel-body">
                                        <div class="contact-info">
                                            <p class="text-center"><big>Criado em <?php $date = new DateTime($post->created); echo $date->format("d/m/Y");?></big></p>
                                            <p class="text-center"><big>Categoria: <?=$post->categoria?></big></p>                                   
                                        </div>
                                    </div>

                                    <?php if($user->id == 2) { ?>
                                        <div class="col-md-12">

                                            <div class="col-xs-6 text-center">
                                                <button type="button" class="btn btn-spacce btn-primary"><i class="fa fa-edit"></i> Editar</button>
                                            </div>

                                            <div class="col-xs-6 text-center">
                                                <button type="button" class="btn btn-<?=$post->ativo ? "danger" : "success"?>"><i class="fa fa-play"></i> <?=$post->ativo ? "Pausar" : "Retomar"?></button>
                                            </div>

                                        </div>
                                    <?php } else { ?>
                                        <div class="row">

                                            <div class="col-xs-6 text-center">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-link"></i> Pegar Link</button>
                                            </div>

                                            <div class="col-xs-6 text-center">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i> Visualizar</button>
                                            </div>

                                            <!--<div class="col-xs-3 text-center">
                                                <button type="button" class="btn btn-primary btn-condensed"><i class="fa fa-share"></i></button>
                                            </div>-->

                                            <!--<div class="col-xs-4 text-center">
                                                <button type="button" class="btn btn-danger btn-condensed"><i class="fa fa-times"></i></button>
                                            </div>-->

                                        </div>
                                    <?php } ?>

                                </div>                          
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>