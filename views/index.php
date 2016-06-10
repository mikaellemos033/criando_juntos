<?php 
 global $wpdb;
 $dados = $wpdb->get_results("select DISTINCT post_id from criando_juntos") ;
?>
<style>
    .main{
        width: 70%;
        margin: 20px 0;
        background: #ffffff;
        box-shadow: 0 4px 3px #ddd;
        border-box: box-sizing;
        padding: 20px 10px;
    }
    .main table{
        width: 100%;
        display: table;
    }

    .main table th, .main table td{
        text-align: left;
        padding: 2px 10px;
    }

    .main table tr{
        padding: 10px 0;
    }
</style>

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
            <td><a href="?page=criando_juntos&see_content="<?= $post->ID ?>>ver</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

</main>