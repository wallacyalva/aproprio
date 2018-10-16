<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">

            <li class="xn-profile">
                <a href="<?php echo ci_site_url(); ?>usuario">Mensagens</a>
            </li>

            <li class="xn-profile">
                <a href="" class="profile-mini" id="profile_mini">
                    <img src="<?=ci_site_url();?>uploads/images/users/<?=$user->imagem?>" alt="<?=$user->name?>"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?=ci_site_url();?>uploads/images/users/<?=$user->imagem?>" alt="<?=$user->name?>"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?=$user->name?></div>
                        <div class="profile-data-title"></div>
                    </div>
                    <div class="profile-controls">
                        <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                        <a href="<?=ci_site_url()?>usuario/profile" class="profile-control-right"><span class="fa fa-user"></span></a>
                    </div>
                </div>                                                                        
            </li>
                    
            <li class="xn-title">Navegação</li>

            <li class="xn-option">
                <a href=""><span class="fa fa-home"></span> <span class="xn-text">Metricas</span></a>
            </li>

            <li class="xn-option">
                <a href="<?=ci_site_url()?>posts"><span class="fa fa-file"></span> <span class="xn-text">Posts</span></a>
            </li>

            <li class="xn-option">
                <a href="<?=ci_site_url()?>posts/solicitarPost"><span class="fa fa-file-text"></span> <span class="xn-text">Solicitar Post</span></a>
            </li>

            <li class="xn-openable">
                <a href=""><span class="fa fa-users"></span> <span class="xn-text">Usuários</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>usuario/todosDivulgadores"><span class="fa fa-user"></span>Divulgadores</a></li>
                    <li class=""><a href="<?=ci_site_url()?>usuario/todosRedatores"><span class="fa fa-user"></span>Redatores</a></li>
                    <li class=""><a href="<?=ci_site_url()?>usuario/todosAdministradores"><span class="fa fa-user"></span>Administradores</a></li>
                </ul>
            </li>

            <li class="xn-openable">
                <a href=""><span class="fa fa-plus-circle"></span> <span class="xn-text">Financeiro</span></a>
                <ul>
                    <li class=""><a href=""><span class="fa fa-user-plus"></span>Dados</a></li>
                    <li class=""><a href=""><span class="fa fa-upload"></span>Extrato</a></li>
                </ul>
            </li>

            <li class="xn-openable">
                <a href=""><span class="fa fa-info"></span> <span class="xn-text">Suporte</span></a>
                <ul>
                    <li class=""><a href="<?=ci_site_url()?>tickets/abrirTicket"><span class="fa fa-ticket"></span>Abrir um Ticket</a></li>
                    <li class=""><a href="<?=ci_site_url()?>tickets/meusTickets"><span class="fa fa-ticket"></span>Meus Tickets</a></li>
                    <li class=""><a href="<?=ci_site_url()?>tickets/todosTickets"><span class="fa fa-ticket"></span>Todos Tickets</a></li>
                </ul>
            </li>
        
            <li class="xn-title">&nbsp;</li>
            
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->