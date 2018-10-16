<div class="main-banner">
    <ul class="bxslider">
        <li>
            <img src="../../../../images/banner-1.png" alt="">
            <div class="caption">
                <h2><?=$Slide_01?></h2>
                <h3><?=$Slide_rodape?></h3>
                <div class="banner-meta">
                    <a href="#"><i class="fa fa-eye"></i>13 Visualizações</a>
                    <a href="#"><i class="fa fa-comments-o"></i>52 Comentarios</a>
                    <a href="#"><i class="fa fa-heart-o"></i>652 Curtidas</a>
                    
                    
                </div>
                <a href="#" class="donate">DOE AGORA</a>
            </div>
        </li>
        <li>
            <img src="../../../../images/banner-2.png" alt="">
            <div class="caption">
                <h2><?=$Slide_02?></h2>
                <h3><?=$Slide_rodape?></h3>
                <div class="banner-meta">
                    <a href="#"><i class="fa fa-eye"></i>13 visualizações</a>
                    <a href="#"><i class="fa fa-comments-o"></i>52 Comemtarios</a>
                    <a href="#"><i class="fa fa-heart-o"></i>652 Curtidas</a>
                
                </div>
                <a href="#" class="donate">DOE AGORA</a>
            </div>
        </li>
        <li>
            <img src="../../../../images/banner-3.png" alt="">
            <div class="caption">
                <h2><?=$Slide_03?></h2>
                <h3><?=$Slide_rodape?></h3>
                <div class="banner-meta">
                    <a href="#"><i class="fa fa-eye"></i>13 visualizações</a>
                    <a href="#"><i class="fa fa-comments-o"></i>52 Comentatios</a>
                    <a href="#"><i class="fa fa-heart-o"></i>652 Curtidas</a>
                
                </div>
                <a href="#" class="donate">DOE AGORA</a>
            </div>
        </li>
    </ul>
</div>
<!--CONTENT START-->
<div class="content">
    <!--SERVICES SECTION START-->
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="kf-services">
                        <i class="fa fa-heart-o"></i>
                        <div class="kf-text">
                            <h2><?=$Bloco_01_titulo?></h2>
                                <p><?=$Bloco_01_texto?></p>
                            <a href="<?=$Bloco_01_link?>" class="read-more">Mais informações</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="kf-services">
                        <i class="fa fa-stethoscope"></i>
                        <div class="kf-text">
                            <h2><?=$Bloco_02_titulo?></h2>
                            <p><?=$Bloco_02_texto?></p>
                            <a href="<?=$Bloco_02_link?>" class="read-more">Mais informações</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="kf-services">
                        <i class="fa fa-tint"></i>
                        <div class="kf-text">
                            <h2><?=$Bloco_03_titulo?></h2>
                            <p><?=$Bloco_03_texto?></p>
                            <a href="<?=$Bloco_03_link?>" class="read-more">Mais informações</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="kf-services">
                        <i class="fa fa-female"></i>
                        <div class="kf-text">
                            <h2><?=$Bloco_04_titulo?></h2>
                            <p><?=$Bloco_04_texto?></p>
                            <a href="<?=$Bloco_04_link?>" class="read-more">Mais informações</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SERVICES SECTION END-->
    <!--CAUSES SECTION START-->
    <section class="causes-section overlay">
        <div class="container">
            <!--HEADER SECTION START-->
            <div class="heading heading-4">
                <p style="color:#fff"><?=$Quadro_01_cabecalho?></p>
                <h2 style="color:#fff"><?=$Quadro_01_titulo?></h2>
            </div>
            <!--HEADER SECTION END-->
            <div class=" kode-cause">
                <div class="row">
                    <div class="col-md-6">
                        <img src="../../../../images/cause.jpg" alt="">
                    </div>
                    <div class="col-md-6">
                        <h2><?=$Quadro_01_subtitulo?></h2>
                        <p><?=$Quadro_01_texto?></p>
                        <a href="#" class="read-more">Mais informações</a>
                        <!--RANGE SLIDER START-->
                        <div class="kode-range">
                            Min: $ <span class="range-slider">500</span>
                            <input class="range" type="text" data-slider-min="0" data-slider-max="2000" data-slider-step="1" data-slider-value="500" &t=""><span id="ex6CurrentSliderValLabel"></span>
                        </div>
                        <!--RANGE SLIDER END-->
                        <!--DONATE TEXT START-->
                        <div class="donate-text">
                            <p><?=$Quadro_01_rodape?></p>
                            <a href="#" class="btn-filled">Doe Agora</a>
                        </div>               
                        <!--DONATE TEXT END-->             
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CAUSES SECTION END-->
    <!--EVENTS SECTION START-->
    <section class="white-bg">
        <div class="container">
            <!--HEADER SECTION START-->
            <div class="heading heading-4">
                <p style="color:#333"><?=$Quadro_02_cabecalho?></p>
                <h2 style="color:#333"><?=$Quadro_02_titulo?></h2>
            </div>
            <!--HEADER SECTION END-->
            <div class="row">
                <div class="col-md-4">
                    <div class="kode-event-list-2">
                        <div class="kode-thumb">
                            <a href="#"><img alt="" src="<?= $doacoes[0]->img_name ?>"></a>
                        </div>
                        <div class="kode-text">
                            <h2><?= $doacoes[0]->titulo ?></h2>
                            <p class="title">Terça-feira 7 De Março,2017</p>
                            <a class="btn-filled" href="#">Ler Mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode-event-list-2">
                        <div class="kode-thumb">
                            <a href="#"><img alt="" src="<?= $doacoes[1]->img_name ?>"></a>
                        </div>
                        <div class="kode-text">
                            <h2><?= $doacoes[1]->titulo ?></h2>
                            <p class="title">Terça-feira 7 De Março,2017</p>
                            <a class="btn-filled" href="#">Ler Mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kode-event-list-2">
                        <div class="kode-thumb">
                            <a href="#"><img alt="" src="<?= $doacoes[2]->img_name ?>"></a>
                        </div>
                        <div class="kode-text">
                            <h2><?= $doacoes[2]->titulo ?></h2>
                            <p class="title">Quarta-feira 28 De Abril,2017</p>
                            <a class="btn-filled" href="#">Ler Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </section>	
    <!--PROGRESS SECTION START-->
    <!-- <section class="progress-section parallax-bg-count">
        <div class="container">
            <p>Nosso compromisso é remover o câncer de mama</p>
            <h1>HISTÓRIAS DE SUCESSO DE REMOÇÃO DO CÂNCER</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="count-up">
                        <p>Câncer De Mama</p>
                        <span></span>
                        <span class="counter circle">1,425,054</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="count-up">
                        <p>Pessoas Ajudadas</p>
                        <span></span>
                        <span class="counter circle">3,124,982</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="count-up">
                        <p>Câncers Remolvidos</p>
                        <span></span>
                        <span class="counter circle">625</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="count-up">
                        <p>Paises Ajudando</p>
                        <span></span>
                        <span class="counter circle">27</span>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--PROGRESS SECTION END-->
    <!--CAUSES LIST SECTION START-->
    <section class="gray-bg">
        <div class="container">
            <!--HEADER SECTION START-->
            <div class="heading heading-4">
                <p style="color:#333"><?=$Quadro_03_cabecalho?></p>
                <h2 style="color:#333"><?=$Quadro_03_titulo?></h2>
                <!-- <h2 style="color:#333"><?= print_r($eventos) ?></h2> -->

            </div>
            <!--HEADER SECTION END-->
            <div class="kode-causes-list kode-causes-box"> <!--Causes List Start -->
                <ul class="row">
                    <li class="col-md-4">
                        <figure>
                            <a class="kode-causes-thumb" href="#"><img alt="" src="<?php print_r($campanhas[0]->img_name) ?>"></a>
                            <div class="kode-label thbg-color">
                                <small>$</small>
                                <span>Garantia</span>
                            </div>
                            <figcaption>
                                <div class="causes-skills">
                                    <div class="progress"> <div style="width: <?php print_r($campanhas[0]->progresso) ?>%;" data-transitiongoal="<?php print_r($campanhas[0]->progresso) ?>" role="progressbar" class="progress-bar" aria-valuenow="37"><span><?php print_r($campanhas[0]->progresso) ?>%</span></div> </div>
                                </div>
                                <div class="cause-inner-caption">
                                    <div class="kode-causes-info">
                                        <h2><a href="#"><?php print_r($campanhas[0]->titulo) ?></a></h2>
                                        <p><?php print_r($campanhas[0]->texto) ?></p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure>
                            <a class="kode-causes-thumb" href="#"><img alt="" src="<?php print_r($campanhas[1]->img_name) ?>"></a>
                            <div class="kode-label thbg-color">
                                <small>$</small>
                                <span>Garantia</span>
                            </div>
                            <figcaption>
                                <div class="causes-skills">
                                    <div class="progress"> <div style="width: <?php print_r($campanhas[1]->progresso) ?>%;" data-transitiongoal="<?php print_r($campanhas[1]->progresso) ?>" role="progressbar" class="progress-bar" aria-valuenow="37"><span><?php print_r($campanhas[1]->progresso) ?>%</span></div> </div>
                                </div>
                                <div class="cause-inner-caption">
                                    <div class="kode-causes-info">
                                        <h2><a href="#"><?php print_r($campanhas[1]->titulo) ?></a></h2>
                                        <p><?php print_r($campanhas[1]->texto) ?> </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li class="col-md-4">
                        <figure>
                            <a class="kode-causes-thumb" href="#"><img alt="" src="<?php print_r($campanhas[2]->img_name) ?>"></a>
                            <div class="kode-label thbg-color">
                                <small>$</small>
                                <span>Garantia</span>
                            </div>
                            <figcaption>
                                <div class="causes-skills">
                                    <div class="progress"> <div style="width: <?php print_r($campanhas[2]->progresso) ?>%;" data-transitiongoal="<?php print_r($campanhas[2]->progresso) ?>" role="progressbar" class="progress-bar" aria-valuenow="37"><span><?php print_r($campanhas[2]->progresso) ?>%</span></div> </div>
                                </div>
                                <div class="cause-inner-caption">
                                    <div class="kode-causes-info">
                                        <h2><a href="#"><?php print_r($campanhas[2]->titulo) ?></a></h2>
                                        <p><?php print_r($campanhas[2]->texto) ?></p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </div> <!--Causes List End -->
        </div>
    </section>
    <!--CAUSES LIST SECTION END-->
    
    <!--EVENTS SECTION START-->
    <section class="white-bg">
        <div class="container">
            <!--HEADER SECTION START-->
            <div class="heading heading-4">
                <p style="color:#333"><?=$Quadro_04_cabecalho?></p>
                <h2 style="color:#333"><?=$Quadro_04_titulo?></h2>
            </div>
            <!--HEADER SECTION END-->
            <div class="row">
                <div class="col-md-4">
                    <!--EVENT LIST START-->
                    <div class="kode-event-list">
                        <img src="<?= $eventos[0]->img_name ?>" alt="">
                        <div class="kode-caption">
                            <h2><?= $eventos[0]->titulo ?></h2>
                            <p><?= $eventos[0]->data ?></p>
                            <a href="#" class="btn-borderd">Ler Mais</a>
                        </div>
                    </div>
                    <!--EVENT LIST END-->
                </div>
                <div class="col-md-4">
                    <!--EVENT LIST START-->
                    <div class="kode-event-list">
                        <img src="<?= $eventos[1]->img_name ?>" alt="">
                        <div class="kode-caption">
                            <h2><?= $eventos[1]->titulo ?></h2>
                            <p><?= $eventos[1]->data ?></p>
                            <a href="#" class="btn-borderd">Ler Mais</a>
                        </div>
                    </div>
                    <!--EVENT LIST END-->
                </div>
                <div class="col-md-4">
                    <!--EVENT LIST START-->
                    <div class="kode-event-list">
                        <img src="<?= $eventos[2]->img_name ?>" alt="">
                        <div class="kode-caption">
                            <h2><?= $eventos[2]->titulo ?></h2>
                            <p><?= $eventos[2]->data ?></p>
                            <a href="#" class="btn-borderd">Ler Mais</a>
                        </div>
                    </div>
                    <!--EVENT LIST END-->
                </div>
                <div class="col-md-4">
                    <!--EVENT LIST START-->
                    <div class="kode-event-list">
                        <img src="<?= $eventos[3]->img_name ?>" alt="">
                        <div class="kode-caption">
                            <h2><?= $eventos[3]->titulo ?></h2>
                            <p><?= $eventos[3]->data ?></p>
                            <a href="#" class="btn-borderd">Ler Mais</a>
                        </div>
                    </div>
                    <!--EVENT LIST END-->
                </div>
                <div class="col-md-4">
                    <!--EVENT LIST START-->
                    <div class="kode-event-list">
                        <img src="<?= $eventos[4]->img_name ?>" alt="">
                        <div class="kode-caption">
                            <h2><?= $eventos[4]->titulo ?></h2>
                            <p><?= $eventos[4]->data ?></p>
                            <a href="#" class="btn-borderd">Ler Mais</a>
                        </div>
                    </div>
                    <!--EVENT LIST END-->
                </div>
            </div>
        </div>
    </section>
    <!--EVENTS SECTION END-->
    <!--TEAM SECTION START-->
    <section class="kode-team-section overlay movingbg" class="normaltopmargin normalbottommargin light movingbg" data-id="customizer" data-title="Theme Customizer" data-direction='horizontal'>
        <div class="container">
            <!--HEADER SECTION START-->
            <div class="heading heading-4">
                <p style="color:#fff"><?=$Quadro_05_cabecalho?></p>
                <h2 style="color:#fff"><?=$Quadro_05_titulo?></h2>
            </div>
            <!--HEADER SECTION END-->
            <div class="row">
                <div class="col-md-3">
                    <!--TEAM MEMBER START-->
                    <div class="kode-team-member">
                        <a href="#"><img src="https://amorproprio.com.br/uploads/images/users/<?= $users[0]->imagem ?>" alt=""></a>
                        <div class="kode-text">
                            <div class="kode-social-icons">
                                <!-- <ul>
                                    <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul> -->
                            </div>
                            <h3><?= $users[0]->name ?></h3>
                            
                        </div>
                    </div>
                    <!--TEAM MEMBER END-->
                </div>
                <div class="col-md-3">
                    <!--TEAM MEMBER START-->
                    <div class="kode-team-member">
                        <a href="#"><img src="https://amorproprio.com.br/uploads/images/users/<?= $users[1]->imagem ?>" alt=""></a>
                        <div class="kode-text">
                            <div class="kode-social-icons">
                                <!-- <ul>
                                    <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul> -->
                            </div>
                            <h3><?= $users[1]->name ?></h3>
                            
                        </div>
                    </div>
                    <!--TEAM MEMBER END-->
                </div>
                <div class="col-md-3">
                    <!--TEAM MEMBER START-->
                    <div class="kode-team-member">
                        <a href="#"><img src="https://amorproprio.com.br/uploads/images/users/<?= $users[2]->imagem ?>" alt=""></a>
                        <div class="kode-text">
                            <div class="kode-social-icons">
                                <!-- <ul>
                                    <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul> -->
                            </div>
                            <h3><?= $users[2]->name ?></h3>
                            
                        </div>
                    </div>
                    <!--TEAM MEMBER END-->
                </div>
                <div class="col-md-3">
                    <!--TEAM MEMBER START-->
                    <div class="kode-team-member">
                        <a href="#"><img src="https://amorproprio.com.br/uploads/images/users/<?= $users[3]->imagem ?>" alt=""></a>
                        <div class="kode-text">
                            <div class="kode-social-icons">
                                <!-- <ul>
                                    <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul> -->
                            </div>
                            <h3><?= $users[3]->name ?></h3>
                            
                        </div>
                    </div>
                    <!--TEAM MEMBER END-->
                </div>
            </div>
        </div>
    </section>
    <!--TEAM SECTION END-->
    
    
</div>
<!--CONTENT END-->