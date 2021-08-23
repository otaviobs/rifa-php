CREATE TABLE IF NOT EXISTS PerfilUsuarios (
id_perfil int(10) NOT NULL AUTO_INCREMENT,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
nome varchar(50) DEFAULT NULL,
slug varchar(50) DEFAULT NULL,
PRIMARY KEY (id_perfil),
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado),
KEY slug (slug)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Perfil de Usuários';

CREATE TABLE IF NOT EXISTS Lojas (
id_loja int(10) NOT NULL AUTO_INCREMENT,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
nome varchar(50) DEFAULT NULL,
slug varchar(50) DEFAULT NULL,
cnpj varchar(19) DEFAULT NULL,
PRIMARY KEY (id_loja),
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado),
KEY slug (slug)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Usuarios (
id_usuario int(10) NOT NULL AUTO_INCREMENT,
id_perfil int(10) DEFAULT '1',
id_criador int(10) DEFAULT NULL,
id_loja int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
status tinyint(3) unsigned DEFAULT '1' COMMENT 'status: 1-ativo',
email varchar(255) DEFAULT NULL,
senha char(40) DEFAULT NULL,
codigo char(32) DEFAULT NULL COMMENT 'código para email: quando C=0, cod para ativar por email; quando C=1, cod para esquecer a senha',
nome varchar(255) DEFAULT NULL,
data_nascimento date DEFAULT NULL,
cpf varchar(14) DEFAULT NULL,
rg varchar(15) DEFAULT NULL,
cnpj varchar(19) DEFAULT NULL,
cep varchar(9) DEFAULT NULL,
estado char(2) DEFAULT NULL,
cidade varchar(255) DEFAULT NULL,
bairro varchar(255) DEFAULT NULL,
rua varchar(255) DEFAULT NULL,
numero varchar(5) DEFAULT NULL,
sem_numero tinyint(3) unsigned DEFAULT '0' COMMENT 'status: 1-ativo',
complemento varchar(255) DEFAULT NULL,
telefone varchar(30) DEFAULT NULL,
PRIMARY KEY (id_usuario),
CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `PerfilUsuarios` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `Usuarios_ibfk_2` FOREIGN KEY (`id_loja`) REFERENCES `Lojas` (`id_loja`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado),
KEY status (status),
KEY email (email),
KEY cpf (cpf),
KEY cnpj (cnpj)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Produtos (
id_produto int(10) NOT NULL AUTO_INCREMENT,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
status tinyint(3) unsigned DEFAULT '1' COMMENT 'status: 1-ativo',
nome varchar(255) DEFAULT NULL,
sku varchar(255) DEFAULT NULL,
quantidade_pontos int(10) DEFAULT NULL,
PRIMARY KEY (id_produto),
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado),
KEY status (status),
KEY nome (nome)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Pedidos (
id_pedido int(10) NOT NULL AUTO_INCREMENT,
id_usuario int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
status tinyint(3) unsigned DEFAULT '0' COMMENT 'status: 1-aprovado',
quantidade_produto int(10) DEFAULT NULL,
nota_fiscal varchar(255) DEFAULT NULL COMMENT 'arquivo da nota',
numero_nota_fiscal varchar(255) DEFAULT NULL,
total decimal(10,2) DEFAULT 0,
PRIMARY KEY (id_pedido),
CONSTRAINT `Usuarios_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado),
KEY status (status)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS PedidoProdutos (
id_pedido_produto int(10) NOT NULL AUTO_INCREMENT,
id_pedido int(10) DEFAULT NULL,
id_produto int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
quantidade int(10) DEFAULT NULL,
valor decimal(10,2) DEFAULT 0,
total decimal(10,2) DEFAULT 0,
PRIMARY KEY (id_pedido_produto),
CONSTRAINT `Pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `Pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `Produtos_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `Produtos` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS DetalhesPedido (
id_detalhe_pedido int(10) NOT NULL AUTO_INCREMENT,
id_pedido int(10) DEFAULT NULL,
id_usuario int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
status tinyint(3) unsigned DEFAULT '0' COMMENT 'status: 1-aprovado',
comentario text DEFAULT NULL COMMENT 'arquivo da nota',
PRIMARY KEY (id_detalhe_pedido),
CONSTRAINT `Pedidos_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `Pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `Usuarios_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Perguntas (
id_pergunta int(10) NOT NULL AUTO_INCREMENT,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
status tinyint(3) unsigned DEFAULT '1' COMMENT 'status: 1-ativo',
titulo text NOT NULL,
PRIMARY KEY (id_pergunta),
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado),
KEY status (status)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Respostas (
id_resposta int(10) NOT NULL AUTO_INCREMENT,
id_pergunta int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
correta tinyint(3) unsigned DEFAULT '0' COMMENT '1-correta',
titulo text NOT NULL,
PRIMARY KEY (id_resposta),
CONSTRAINT `Perguntas_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `Perguntas` (`id_pergunta`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Quiz (
id_quiz int(10) NOT NULL AUTO_INCREMENT,
id_usuario int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
PRIMARY KEY (id_quiz),
CONSTRAINT `Usuarios_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS QuizRespostas (
id_quiz_resposta int(10) NOT NULL AUTO_INCREMENT,
id_quiz int(10) DEFAULT NULL,
id_pergunta int(10) DEFAULT NULL,
id_resposta int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
PRIMARY KEY (id_quiz_resposta),
CONSTRAINT `Quiz_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `Quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `Perguntas_ibfk_2` FOREIGN KEY (`id_pergunta`) REFERENCES `Perguntas` (`id_pergunta`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `Respostas_ibfk_1` FOREIGN KEY (`id_resposta`) REFERENCES `Respostas` (`id_resposta`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Videos (
id_video int(10) NOT NULL AUTO_INCREMENT,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
status tinyint(3) unsigned DEFAULT '0' COMMENT 'status: 1-aprovado',
link varchar(255) DEFAULT NULL,
tempo int(10) DEFAULT NULL,
PRIMARY KEY (id_video),
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado),
KEY status (status)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS VideoUsuarios (
id_video_usuaio int(10) NOT NULL AUTO_INCREMENT,
id_video int(10) DEFAULT NULL,
id_usuario int(10) DEFAULT NULL,
dataCadastro datetime DEFAULT NULL,
dataAlterado datetime DEFAULT NULL,
PRIMARY KEY (id_video_usuaio),
CONSTRAINT `Videos_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `Videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `Usuarios_ibfk_6` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
KEY dataCadastro (dataCadastro),
KEY dataAlterado (dataAlterado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS jbr_file (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
m TINYINT UNSIGNED NULL COMMENT 'movido; 1-movido',
d TINYINT UNSIGNED NULL COMMENT 'deletado; 1-deletado',
e TINYINT UNSIGNED NULL COMMENT 'error',
s INT UNSIGNED NULL COMMENT 'size',
w INT UNSIGNED NULL COMMENT 'width',
h INT UNSIGNED NULL COMMENT 'height',
dc DATETIME NULL COMMENT 'data cadastrado',
dm DATETIME NULL COMMENT 'data movido',
dd DATETIME NULL COMMENT 'data deletado',
t varchar(255) NULL COMMENT 'type',
f varchar(255) NULL COMMENT 'nome gerado + extensao do arquivo',
tf TEXT NULL COMMENT 'caminho temporario + nome gerado + extensao do arquivo',
nf TEXT NULL COMMENT 'novo caminho completo quando movido',
n varchar(255) NULL COMMENT 'nome original do arquivo',
nm varchar(255) NULL COMMENT 'nome original do arquivo sem extensao',
tn varchar(255) NULL COMMENT 'tag do nome original do arquivo sem extensao',
ex varchar(255) NULL COMMENT 'extensao do arquivo',
KEY m (m),
KEY e (e)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='jbr_file; salva todos os uploads';