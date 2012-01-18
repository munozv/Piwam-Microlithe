<script type="text/javascript">
    /*
     * Check the checkboxes who matches the pattern [number]
     */
    function checkAll(number)
    {
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; inputs[i]; i++)
        {
            if (inputs[i].type == "checkbox") {
                var reg = new RegExp("^.*\[" + number + "\].*$");
                if (inputs[i].name.match(reg)) {
                    inputs[i].checked = true;
                }
            }
        }
    }
</script>


<form name="rightform"
    action="<?php echo url_for('@member_acl?id=' . $user_id) ?>" method="post"
    <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php echo $form['user_id']->render() ?>

    <table class="formtable">
        <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Sauvegarder" class="blue button" /></td>
            </tr>
        </tfoot>

        <?php foreach ($form['rights'] as $key => $oneForm): ?>
            <tr>
                <td>
                    <h3><?php echo $form->getModuleName($key) ?></h3>
                </td>
                <td>
                    <a onClick="checkAll(<?php echo $key ?>)"><?php echo image_tag('arrow_down', array('align' => 'absmiddle', 'alt' => '>')) ?> tout cocher</a>
                </td>
            </tr>

            <?php foreach ($oneForm as $right): ?>
                <tr>
                    <th><?php echo $right->renderLabel() ?></th>
                    <td><?php echo $right->render() ?></td>
                </tr>
            <?php endforeach ?>
        <?php endforeach ?>
    </table>
</form>
