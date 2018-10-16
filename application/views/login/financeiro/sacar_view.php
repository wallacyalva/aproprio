<div class="container-page"> 
    <div class="left-container">
        <?php echo $this->load->view("menu/menu_financeiro_view", null) ?>
    </div>
    <div class="right-container">
        <div class="geral-container">
            <header class="section-header">
                <h1 class="section-header--title"><?php echo "Realizar Saque" ?></h1>
            </header>
            <div class="cart-wrapper grid-item table-list">
                <?php if (isset($saqueLiberado) && $saqueLiberado): ?>
                    <h3>
                        <div><span>Solicitar Saque</span></div>
                        <div><small>(Depósito Bancário)</small></div>
                    </h3>
                    <div style="margin: 25px 0 45px;">
                        <div class="text-center">Saldo Disponível: R$ <strong class="saque-disponivel"> <?php echo number_format($saldoDisponivel, 2, ',', '.'); ?></strong></div>
                        <div>
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="sacar-valores">Valor de saque</label>
                                <div class="col-md-5">
                                    <input type="text" maxlength="20" value="" size="40" placeholder="Informe o valor que deseja sacar" id="sacar-valores" class="form-control input-md required-field" name="saque" onkeyup="formatReal(this)">
                                    <span class="formError"><?php echo form_error('saque') ?></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div align="center">
                                <div id="realizar-saque" class="botao-inline btn btn-primary realizar-saque">Solicitar saque</div>
                                <div class="ajax-loader sacar-loader" style="display: none;"><img src="<?php echo images_url() . "ajax-loader.gif";?>"></div>
                            </div>
                        </div>
                        <div class="sacar-status error text-center" style="display:none;"></div>
                        <div class="sacar-status success text-center" style="display:none;"></div>
                        <?php if (isset($error)): ?>
                            <div class="error text-center"><?php echo $error; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="aviso-saque">* O pagamento será efetuado em até 72 horas úteis após a solicitação.</div>
                    <div class="aviso-saque">* Serão cobradas taxas de serviço no valor de R$15,00 + taxas bancárias. </div>
                    <div class="aviso-saque">* Certifique que seus dados bancários estão corretos. </div>
                <?php else: ?>
                    <div class="empty-table-list">
                        <p>
                            Você precisa cadastrar seus dados bancários antes de solicitar saques.
                        </p>
                        <p>
                            <a href="<?php echo ci_site_url("financeiro/dados_bancarios"); ?>">Clique para cadastrar seus dados bancário</a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>