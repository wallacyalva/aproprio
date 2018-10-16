
<div class="page-sidebar" style="margin-bottom: 0%">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="" class="x-navigation">Amor Proprio</a>
                        <a href="" style="background-color: #313131;left: 0px;" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="" class="profile-mini">
                            <img src="<?=ci_site_url()?>assets/images/users/avatar.jpg" alt="<?=$user->name?>"/>
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
                                <a href="<?=ci_site_url()?>usuario/profile" class="profile-control-left"><span class="fa fa-user"></span></a>
                                <a href="<?=ci_site_url()?>usuario/config" class="profile-control-right"><span class="fa fa-cog"></span></a>
                            </div>
                        </div>                                                                        
                    </li>

            <!-- <li class="xn-option">
                <a href=""><span class="fa fa-line-chart"></span> <span class="xn-text">Métricas</span></a>
            </li> -->
            <li class="xn-openable">
                <a href=""><span class="fa fa-user-secret"></span> <span class="">Usuários</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>usuario/new"><span class="fa fa-user-secret"></span>Novo usuario</a></li>
                    <li class=""><a href="<?=ci_site_url()?>usuario/todosAdministradores"><span class="fa fa-user-secret"></span>Todos usuarios</a></li>
                </ul>
            </li>
            <!-- <li class="xn-openable">
                <a href=""><span class="fa fa-users"></span> <span class="">Pacientes</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>cliente/new_cliente"><span class="fa fa-users"></span>Novo Paciente</a></li>
                    <li class=""><a href="<?=ci_site_url()?>cliente/todosClientes"><span class="fa fa-users"></span>Todos Pacientes</a></li>
                </ul>
            </li> -->
            <li class="xn-openable">
                <a href=""><span class="fa fa-users"></span> <span class="">Pacientes</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>cliente/new_cliente"><span class="fa fa-users"></span>Novo Paciente</a></li>
                    <li class=""><a href="<?=ci_site_url()?>cliente/todosClientes"><span class="fa fa-users"></span>Todos Pacientes</a></li>
                </ul>
            </li>
            <!-- <li class="xn-option">
                <a href=""><span class="fa fa-clone"></span>Paginas</a>
            </li> -->
            <li class="xn-openable">
                <a href=""><span class="fa fa-flag"></span> <span class="">Campanhas</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>site/NovaCampanha"><span class="fa fa-flag"></span>Nova Campanha</a></li>
                    <li class=""><a href="<?=ci_site_url()?>site/vizualizar/campanhas"><span class="fa fa-flag"></span>Todas Campanhas</a></li>
                </ul>
            </li>
            <!-- <li class="xn-option">
                <a href="<?=ci_site_url()?>site/NovaCampanha"><span class="fa fa-flag"></span>Campanhas</a>
            </li> -->
            <li class="xn-openable">
                <a href=""><span class="fa fa-gift"></span> <span class="">Doação de Cabelo</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>site/doacaoDeCabelo"><span class="fa fa-gift"></span>Nova Doação de Cabelo</a></li>
                    <li class=""><a href="<?=ci_site_url()?>site/vizualizar/doacoes_cabelo"><span class="fa fa-gift"></span>Todas Doações de Cabelo</a></li>
                </ul>
            </li>
            <!-- <li class="xn-option">
                <a href="<?=ci_site_url()?>site/doacaoDeCabelo"><span class="fa fa-gift"></span>Doação de Cabelo</a>
            </li> -->
            <li class="xn-openable">
                <a href=""><span class="fa fa-calendar"></span> <span class="">Eventos</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>site/NovoEvento"><span class="fa fa-calendar"></span>Novo Evento</a></li>
                    <li class=""><a href="<?=ci_site_url()?>site/vizualizar/eventos"><span class="fa fa-calendar"></span>Todos Eventos</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href=""><span class="fa fa-newspaper-o"></span> <span class="">Noticias</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>site/NovaNoticia"><span class="fa fa-plus"></span>Nova Noticia</a></li>
                    <li class=""><a href="<?=ci_site_url()?>site/vizualizar/Noticia"><span class="fa fa-list"></span>Todas Noticia</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href=""><span class="fa fa-file-text"></span> <span class="">Textos e Links</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>site/alterarTexto"><span class="fa fa-edit"></span>Alterar Textos</a></li>
                    <li class=""><a href="<?=ci_site_url()?>site/alterarLink"><span class="fa fa-edit"></span>Alterar Links</a></li>
                </ul>
            </li>
            <!-- <li class="xn-option">
                <a href="<?=ci_site_url()?>site/NovoEvento"><span class="fa fa-calendar"></span>Eventos</a>
            </li> -->
            <!-- <li class="">
                <a href=""><span class="fa fa-comments"></span>Comunicação</a>
            </li> -->
 
            <!--<li class=""><a href="<?=ci_site_url()?>usuario/ativarUsuarios"><span class="fa fa-user"></span>Ativar</a></li>-->

            <!-- <li class="xn-openable">
                <a href=""><span class="fa fa-question"></span> <span class="xn-text">Suporte</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>tickets/abrirTicket"><span class="fa fa-ticket"></span>Abrir um Ticket</a></li>
                    <li class=""><a href="<?=ci_site_url()?>tickets/meusTickets"><span class="fa fa-ticket"></span>Meus Tickets</a></li>
                    <li class=""><a href="<?=ci_site_url()?>tickets/todosTickets"><span class="fa fa-ticket"></span>Todos Tickets</a></li>
                </ul>
            </li> -->
            

            <!-- <li class="xn-option">
                <a href="<?=ci_site_url()?>usuario/dicas"><span class="fa fa-lightbulb-o"></span>Dicas</a>    
            </li>  -->

            <li class="xn-option">
                <a href="" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span>Sair</a>    
            </li> 
                    
    </ul>
</div>