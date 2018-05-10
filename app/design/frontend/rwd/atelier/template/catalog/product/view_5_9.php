<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    design
 * @package     rwd_default
 * @copyright   Copyright (c) 2006-2017 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Product view template
 *
 * @see Mage_Catalog_Block_Product_View
 * @see Mage_Review_Block_Product_View
 */
?>
<?php $_helper = $this->helper('catalog/output'); ?>
<?php $_product = $this->getProduct(); ?>
<script type="text/javascript">
    var optionsPrice = new Product.OptionsPrice(<?php echo $this->getJsonConfig() ?>);
</script>
<div id="messages_product_view"><?php echo $this->getMessagesBlock()->toHtml() ?></div>
<form action="<?php echo $this->getSubmitUrl($_product, array('_secure' => $this->_isSecure())) ?>" method="post" id="product_addtocart_form"<?php if($_product->getOptions()): ?> enctype="multipart/form-data"<?php endif; ?>>
            <?php echo $this->getBlockHtml('formkey') ?>
<div class="product-view">
    <div class="product-essential">
            <div class="no-display">
                <input type="hidden" name="product" value="<?php echo $_product->getId() ?>" />
                <input type="hidden" name="related_product" id="related-products-field" value="" />
            </div>

            <div class="product-img-box">
                <div class="product-name">
                    <h1><?php echo $_helper->productAttribute($_product, $_product->getName(), 'name') ?></h1>
                </div>
                <?php echo $this->getChildHtml('media') ?>
            </div>
            <div class="product-shop">
				<div class="product-shop-top">
					<div class="product-name">
						<h1 class="h1"><?php echo $_helper->productAttribute($_product, $_product->getName(), 'name') ?></h1>
					</div>

					<?php if ($_product->getSku()):?>
						<div class="product_sku">
							<p><?php echo $this->__('Codice: ') ?><span><?php echo $_product->getSku(); ?></span></p>
						</div>
					<?php endif;?>

					<div class="price-info">
						<?php echo $this->getPriceHtml($_product); ?>
						<?php echo $this->getChildHtml('bundle_prices') ?>
						<?php echo $this->getTierPriceHtml() ?>						
						
					</div>
		
<?php /*                    <div class="extra-info">
                        <?php echo $this->getReviewsSummaryHtml($_product, 'default', false)?>
                        
                    </div>*/ 
?>
                    
                    <?php if ($_product->getShortDescription()):?>
                        <div class="short-description">
                            <div class="std">
                                <?php echo $getdescription = $_helper->productAttribute($_product, nl2br($_product->getShortDescription()), 'short_description'); ?>
                                <span class="more"><?php echo __('Vedi dettagli') ?></span>                                
                            </div>
                        </div>
                    <?php endif;?>
                    
                    <div class="spedizione">
                        <strong><?php echo __('Spedizione: ') ?></strong>
						<?php if($_product->getData('at_tempi_spedizione')!=''){ ?>
							<span><?php echo $_product->getData('at_tempi_spedizione') ?></span>
						<?php }else{ ?>
							<span><?php echo $this->__('4/5 giorni lavorativi') ?></span>
						<?php } ?>
						
                    </div>

					<?php echo $this->getChildHtml('alert_urls') ?>

					<?php echo $this->getChildHtml('other');?>
				</div>
                <?php if ($_product->isSaleable() && $this->hasOptions()):?>
                    <?php echo $this->getChildChildHtml('container1', '', true, true) ?>
                <?php endif;?>
				<div class="add-to-cart-wrapper">
					<?php /*echo $this->getChildHtml('product_type_data')*/ ?>
					<?php echo $this->getChildHtml('extrahint') ?>
                    <?php if($_product->isGrouped()): ?>
                        <a class="grouped_button" href="javascript:void(0)"><?php echo __('VEDI COMBINAZIONI') ?> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
                    <?php else : ?>
                        <?php if (!$this->hasOptions()):?>
                            <div class="add-to-box">
                                <?php if($_product->isSaleable()): ?>
                                    <?php echo $this->getChildHtml('addtocart') ?>
                                    <?php if( $this->helper('wishlist')->isAllow() || $_compareUrl=$this->helper('catalog/product_compare')->getAddUrl($_product)): ?>
                                        <span class="or"><?php echo $this->__('OR') ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php /*<?php echo $this->getChildHtml('addto') ?>*/ ?>
                            </div>
                        <?php echo $this->getChildHtml('extra_buttons') ?>
                        <?php elseif (!$_product->isSaleable()): ?>
                            <div class="add-to-box">
                                <?php echo $this->getChildHtml('addto') ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
				</div>
                <div class="richiedi">
                    <span><i class="fas fa-info"></i><strong><?php echo __('Non hai trovato il prodotto che stai cercando?  ') ?></strong>Richiedi informazioni</span>
                </div>
			</div>
            <div class="clearer"></div>
            <?php if ($_product->isSaleable() && $this->hasOptions()):?>
                <?php echo $this->getChildChildHtml('container2', '', true, true) ?>
            <?php endif;?>
        
        <script type="text/javascript">
        //<![CDATA[
            var productAddToCartForm = new VarienForm('product_addtocart_form');
            productAddToCartForm.submit = function(button, url) {
                if (this.validator.validate()) {
                    var form = this.form;
                    var oldUrl = form.action;

                    if (url) {
                       form.action = url;
                    }
                    var e = null;
                    try {
                        this.form.submit();
                    } catch (e) {
                    }
                    this.form.action = oldUrl;
                    if (e) {
                        throw e;
                    }

                    if (button && button != 'undefined') {
                        button.disabled = true;
                    }
                }
            }.bind(productAddToCartForm);

            productAddToCartForm.submitLight = function(button, url){
                if(this.validator) {
                    var nv = Validation.methods;
                    delete Validation.methods['required-entry'];
                    delete Validation.methods['validate-one-required'];
                    delete Validation.methods['validate-one-required-by-name'];
                    // Remove custom datetime validators
                    for (var methodName in Validation.methods) {
                        if (methodName.match(/^validate-datetime-.*/i)) {
                            delete Validation.methods[methodName];
                        }
                    }

                    if (this.validator.validate()) {
                        if (url) {
                            this.form.action = url;
                        }
                        this.form.submit();
                    }
                    Object.extend(Validation.methods, nv);
                }
            }.bind(productAddToCartForm);
        //]]>
        </script>
    </div>
     <?php if($_product->isGrouped()): ?>
    <div class="pr_group">
    <?php echo $this->getChildHtml('product_type_data') ?>
   
        <?php if (!$this->hasOptions()):?>
            <div class="add-to-box pr_grouped">
                <?php if($_product->isSaleable()): ?>
                    <?php echo $this->getChildHtml('addtocart') ?>
                    <?php if( $this->helper('wishlist')->isAllow() || $_compareUrl=$this->helper('catalog/product_compare')->getAddUrl($_product)): ?>
                        <span class="or"><?php echo $this->__('OR') ?></span>
                    <?php endif; ?>
                <?php endif; ?>
                <?php /*<?php echo $this->getChildHtml('addto') ?>*/ ?>
            </div>
        <?php echo $this->getChildHtml('extra_buttons') ?>
        <?php elseif (!$_product->isSaleable()): ?>
            <div class="add-to-box">
                <?php echo $this->getChildHtml('addto') ?>
            </div>
        <?php endif; ?>
    
    </div>
    <?php endif; ?>
</div>
	</form>
	<?php //echo $this->getLayout()->createBlock('cms/block')->setBlockId('block_tab_product_view')->toHtml(); ?>

<div class="box_product_infor one">
<?php echo $this->getChildHtml('related_products') ?>
</div>
<div class="box_product_infor">
    <?php echo $this->getLayout()->createBlock('core/template')->setTemplate('catalog/product/list/related_hai.phtml')->toHtml(); ?>
</div>
</div>
<div class="information">
    <h2><?php echo __('Ulteriorio informazioni') ?></h2>
    <div class="infor-left">
        <p><strong><?php echo $_product->getResource()->getAttribute('description')->getStoreLabel() ?></strong><br>
        <?php echo $_product->getDescription() ?></p>
        <p><strong><?php echo $_product->getResource()->getAttribute('at_materiali_inclusi')->getStoreLabel() ?></strong><br>
			<?php echo $_product->getData('at_materiali_inclusi') ?></p>
            <div style='display:none'><span><i class="fas fa-chevron-right"></i>It is a long established fact that a reader will be</span></div>
                     
        </p>
    </div>
    <div class="infor-right">
        <p><strong><?php echo $_product->getResource()->getAttribute('at_formato')->getStoreLabel() ?></strong>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
        <p><strong><?php echo $_product->getResource()->getAttribute('at_dimensioni_profilo')->getStoreLabel() ?></strong>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
        <p><strong><?php echo $_product->getResource()->getAttribute('at_materiale')->getStoreLabel() ?></strong>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
        <p><strong><?php echo $_product->getResource()->getAttribute('at_utilizzo')->getStoreLabel() ?></strong>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
        <p><strong>Lorem Ipsum:</strong>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
    </div>
</div>

<div class="form-product">
    <?php echo $this->getLayout()->createBlock('core/template')->setTemplate('contacts/form-product.phtml')->toHtml(); ?>
</div>
<script>
    jQuery('.more').click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery('.information').offset().top
        }, 1000);
    });
    jQuery('.richiedi').click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery('.form-product').offset().top
        }, 1000);
    });
    jQuery('.grouped_button').click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery('.pr_group').offset().top
        }, 1000);
    });
    jQuery("#configurable_swatch_at_colore").prev().css("display", "none");
</script>


