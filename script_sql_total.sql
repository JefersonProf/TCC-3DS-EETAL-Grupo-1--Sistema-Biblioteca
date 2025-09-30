-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS biblioteca;
USE biblioteca;

-- Criar tabela usuários
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(20),
    genero ENUM('Masculino','Feminino','Outro') NOT NULL DEFAULT 'Outro',
    foto VARCHAR(255) DEFAULT 'imagem/padrao.png',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar tabela livros
DROP TABLE IF EXISTS livros;
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    autor VARCHAR(150) NOT NULL,
    categoria VARCHAR(100),
    subcategoria VARCHAR(100),
    editora VARCHAR(100),
    capa VARCHAR(200),
    descricao TEXT
);

-- Criar tabela reservas
DROP TABLE IF EXISTS reservas;
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    livro_id INT NOT NULL,
    data_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (livro_id) REFERENCES livros(id) ON DELETE CASCADE
);

-- Criar tabela admins
DROP TABLE IF EXISTS admins;
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL
);

-- Criar tabela contatos
DROP TABLE IF EXISTS contatos;
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    motivo VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    comentarios TEXT,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir dados iniciais em admins
INSERT INTO admins (nome, usuario, senha) VALUES
('Henrique', 'henrique', '1234'),
('Maria', 'maria', '1234'),
('Gabriel', 'gabriel', '1234'),
('Yasmin', 'yasmin', '1234'),
('Emilly', 'emilly', '1234'),
('Izabella', 'izabella', '1234');

-- Inserir usuário padrão administrador
INSERT INTO usuarios (nome, email, senha, data_nascimento, telefone, genero) VALUES
('Administrador', 'admin@teste.com', '$2y$10$KIXo31xzjZ8U3jmvzM/8c.9pH709sZB5UQwM8F5eQjP5sxj6FvP6C', '2000-01-01', '', 'Outro');

-- Inserir livros iniciais
INSERT INTO livros (titulo, autor, categoria, subcategoria, editora, capa, descricao) VALUES
('Memórias póstumas de Brás Cubas (1881)', 'Machado de Assis', 'Clássicos Brasileiros', 'Romance', 'Domínio Público', 'livros/Machado.png', 'Um dos maiores clássicos da literatura brasileira, narrado pelo defunto-autor Brás Cubas.'),
('Até o Verão Terminar', 'Colleen Hoover', 'Romance Contemporâneo', 'Romance', 'Galera Record', 'livros/Colleen.png', 'Uma emocionante história sobre amor, perda e superação.'),
('É Assim que Acaba', 'Colleen Hoover', 'Romance Contemporâneo', 'Romance', 'Galera Record', 'livros/Colleen1.png', 'Um dos romances mais impactantes da autora Colleen Hoover, abordando relações intensas e emocionantes.'),
('Memorial de Aires', 'Machado de Assis', 'Clássicos Brasileiros', 'Romance', 'Domínio Público', 'livros/image.png', 'O último romance escrito por Machado de Assis, trazendo reflexões sobre a velhice e a memória.'),
('Diário de um Banana Batalha Neval', 'Jeffrey P. Kinney', 'Infantojuvenil', 'Humor', 'VR Editora', 'livros/diáriobanana.png', 'Mais uma aventura divertida e cheia de trapalhadas do Greg Heffley na série Diário de um Banana.'),
('Harry Potter e a Pedra Filosofal', 'J. K. Rowling', 'Fantasia', 'Juvenil', 'Rocco', 'livros/harrypotter.png', 'O primeiro livro da saga Harry Potter, onde conhecemos Hogwarts e o início da jornada do jovem bruxo.'),
('A Culpa é das Estrelas', 'John Green', 'Romance Jovem Adulto', 'Romance', 'Intrínseca', 'livros/johangreen.png', 'Uma história emocionante de amor e superação entre dois jovens que enfrentam o câncer.'),
('O Pequeno Príncipe', 'Antoine D. Saint-Exupéry', 'Clássicos Universais', 'Fábula', 'HarperCollins Brasil', 'livros/pequenoprincipe.png', 'Um dos maiores clássicos universais, trazendo reflexões sobre amizade, amor e a essência da vida.'),
('Alice no País das Maravilhas', 'Lewis Carroll', 'Clássicos Universais', 'Fantasia', 'Zahar', 'livros/Aliceno.png', 'A fantástica aventura de Alice em um mundo cheio de personagens inusitados e surreais.'),
('O Diário de Anne Frank', 'Anne Frank', 'Biografia/Diário', 'Memórias', 'Record', 'livros/annefrank.png', 'O relato emocionante e real de Anne Frank durante a Segunda Guerra Mundial.');
