<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                   <!--  <li class="xn-logo"> -->
                    <li class="xn-profile">
                        <a href="<?php echo ci_site_url(); ?>usuario">ACHEI DE TUDO</a>
                    </li>
                    <li class="xn-profile">
                        <a href="" class="profile-mini" id="profile_mini">
                            <img src="<?=ci_site_url("uploads/images/users/");?>/<?=$user->imagem?>" alt="<?=$user->name?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?=ci_site_url("uploads/images/users/");?>/<?=$user->imagem?>" alt="<?=$user->name?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?=$user->name?></div>
                                <div class="profile-data-title"></div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    
                    <li class="xn-title">Navegação</li>
                    <li class="xn-openable <?php if($this->uri->segment(1)=="usuario"){echo "active";}?>">
                        <a href=""><span class="fa fa-dashboard"></span> <span class="xn-text">Painel</span></a>
                        <ul>
                            <li class="<?php if($this->uri->segment(2)=="usuario"){echo "active";}?>"><a href="<?=ci_site_url("usuario");?>"><span class="fa fa-dashboard"></span>Dashboard</a></li>
                            <li class="<?php if($this->uri->segment(2)=="profile"){echo "active";}?>"><a href="<?=ci_site_url("usuario/profile");?>"><span class="fa fa-user"></span>Meus Dados</a></li>
                            <li class="<?php if($this->uri->segment(1)=="usuario" AND $this->uri->segment(2)=="new"){echo "active";}?>"><a href="<?=ci_site_url("usuario/new");?>"><span class="fa fa-plus-square"></span>Inserir Usuário</a></li>
                            <li class="<?php if($this->uri->segment(1)=="usuario" AND $this->uri->segment(2)=="usuarios"){echo "active";}?>"><a href="<?=ci_site_url("usuario/usuarios");?>"><span class="fa fa-users"></span>Meus Usuários</a></li>
                        </ul>
                    </li>                    
                    <li class="xn-openable <?php if($this->uri->segment(1)=="cliente"){echo "active";}?>">
                        <a href=""><span class="fa fa-users"></span> <span class="xn-text">Clientes</span></a>
                        <ul>
                            <li class="<?php if($this->uri->segment(2)=="new_cliente"){echo "active";}?>"><a href="<?=ci_site_url();?>cliente/new_cliente"><span class="fa fa-plus"></span> Cadastrar</a></li>
                            <li class="<?php if($this->uri->segment(2)=="my_cliente"){echo "active";}?>"><a href="<?=ci_site_url();?>cliente/my_cliente"><span class="fa fa-users"></span> Meus Clientes</a></li>
                            <li><a href="pages-invoice.html"><span class="fa fa-file-o"></span> Gerar Contrato</a></li>                         
                        </ul>
                    </li>
                    <li class="xn-openable <?php if($this->uri->segment(1)=="usuario" AND $this->uri->segment(2)=="usuarios" || $this->uri->segment(1)=="usuario" AND $this->uri->segment(2)=="new"){echo "active";}?>">
                        <a href=""><span class="fa fa-users"></span> <span class="xn-text">Empreendedores</span></a>
                        <ul>
                            <li class="<?php if($this->uri->segment(2)=="new_cliente"){echo "active";}?>"><a href="<?=ci_site_url();?>cliente/new_cliente"><span class="fa fa-plus"></span> Cadastrar</a></li>
                            <li class="<?php if($this->uri->segment(2)=="my_cliente"){echo "active";}?>"><a href="<?=ci_site_url();?>cliente/my_cliente"><span class="fa fa-users"></span> Empreendedores</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=="promocao"){echo "active";}?>"></a href="<?=ci_site_url("promocao");?>"><span class="fa fa-star-o"></span> Promoções</a></li>
                           
                    <li class="xn-openable <?php if($this->uri->segment(1)=="cliente" or $this->uri->segment(1)=="promocao"){echo "active";}?>">
                        <a href=""><span class="fa fa-users"></span> <span class="xn-text">Clientes</span></a>
                        <ul>
                            <li class="<?php if($this->uri->segment(2)=="new_cliente"){echo "active";}?>"><a href="<?=ci_site_url();?>cliente/new_cliente"><span class="fa fa-plus"></span> Cadastrar</a></li>
                            <li class="<?php if($this->uri->segment(2)=="my_cliente"){echo "active";}?>"><a href="<?=ci_site_url();?>cliente/my_cliente"><span class="fa fa-users"></span> Meus Clientes</a></li>
                            <li class="<?php if($this->uri->segment(1)=="promocao"){echo "active";}?>"><a href="<?=ci_site_url("promocao");?>"><span class="fa fa-star-o"></span> Promoções</a></li>
                            <li><a href="pages-invoice.html"><span class="fa fa-file-o"></span> Gerar Contrato</a></li>                         
                        </ul>
                    </li>
                    <li class="xn-openable <?php if($this->uri->segment(1)=="banner"){echo "active";}?>">
                        <a href=""><span class="fa fa-file-text-o"></span> <span class="xn-text">Banners</span></a>
                        <ul>
                            <li  class="xn-openable <?php if($this->uri->segment(1)=="banner" AND $this->uri->segment(2)=="new"){echo "active";}?>"><a href="<?=ci_site_url("banner/new");?>"><span class="fa fa-picture-o"></span>Novo Banner</a></li>
                            <li  class="xn-openable <?php if($this->uri->segment(1)=="banner" AND $this->uri->segment(2)==""){echo "active";}?>"><a href="<?=ci_site_url("banner/");?>"><span class="fa fa-cloud-upload"></span>Ver Banners</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable <?php if($this->uri->segment(1)=="categoria"){echo "active";}?>">
                        <a href=""><span class="fa fa fa-tags"></span> <span class="xn-text">Categorias</span></a>
                        <ul>
                            <li  class="xn-openable <?php if($this->uri->segment(1)=="categoria" AND $this->uri->segment(2)=="new"){echo "active";}?>"><a href="<?=ci_site_url("categoria/new");?>"><span class="fa fa-tag"></span>Nova Categoria</a></li>
                            <li  class="xn-openable <?php if($this->uri->segment(1)=="categoria" AND $this->uri->segment(2)=="categorias" OR $this->uri->segment(2)=="editar_categoria"){echo "active";}?>"><a href="<?=ci_site_url("categoria/categorias");?>"><span class="fa fa-tags"></span>Categorias</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-money"></span> <span class="xn-text">Financeiro</span></a>                        
                        <ul>
                            <li><a href="<?=ci_site_url();?>financeiro/allMounth"><span class="fa fa-pencil-square-o"></span>Mensaldiades</a></li>                            
                            <li><a href="<?=ci_site_url();?>financeiro/"><span class="fa  fa-code"></span>Token Pagseguro</a></li>
                            <li><a href="<?=ci_site_url();?>financeiro/fatura"><span class="fa fa-credit-card"></span>Minha Fatura</a></li>
                            <li><a href="<?=ci_site_url();?>financeiro/faturas"><span class="fa fa-file-text-o"></span>Faturas</a></li>
                        </ul>
                    </li>                  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->