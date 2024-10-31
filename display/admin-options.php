<?php

# Where am I ?
$location = get_option('siteurl') . '/wp-admin/admin.php?page=punbb_recent_topics/display/admin-options.php';

# Setup our punbb Settings.
add_option('prt_punbb_db', __('', 'prt'));
add_option('prt_punbb_tt', __('', 'prt'));
add_option('prt_punbb_url', __('', 'prt'));
add_option('prt_punbb_limit', __('', 'prt'));

# If we've been submitted, then save :-)
if ('process' == $_POST['stage'])
{
	update_option('prt_punbb_db', $_POST['prt_punbb_db']);
	update_option('prt_punbb_tt', $_POST['prt_punbb_tt']);
	update_option('prt_punbb_url', $_POST['prt_punbb_url']);
	update_option('prt_punbb_limit', $_POST['prt_punbb_limit']);
}

# When loading the form, fill in our old values....

$prt_punbb_db = stripslashes(get_option('prt_punbb_db'));
$prt_punbb_tt = stripslashes(get_option('prt_punbb_tt'));
$prt_punbb_url = stripslashes(get_option('prt_punbb_url'));
$prt_punbb_limit = stripslashes(get_option('prt_punbb_limit'));

?>
<div class="wrap">
  <h2><?php _e('punBB Recent Topics') ?></h2>
  <form name="form1" method="post" action="<?php echo $location ?>&amp;updated=true">
  <input type="hidden" name="stage" value="process" />
  <table width="100%" cellspacing="2" cellpadding="5" class="editform">
    <tr valign="top">
      <th scope="row"><?php _e('punbb MySQL Database Name') ?></th>
      <td><input name="prt_punbb_db" id="prt_punbb_db" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $prt_punbb_db; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('punbb Topics Table Name') ?></th>
      <td><input name="prt_punbb_tt" id="prt_punbb_tt" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $prt_punbb_tt; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('punbb forum URL') ?></th>
      <td><input name="prt_punbb_url" id="prt_punbb_url" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $prt_punbb_url; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Number of Topics to show') ?></th>
      <td><input name="prt_punbb_limit" id="prt_punbb_limit" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $prt_punbb_limit; ?>" />
      </td>
    </tr>
  </table>
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options', 'prt') ?> &raquo;" />
    </p>
  </form>
</div>
