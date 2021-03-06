<?php $cfg = array(
    'title'         => $lang->get('Installer'),
    'btn'           => $lang->get('Save'),
    'sub_title'     => $lang->get('Database settings'),
    'active'        => 'dbconfig',
    'pathInclude'   => $path_tpl . 'include' . DS,
);

include($cfg['pathInclude'] . 'index_head' . GK_EXT_TPL); ?>

    <form name="dbconfig_form" id="dbconfig_form" action="<?php echo $route_install; ?>index/dbconfig-submit/">
        <input type="hidden" name="__token__" value="<?php echo $token; ?>">
        <?php include($path_tpl_console . 'include' . DS . 'dbconfig' . GK_EXT_TPL);
        include($cfg['pathInclude'] . 'install_btn' . GK_EXT_TPL); ?>
    </form>

<?php include($cfg['pathInclude'] . 'install_foot' . GK_EXT_TPL); ?>

    <script type="text/javascript">
    var opts_submit_form = {
        modal: {
            btn_text: {
                close: '<?php echo $lang->get('Close'); ?>',
                ok: '<?php echo $lang->get('OK'); ?>'
            }
        },
        msg_text: {
            submitting: '<?php echo $lang->get('Submitting'); ?>'
        },
        jump: {
            url: '<?php echo $route_install; ?>index/<?php echo $step['next']; ?>/',
            text: '<?php echo $lang->get('Redirecting'); ?>'
        }
    };

    $(document).ready(function(){
        var obj_validate_form    = $('#dbconfig_form').baigoValidate(opts_validate_form);
        var obj_submit_form       = $('#dbconfig_form').baigoSubmit(opts_submit_form);
        $('#dbconfig_form').submit(function(){
            if (obj_validate_form.verify()) {
                obj_submit_form.formSubmit();
            }
        });
    });
    </script>

<?php include($cfg['pathInclude'] . 'html_foot' . GK_EXT_TPL);