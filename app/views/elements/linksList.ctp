<?php 
#pr($links);
?>
<table>
<tr>
    <td>URL</td>
    <td>DATE</td>
    <td>COMMENTS</td>
</tr>
<?php
foreach ($links as $link): ?>
<tr>
    <td><a href="<?php echo $link['Link']['url']; ?>"><?php echo $link['Link']['title']; ?></a></td>
    <td><?php echo $link['Link']['created']; ?></td>
    <td>
        <ul>
        <?php foreach ($link['Comment'] as $comment): ?>
            <li><?php echo $comment['your_comment'] . ' (' . $comment['created'] . ')'; ?></li>
            <?php endforeach; ?>
            <li><?php echo $html->link('Añadir comentario', '/comments/add/' . $link['Link']['id']);?></li>
        </ul>
    </td>
</tr>
<?php endforeach; ?>
</table>
<div class="clear"></div>