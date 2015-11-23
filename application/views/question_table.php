<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<table class="table">
<thead>
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Description</th>
        <th>Result</th>
        <th>Type</th>
        <th>Group</th>
    </tr>
</thead>
<tbody>
<?php if(isset($question_array)) :?>
	<?php foreach($question_array as $element):?>
    <tr>
        <td><?= $element['q_no']?></td>
        <td><?= $element['q_id']?></td>
        <td><?= $element['description']?></td>
        <td><?= $element['result']?></td>
        <td><?= $element['type']?></td>
        <td><?= $element['group']?></td>
        <td><span id="edit-question" data="<?= $element['q_id']?>" class="fui-gear" style="cursor: pointer"></span></td>
    </tr>
    <?php endforeach;?>
<?php endif; ?>
</tbody>
</table>