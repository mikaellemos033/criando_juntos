<?php
global $wpdb;

if( empty($_GET['see_content']) || !is_numeric($_GET['see_content']) ){
    header( "Location: " . bloginfo('url') .'/wp-admin/admin.php?page=criando_juntos');
}

$post_id = (int) $_GET['see_content'];
$dados = $wpdb->get_results("select DISTINCT user_id from criando_juntos where post_id='{$post_id}'") ;
$post = get_post($post_id);
include dirname(__FILE__) .'/css.php';
?>

<main class="main">
    <strong><a style="margin-left: 10px;" href="<?= bloginfo('url'). '/wp-admin/admin.php?page=criando_juntos'?>">voltar</a></strong>
    <h2 style="margin-left: 10px;"><small>Nome da Publicação:</small> <strong><?= $post->post_title ?></strong></h2>
    <table>

        <tr>
            <th>Usuário</th>
            <th>Ver</th>
        </tr>
        <?php
            foreach( $dados as $users ):
                $user_name = get_user_meta($users->user_id, 'first_name');
                if( empty($user_name[0]) ){
                    $user_name = get_user_by('id', $users->user_id)->data->display_name;
                }else{
                    $user_name = $user_name[0];
                }
                ?>
            <tr>
                <td><?= $user_name ?></td>
                <td><a href="?page=criando_juntos&user_id=<?= $users->user_id ?>&post_id=<?= $post->ID ?>">ver</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>