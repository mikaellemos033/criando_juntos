<?php
/**
 * criando tabela necessária
 * para a manipulação de arquivos
 *
 */
 global $wpdb;

 $query = ' 
 create table IF NOT EXISTS `criando_juntos`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL ,
  `post_id` int(11) NOT NULL ,
  `file` VARCHAR(255) NOT NULL,
  `campo` VARCHAR(255) NOT NULL,
  `data` TIMESTAMP,
  PRIMARY KEY (`id`)
 );';

$wpdb->query($query);


