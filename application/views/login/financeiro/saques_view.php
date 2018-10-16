<div class="container-page"> 
    <div class="left-container">
        <?php echo $this->load->view("menu/menu_financeiro_view", null) ?>
    </div>
    <div class="right-container">
        <div class="geral-container">
            <header class="section-header">
                <h1 class="section-header--title"><?php echo "Todos os saques" ?></h1>
            </header>
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
                    <?php if ($saques): ?>
                        <?php foreach ($saques as $saque): ?>
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