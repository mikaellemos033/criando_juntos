<?php 
 global $wpdb;
 $dados = $wpdb->get_results("select DISTINCT post_id from criando_juntos") ;
 include dirname(__FILE__) .'/css.php';
?>

<main class="main">
    <table>

        <tr>
            <th>Nome da Publicação</th>
            <th>Ver</th>
        </tr>

        <?php
            foreach( $dados as $post ):
                $post = get_post($post->post_id);
                ?>
        <tr>
            <td><?= $post->post_title ?></td>
            <td><a href="?page=criando_juntos&see_content=<?= $post->ID ?>">ver</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

</main>