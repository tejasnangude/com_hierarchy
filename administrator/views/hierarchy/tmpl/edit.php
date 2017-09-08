<?php
/**
 * @version    SVN: <svn_id>
 * @package    Com_Hierarchy
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2017 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_hierarchy/assets/css/hierarchy.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
		js(document).ready(function() {
	});
	Joomla.submitbutton = function(task)
	{
		if (task == 'hierarchy.cancel') {
			Joomla.submitform(task, document.getElementById('hierarchy-form'));
		}
		else {
			if (task != 'hierarchy.cancel' && document.formvalidator.isValid(document.id('hierarchy-form'))) {
				Joomla.submitform(task, document.getElementById('hierarchy-form'));
			}
			else {
				alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_hierarchy&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="hierarchy-form" class="form-validate">
	<div class="form-horizontal">
		<?php
			echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general'));
			echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_HIERARCHY_TITLE_HIERARCHY', true));
		?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">
					<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('user_id'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('user_id'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('user_id'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('user_id'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('subuser_id'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('subuser_id'); ?></div>
					</div>
				</fieldset>
			</div>
		</div>
		<?php
		echo JHtml::_('bootstrap.endTab');
		if (JFactory::getUser()->authorise('core.admin','hierarchy')) : 
			echo JHtml::_('bootstrap.addTab', 'myTab', 'permissions', JText::_('JGLOBAL_ACTION_PERMISSIONS_LABEL', true));
			echo $this->form->getInput('rules');
			echo JHtml::_('bootstrap.endTab');
		endif;
			echo JHtml::_('bootstrap.endTabSet');
		?>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
