<?php
/**
 * IceTabs Module for Joomla 1.6 By IceTheme
 * 
 * 
 * @copyright	Copyright (C) 2008 - 2011 IceTheme.com. All rights reserved.
 * @license		GNU General Public License version 2
 * 
 * @Website 	http://www.icetheme.com/Joomla-Extensions/icetabs.html
 * @Support 	http://www.icetheme.com/Forums/IceTabs/
 *
 */
?> 

<div class="ice-description">
	
  
  	 <?php if($params->get('show_readmore','0')) { ?>
        <a class="ice-readmore" <?php echo $target;?>  href="<?php echo $row->link;?>" title="<?php echo $row->title;?>">
               <?php echo $row->mainImage; ?>
          </a>
    <?php } else { ?>
          <?php echo $row->mainImage; ?>
     <?php }?>
     
      <h3 class="ice-title">
		<?php if($params->get('show_readmore','0')) { ?>
             <a <?php echo $target;?>  href="<?php echo $row->link;?>" title="<?php echo $row->title;?>"><?php echo $row->title;?></a>
        <?php } else { ?>
            <?php echo $row->title; ?>
        <?php }?>
		</h3>
        
    
   

    	
    <div class="ice-description2">
	<?php echo $row->description;?>
    </div>    
    
	<?php if($params->get('show_readmore', 1)): ?>
		<a class="ice-readmore" <?php echo $target;?>  href="<?php echo $row->link;?>" title="<?php echo $row->title;?>">
			<?php echo JText::_('Read more...');?>
		</a>
	<?php endif; ?>
    
    
    
</div>