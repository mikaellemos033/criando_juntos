<?php
global $wpdb;

$post_id = $_GET['post_id'];
$user_id = $_GET['user_id'];

if( !is_numeric($post_id) || !is_numeric($user_id) ){
    header( "Location: " . bloginfo('url') .'/wp-admin/admin.php?page=criando_juntos');
}

$dados = $wpdb->get_results("select * from criando_juntos where post_id= '{$post_id}' and user_id = '{$user_id}'") ;
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
        foreach( $dados as $post ): ?>
            <tr>
                <td><?= $post->campo ?></td>
                <td><a target="_blank" href="<?= bloginfo('url') . '/wp-content/uploads' . $post->file ?>">ver</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>