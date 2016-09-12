<? defined('C5_EXECUTE') or die("Access Denied."); 

use \Concrete\Core\Tree\Node\Node as TreeNode;

?>
<div id="topics-tree-node-permissions">
<?
$handle = $node->getPermissionObjectKeyCategoryHandle();
$enablePermissions = false;
if (!$node->overrideParentTreeNodePermissions()) { 
	$permNode = TreeNode::getByID($node->getTreeNodePermissionsNodeID()); ?>

	<div class="alert alert-info">
	<?=t("Permissions for this node are currently inherited from <strong>%s</strong>.", $permNode->getTreeNodeDisplayName())?>
	<br/><br/>
	<a href="javascript:void(0)" class="btn btn-sm btn-warning" onclick="TopicsPermissions.setTreeNodePermissionsToOverride()"><?=t('Override Permissions')?></a>
	</div>
	
<? } else { 
	$enablePermissions = true;
	?>

	<div class="alert alert-info">
	<?=t("Permissions for this node currently override its parents' permissions.")?>
	<? if ($node->getTreeNodeParentID() > 0) { ?>
	<br/><br/>
		<a href="javascript:void(0)" class="btn btn-sm btn-warning" onclick="TopicsPermissions.setTreeNodePermissionsToInherit()"><?=t('Revert to Parent Permisisons')?></a>
	<? } ?>
</div>

<? } ?>


<?=Loader::element('permission/help');?>

<? $cat = PermissionKeyCategory::getByHandle($handle);?>

<form method="post" id="ccm-permission-list-form" action="<?=$cat->getToolsURL("save_permission_assignments")?>&amp;treeNodeID=<?=$node->getTreeNodeID()?>">

<table class="ccm-permission-grid table table-striped">
<?
$permissions = PermissionKey::getList($handle);
foreach($permissions as $pk) { 
	$pk->setPermissionObject($node);
	?>
	<tr>
	<td class="ccm-permission-grid-name" id="ccm-permission-grid-name-<?=$pk->getPermissionKeyID()?>"><strong><? if ($enablePermissions) { ?><a dialog-title="<?=$pk->getPermissionKeyDisplayName()?>" data-pkID="<?=$pk->getPermissionKeyID()?>" data-paID="<?=$pk->getPermissionAccessID()?>" onclick="ccm_permissionLaunchDialog(this)" href="javascript:void(0)"><? } ?><?=$pk->getPermissionKeyDisplayName()?><? if ($enablePermissions) { ?></a><? } ?></strong></td>
	<td id="ccm-permission-grid-cell-<?=$pk->getPermissionKeyID()?>" <? if ($enablePermissions) { ?>class="ccm-permission-grid-cell"<? } ?>><?=Loader::element('permission/labels', array('pk' => $pk))?></td>
</tr>
<? } ?>
<? if ($enablePermissions) { ?>
<tr>
	<td class="ccm-permission-grid-name" ></td>
	<td>
	<?=Loader::element('permission/clipboard', array('pkCategory' => $cat))?>
	</td>
</tr>
<? } ?>

</table>
</form>

<? if ($enablePermissions) { ?>
<div id="topics-tree-node-permissions-buttons" class="dialog-buttons">
	<a href="javascript:void(0)" onclick="jQuery.fn.dialog.closeTop()" class="btn btn-default pull-left"><?=t('Cancel')?></a>
	<button onclick="$('#ccm-permission-list-form').submit()" class="btn btn-primary pull-right"><?=t('Save')?> <i class="icon-ok-sign icon-white"></i></button>
</div>
<? } else { ?>
	<div class="dialog-buttons"></div>
<? } ?>

</div>

<script type="text/javascript">

ccm_permissionLaunchDialog = function(link) {
	var dupe = $(link).attr('data-duplicate');
	if (dupe != 1) {
		dupe = 0;
	}
	jQuery.fn.dialog.open({
		title: $(link).attr('dialog-title'),
		href: '<?=Loader::helper('concrete/urls')->getToolsURL('permissions/dialogs/tree/node')?>?duplicate=' + dupe + '&treeNodeID=<?=$node->getTreeNodeID()?>&pkID=' + $(link).attr('data-pkID') + '&paID=' + $(link).attr('data-paID'),
		modal: false,
		width: 500,
		height: 380
	});		
}

$(function() {
	$('#ccm-permission-list-form').ajaxForm({
		beforeSubmit: function() {
			jQuery.fn.dialog.showLoader();
		},
		
		success: function(r) {
			jQuery.fn.dialog.hideLoader();
			jQuery.fn.dialog.closeTop();
		}		
	});
});

var TopicsPermissions = {

	refresh: function() {
		jQuery.fn.dialog.showLoader();
		$.get('<?=Loader::helper('concrete/urls')->getToolsURL('tree/node/permissions')?>?treeNodeID=<?=$node->getTreeNodeID()?>', function(r) { 
			jQuery.fn.dialog.replaceTop(r);
			jQuery.fn.dialog.hideLoader();
		});
	},

	setTreeNodePermissionsToInherit: function() {
		jQuery.fn.dialog.showLoader();
		$.get('<?=$pk->getPermissionAssignmentObject()->getPermissionKeyToolsURL("revert_to_global_node_permissions")?>&treeNodeID=<?=$node->getTreeNodeID()?>', function() { 
			TopicsPermissions.refresh();
		});
	},

	setTreeNodePermissionsToOverride: function() {
		jQuery.fn.dialog.showLoader();
		$.get('<?=$pk->getPermissionAssignmentObject()->getPermissionKeyToolsURL("override_global_node_permissions")?>&treeNodeID=<?=$node->getTreeNodeID()?>', function() { 
			TopicsPermissions.refresh();
		});
	}

};

</script>