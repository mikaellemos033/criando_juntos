<?php
global $wpdb;

$post_id = $_GET['post_id'];
$user_id = $_GET['user_id'];

if( !is_numeric($post_id) || !is_numeric($user_id) ){
    header( "Location: " . bloginfo('url') .'/wp-admin/admin.php?page=criando_juntos');
}

$post = get_post($post_id);
$dados = $wpdb->get_results("select * from criando_juntos where post_id= '{$post_id}' and user_id = '{$user_id}'") ;

include dirname(__FILE__) .'/css.php';
?>

<main class="main">
    <table>
        <strong><a style="margin-left: 10px;" href="<?= bloginfo('url'). '/wp-admin/admin.php?page=criando_juntos&see_content=' . $post_id?>">voltar</a></strong>
        <h2 style="margin-left: 10px;"><small>Nome da Publicação:</small> <strong><?= $post->post_title ?></strong></h2>
        <tr>
            <th>Campo</th>
            <th>media</th>
            <th>Download</th>
        </tr>

        <?php
        foreach( $dados as $post ): ?>
            <tr>
                <td><?= $post->campo ?></td>
                <td>
                    <?php
                        $file = strchr($post->file, '.');
                        $img = null;

                        if( in_array($file , array('.jpg', '.gif', '.png', '.jpeg', '.pjeg')) ){
                            $img =  get_site_url() . '/wp-content/uploads' . $post->file;
                        }elseif( in_array($file, array('.mp4', '.mpeg', '.avi', '.wmv', '.jpm', '.3gp', '.flv')) ){
                            $img = get_site_url() . '/wp-content/plugins/criando_juntos/img/video-camera-icon.png';
                        }else{
                            $img = get_site_url() . '/wp-content/plugins/criando_juntos/img/audio_file.png';
                        }
                    ?>
                    <a target="_blank" href="<?= bloginfo('url') . '/wp-content/uploads' . $post->file ?>">
                        <img src="<?= $img ?>" style="max-width: 45px">
                    </a>
                </td>
                <td><a target="_blank" href="<?= bloginfo('url') . '/wp-content/uploads' . $post->file ?>">Download</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>