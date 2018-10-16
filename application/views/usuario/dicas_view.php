<!-- START PAGE CONTAINER -->
<div class="page-container">
    <!-- LEFT MENU -->
    <?php $this->load->view("template/left_menu_view", null)?>

    <!-- PAGE CONTENT -->
    <div class="page-content">
                
        <?php $this->load->view("template/header_menu_view", null) ?>                       

        <!-- PAGE TITLE -->                    
        <div class="page-title">                    
            <h2><span class="fa fa-lightbulb-o"></span> Dicas</h2>
        </div>
        <!-- END PAGE TITLE -->

        <?php 
        $msg = $this->session->flashdata('msg');
        if ($msg){
        ?>

            <div class="col-md-12">
                <div class="<?php if($msg['tipo']==1){ echo "alert alert-success";}elseif($msg['tipo']==2){echo "alert alert-danger";}?>" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?=$msg['texto']?>.
                </div>
            </div>
                
        <?php } ?>

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Tente criar posts que causam emoção nas pessoas, esse tipo de conteúdo que viraliza.</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Se quiser colocar só o nome de uma categoria que existe no site no título do post, exemplo: Bom dia! Edite o slug com uma parte ou frase da imagem/mensagem.</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Não é permitido colocar coisas do tipo: Clique na imagem para ver a mensagem, no texto quando colocar o link da mensagem na página, o Facebook não permite isso, recomendamos deixar só o link encurtado, não precisa apagar.</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Todo dia escolha um horário entre às 21:00 e 23:00 para programar os posts para o dia seguinte, programe das 00:00 às 22:00 do dia seguinte, de 2 em 2 horas, de 1 em 1 hora, de 30 em 30 minutos, ou conforme for melhor pra você.</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Pode só postar links da plataforma na página sem nenhum outro tipo de conteúdo seguindo o tempo de publicação dos links de 30 em 30 minutos que não tem problema, já conversamos com o Facebook sobre isso, se quiser postar mais links em menos tempo, precisará postar algum outro tipo de conteúdo, exemplo: imagens.</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Você tem muitas páginas? Mescle todas em uma para facilitar a divulgação, não quer mesclar todas em uma? Então, utilize a ferramenta Postcron, com ela você posta em todas as páginas em uma única vez, tem até aplicativo para celular ;) (Postcron é pago)</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Você pode utilizar somente o celular para fazer a divulgação ;) o site é responsivo, podendo assim facilitar a sua navegação, divulgue copiando e colando a mensagem apenas com o celular, salve o painel de publisher no navegador do seu celular, utilize também o aplicativo gerenciador de páginas do Facebook.</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="widget widget-info widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>                             
                        <div class="widget-data">
                            <div class="widget-title" style="padding-right: 50px;font-size: 12px;">Só pode solicitar posts com mensagens/imagens sem logo de marcas, para evitar direitos autorais e até mesmo bloqueios do Facebook.</div>
                            <div class="widget-subtitle"></div>
                        </div>      
                        <div class="widget-controls">                                
                            <a class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                        </div>
                    </div>
                </div>
     
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->                                
    </div>            
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->