<div class="container-page"> 
    <div class="left-container">
        <?php echo $this->load->view("menu/menu_financeiro_view", null) ?>
    </div>
    <div class="right-container">
        <header class="section-header">
            <h1 class="section-header--title"><?php echo "Financeiro" ?></h1>
        </header>
        <?php if (isset($success)): ?><div class="success-msg"><i class="fa fa-check icon-margin-right"></i><?php echo $success; ?></div><?php endif; ?>
        <div class="geral-container">
            <div class="table-title"><h3>Últimos Recebimentos</h3></div>
            <div class="cart-wrapper grid-item">
                <div class="grid cart-header medium--hide">
                    <div class="grid-item large--seven-twelfths">
                        <div class="grid-item two-thirds medium-down--one-half header-pad">Anúncio</div>
                        <div class="grid-item one-third medium-down--one-half header-pad">Valor</div>
                    </div>        
                    <div class="grid-item large--five-twelfths medium--two-thirds remove-pad">
                        <div class="grid-item one-half medium-down--one-half medium-down--text-left header-pad">Recebido de</div>
                        <div class="grid-item one-half medium-down--one-half header-pad remove-pad-half">Data</div>
                    </div>
                </div>
                <div>
                    <?php if ($ultimosRecebimentos): ?>
                        <?php foreach ($ultimosRecebimentos as $recebimento): ?>
                           <div class="cart-row quick-margin odd">
                               <div class="grid">
                                   <div class="grid-item large--seven-twelfths no-padding-bottom">
                                       <div class="grid">
                                           <div class="grid-item two-thirds medium-down--one-half">
                                               <?php echo $recebimento->titulo; ?>
                                           </div>
                                           <div class="grid-item one-third medium-down--one-half">
                                               R$ <?php echo number_format($recebimento->valor, 2, ",", ".")?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid-item large--five-twelfths no-padding-bottom quick-price ajax-clear">
                                       <div class="grid number-ajax">
                                           <div class="grid-item one-half medium-down--one-half medium-down--text-left text-left remove-pad-half">
                                               <?php echo $recebimento->nome_pagador?>
                                           </div>
                                           <div class="grid-item one-half medium-down--one-half">
                                               <?php echo date("d/m/Y H:i:s", strtotime($recebimento->data));?>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-table-list">Você ainda não recebeu pagamentos.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="geral-container">
            <div class="table-title"><h3>Últimos Saques</h3></div>
            <div class="cart-wrapper grid-item">
                <div class="grid cart-header medium--hide">
                    <div class="grid-item large--three-quarters">
                        <div class="grid-item one-half medium--one-half header-pad">Valor</div>
                        <div class="grid-item one-half medium--one-half header-pad">Status</div>
                    </div>        
                    <div class="grid-item large--one-quarter medium--one-quarter remove-pad">
                        <div class="grid-item header-pad remove-pad-half">Data</div>
                    </div>
                </div>
                <div>
                    <?php if ($ultimosSaques): ?>
                        <?php foreach ($ultimosSaques as $saque): ?>
                           <div class="cart-row quick-margin odd">
                               <div class="grid">
                                   <div class="grid-item large--three-quarters no-padding-bottom">
                                       <div class="grid">
                                           <div class="grid-item one-half medium--one-half">
                                               R$ <?php echo number_format($saque->valor, 2, ",", ".")?>
                                           </div>
                                           <div class="grid-item one-half medium--one-half">
                                               <span class="status-color-<?php echo $saque->status;?>"><?php echo $this->financeiroModel->getStatusSaqueExibicao($saque->status);?></span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid-item one-quarter no-padding-bottom medium--one-quarter push--medium--one-quarter quick-price ajax-clear">
                                       <div class="grid number-ajax">
                                           <div class="grid-item -left text-left remove-pad-half">
                                               <span><?php echo date("d/m/Y H:i:s", strtotime($saque->data)); ?></span>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-table-list">Você ainda não efetuou saques.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>