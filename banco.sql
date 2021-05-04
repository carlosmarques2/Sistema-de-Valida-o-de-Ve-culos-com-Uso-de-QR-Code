CREATE DATABASE `qrcode`;

CREATE TABLE `proprietarios` (
  `id` int(6) AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `setor` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `veiculos` (
  `id` int(6) AUTO_INCREMENT NOT NULL,
  `id_prop` int(6) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `cor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_prop`) REFERENCES `proprietarios`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuarios` (
	`id` int(6) AUTO_INCREMENT NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ALTER TABLE `proprietarios`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `matricula` (`matricula`);

-- ALTER TABLE `veiculos`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `id_prop` (`id_prop`);

-- ALTER TABLE `veiculos`
--   ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`id_prop`) REFERENCES `proprietarios` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
-- COMMIT;

INSERT INTO proprietarios (nome, sobrenome, matricula, funcao, telefone) VALUES ("Fulano", "Souza", "20201TADS0000", "Aluno", "91234-6534");
INSERT INTO veiculos (id_prop, modelo, placa, cor) VALUES (1, "Palio", "ABC-1234", "Prata");

INSERT INTO proprietarios (nome, sobrenome, matricula, funcao, telefone) VALUES ("Cicrano", "Filho", "20201DEG0000", "Servidor", "98765-4321");
INSERT INTO veiculos (id_prop, modelo, placa, cor) VALUES (2, "Saveiro", "THX-4433", "Vermelho");



CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR( 50 ) NOT NULL ,
    `usuario` VARCHAR( 25 ) NOT NULL ,
    `senha` VARCHAR( 40 ) NOT NULL ,
    `email` VARCHAR( 100 ) NOT NULL ,
    `nivel` INT(1) UNSIGNED NOT NULL DEFAULT '1',
    `ativo` BOOLEAN NOT NULL DEFAULT '1',
    `cadastro` DATETIME NOT NULL ,
    PRIMARY KEY (`id`),
    UNIQUE KEY `usuario` (`usuario`),
    KEY `nivel` (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Nivel 1 - Usuario Comum
-- Nivel 2 - Usuario Admin